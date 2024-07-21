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

it('should return 400 if type name', function () {
    $errorMessage = 'The name field must be a string.';
    mockResponseFactory(422);

    $request = Request::create('/championship/play', 'POST', []);
    $teamService = Mockery::mock(TeamServiceInterface::class);

    $controller = new TeamController($teamService);
    $response = $controller->store($request);
    expect($response->status())->toBe(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->and($response->getData(true)['errors']['name'][0])->toBe($errorMessage);
});
