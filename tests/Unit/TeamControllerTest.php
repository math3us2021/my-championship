<?php

use App\Http\Controllers\TeamsController;
use App\Http\Protocols\teams\TeamsInterface;
use App\Models\Teams;
use Tests\TestCase;

uses(TestCase::class);

it('can fetch teams', function () {
    // Mock TeamsInterface
    $mock = Mockery::mock(TeamsInterface::class);
    $mock->shouldReceive('get')->once()->andReturn([
        new Teams(['name' => 'Team A']),
        new Teams(['name' => 'Team B']),
    ]);

    // Inject mock into controller
    $controller = new TeamsController($mock);

    // Call index method
    $response = $controller->index();

    // Assert response
    expect($response)->toBeInstanceOf(JsonResponse::class);
    expect($response->status())->toBe(Response::HTTP_OK);
    expect($response->getData())->toEqual([
        ['name' => 'Team A'],
        ['name' => 'Team B'],
    ]);
});
