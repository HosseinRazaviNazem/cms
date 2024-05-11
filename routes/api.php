<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('admin/users',\App\Http\Controllers\user\UserController::class);
Route::apiResource('register',\App\Http\Controllers\user\UserController::class)->only('store');
Route::apiResource('user',\App\Http\Controllers\user\UserController::class)->except('index');
Route::post('users/profiles/me',[\App\Http\Controllers\profile\ProfileController::class, 'me']);
Route::apiResource('users/profile',\App\Http\Controllers\profile\ProfileController::class);
//Route::post('customers/profiles/admin',[\App\Http\Controllers\profile\ProfileController::class, 'admin']);
Route::apiResource('product',\App\Http\Controllers\product\ProductController::class);

Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::post('login', 'login');
//    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

    Route::group([ 'middleware' => 'auth:api'], function () {
        Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
        Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
    });

    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
//    Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);


