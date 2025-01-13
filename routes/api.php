<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VehiculeController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(VehiculeController::class)->group(function () {
    Route::get('/vehicules', 'index');
    Route::get('/vehicule/{id}', 'show');
    Route::post('/vehicule/store', 'store');
    Route::put('/vehicule/update/{id}', 'update');
    Route::delete('/vehicule/delete/{id}','destroy');
});
