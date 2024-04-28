<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('admin/customers',\App\Http\Controllers\customer\CustomerController::class);
Route::post('customers/profiles/me',[\App\Http\Controllers\profile\ProfileController::class, 'me']);
Route::apiResource('customers/profile',\App\Http\Controllers\profile\ProfileController::class);
//Route::post('customers/{customer_id}',[\App\Http\Controllers\profile\ProfileController::class, 'show']);
//Route::post('customers/profiles/admin',[\App\Http\Controllers\profile\ProfileController::class, 'admin']);
Route::apiResource('product',\App\Http\Controllers\product\ProductController::class);
