<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('admin/customers',\App\Http\Controllers\customer\CustomerController::class);
//Route::post('customers/me',[\App\Http\Controllers\profile\ProfileController::class, 'me']);
Route::apiResource('customers/profile',\App\Http\Controllers\profile\ProfileController::class);

