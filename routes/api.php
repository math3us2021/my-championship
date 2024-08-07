<?php

use App\Http\Controllers\ChampionshipController;
use App\Http\Controllers\PlayChampionshipController;
use App\Http\Controllers\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return response()->json(['message' => 'API Laravel está funcionando corretamente!!!!!']);
});

Route::get('/teams/{id?}', [TeamController::class, 'index']);
Route::post('/teams', [TeamController::class, 'store']);
Route::put('/teams/{id}', [TeamController::class, 'store']);
Route::delete('/teams/{id}', [TeamController::class, 'destroy']);

Route::get('/championship/{id?}', [ChampionshipController::class, 'index']);
Route::post('/championship', [ChampionshipController::class, 'store']);
Route::put('/championship/{id}', [ChampionshipController::class, 'store']);
Route::delete('/championship/{id}', [ChampionshipController::class, 'destroy']);

Route::get('/championship-play/{id?}', [PlayChampionshipController::class, 'index']);
Route::post('/championship-play', [PlayChampionshipController::class, 'create']);
