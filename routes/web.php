<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VehicleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicle.index');
Route::post('/vehicle', [VehicleController::class, 'store'])->name('vehicle.store');
Route::get('/vehicle/{id}/edit', [VehicleController::class, 'edit'])->name('vehicle.edit');
Route::delete('/vehicle/{id}', [VehicleController::class, 'destroy'])->name('vehicle.destroy');

// Existing routes...

// Route to update a vehicle
Route::put('/vehicle/{id}', [VehicleController::class, 'update'])->name('vehicle.update');
