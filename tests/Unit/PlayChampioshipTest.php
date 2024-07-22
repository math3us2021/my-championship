<?php

use App\Http\Controllers\PlayChampionshipController;
use Illuminate\Validation\ValidationException;
use App\Http\Protocols\playchampioship\PlayChampionshipServiceInterface;
use App\Http\Requests\StoreChampionshipRequest;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Tests\TestCase;

uses(TestCase::class);

function mockResponseFactoryPlay(int $statusMock): void
{
    $responseFactory = Mockery::mock(ResponseFactory::class);
    $responseFactory->shouldReceive('json')
        ->with(Mockery::any(), $statusMock)
        ->andReturnUsing(function ($data) use ($statusMock) {
            return new JsonResponse($data, $statusMock);
        });

    app()->instance('Illuminate\Contracts\Routing\ResponseFactory', $responseFactory);
}

//it('should return 422 if type playchampionship_id', function () {
//    $errorMessage = 'The championship id field is required.';
//    mockResponseFactoryPlay(422);
//
//    $request = Request::create('/championship/play', 'POST', []);
//    $playService = Mockery::mock(PlayChampionshipServiceInterface::class);
//
//    $formRequest = new StoreChampionshipRequest();
//    $formRequest->setJson($request->json());
//    $formRequest->validateResolved();
//
//    $controller = new PlayChampionshipController($playService);
//
//    expect($controller->index($formRequest))->status()->toBe(422);
//});
