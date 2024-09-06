<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/vehicles', [VehicleController::class, 'index']);
Route::post('/vehicle', [VehicleController::class, 'store']);
Route::get('/vehicle/{id}', [VehicleController::class, 'show']);
Route::put('/vehicle/{id}', [VehicleController::class, 'update']);
Route::delete('/vehicle/{id}', [VehicleController::class, 'destroy']);
