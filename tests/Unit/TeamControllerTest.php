<?php

use App\DTO\TeamDTO;
use App\Http\Controllers\TeamController;
use App\Http\Protocols\team\TeamServiceInterface;
use App\Models\Team;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tests\TestCase;

uses(TestCase::class);

function mockResponseFactory(int $statusMock)
{
    $responseFactory = Mockery::mock(ResponseFactory::class);
    $responseFactory->shouldReceive('json')
        ->with(Mockery::any(), $statusMock)
        ->andReturnUsing(function ($data) use ($statusMock) {
            return new JsonResponse($data, $statusMock);
        });

    app()->instance('Illuminate\Contracts\Routing\ResponseFactory', $responseFactory);
}

it('should return 500 when an exception is thrown', function () {
    mockResponseFactory(500);

    $mock = Mockery::mock(TeamServiceInterface::class);
    $mock->shouldReceive('get')->andThrow(new \Exception('An error occurred'));
    $controller = new TeamController($mock);
    $response = $controller->index();

    expect($response->status())->toBe(Response::HTTP_INTERNAL_SERVER_ERROR);
});

it('should empty array return 200', function () {
    mockResponseFactory(200);

    $mock = Mockery::mock(TeamServiceInterface::class);
    $mock->shouldReceive('get')->once()->andReturn([]);
    $controller = new TeamController($mock);
    $response = $controller->index();

    expect($response->status())->toBe(Response::HTTP_OK);
});

it('should return 200', function () {
    mockResponseFactory(200);

    $mock = Mockery::mock(TeamServiceInterface::class);
    $mock->shouldReceive('get')->once()->andReturn([[Team::class]]);

    $controller = new TeamController($mock);
    $response = $controller->index();

    expect($response->status())->toBe(Response::HTTP_OK);
});

it('should getByID return 200', function () {
    mockResponseFactory(200);

    $mock = Mockery::mock(TeamServiceInterface::class);
    $mock->shouldReceive('get')->once()->andReturn([[Team::class]]);

    $controller = new TeamController($mock);
    $response = $controller->index('1');

    expect($response->status())->toBe(Response::HTTP_OK);
});

it('should getByID null return 400', function () {
    mockResponseFactory(400);

    $mock = Mockery::mock(TeamServiceInterface::class);
    $mock->shouldReceive('get')->once()->andReturnNull();

    $controller = new TeamController($mock);
    $response = $controller->index('1');

    expect($response->status())->toBe(Response::HTTP_BAD_REQUEST);
});

it('should return 400 if required field name is missing', function () {
    $errorMessage = 'The name field is required.';
    mockResponseFactory(400);

    $request = Request::create('/teams', 'POST', []);
    $teamService = Mockery::mock(TeamServiceInterface::class);

    $controller = new TeamController($teamService);
    $response = $controller->store($request);
    expect($response->status())->toBe(Response::HTTP_BAD_REQUEST)
        ->and($response->getData(true)['errors']['name'][0])->toBe($errorMessage);
});

it('should return 400 if type name', function () {
    $errorMessage = 'The name field must be a string.';
    mockResponseFactory(400);

    $request = Request::create('/teams', 'POST', ['name' => 123]);
    $teamService = Mockery::mock(TeamServiceInterface::class);

    $controller = new TeamController($teamService);
    $response = $controller->store($request);
    expect($response->status())->toBe(Response::HTTP_BAD_REQUEST)
        ->and($response->getData(true)['errors']['name'][0])->toBe($errorMessage);
});

it('should return 201 if a team is created successfully', function () {
    $createdTeam = ['id' => 1, 'name' => 'Team A'];

    mockResponseFactory(201);

    $request = Request::create('/teams', 'POST', ['name' => 'Team A']);
    $teamService = Mockery::mock(TeamServiceInterface::class);
    $teamService->shouldReceive('create')->once()->andReturn($createdTeam);

    $controller = new TeamController($teamService);
    $response = $controller->store($request);

    expect($response->status())->toBe(Response::HTTP_CREATED)
        ->and($response->getData(true))->toBe($createdTeam);
});


it('should return 400 if the team to update is not found', function () {

    mockResponseFactory(400);

    $request = Request::create('/teams/1', 'PUT', ['name' => 'Updated Team']);
    $teamService = Mockery::mock(TeamServiceInterface::class);
    $teamService->shouldReceive('update')->once()->with('1', Mockery::type(TeamDTO::class))->andReturnNull();

    $controller = new TeamController($teamService);
    $response = $controller->store($request, '1');

    expect($response->status())->toBe(Response::HTTP_BAD_REQUEST);
});
