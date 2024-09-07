<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Auth::routes();

// Other routes
// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::post('/vehicles', [VehicleController::class, 'store']);
    Route::put('/vehicles/{id}', [VehicleController::class, 'update']);
    Route::delete('/vehicles/{id}', [VehicleController::class, 'destroy']);
});

// Driver routes
Route::middleware(['auth', 'role:driver'])->group(function () {
    Route::get('/vehicles', [VehicleController::class, 'index']);
    Route::get('/vehicles/{id}', [VehicleController::class, 'show']);
});
// Redirect authenticated users to /vehicles
Route::get('/home', function () {
    return redirect('/vehicles');
});
