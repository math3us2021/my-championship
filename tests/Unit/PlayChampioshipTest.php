<?php

use App\Http\Controllers\TeamController;
use App\Http\Protocols\team\TeamServiceInterface;
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
