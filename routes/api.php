<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('customers', [\App\Http\Controllers\customer\CustomerController::class, 'index']);
Route::get('customers/{id}', [\App\Http\Controllers\customer\CustomerController::class, 'show']);
Route::post('customers', [\App\Http\Controllers\customer\CustomerController::class, 'store']);
Route::delete('customers/{id}', [\App\Http\Controllers\customer\CustomerController::class, 'destory']);
//Route::apiResource('customers', \App\Http\Controllers\customer\CustomerController::class);
//Route::resource('customers', \App\Http\Controllers\customer\CustomerController::class)->only(['destroy','index','show']);
