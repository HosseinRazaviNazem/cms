<?php

use App\Http\Controllers\Customer;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Cart\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');
//Route::apiResource('admin/customers', \App\Http\Controllers\customer\CustomerController::class);
//Route::apiResource('customr/customers', \App\Http\Controllers\customer\CustomerController::class)->except('index');
//Route::post('customers/profiles/me', [\App\Http\Controllers\profile\ProfileController::class, 'me']);
//Route::apiResource('customers/profile', \App\Http\Controllers\profile\ProfileController::class);
////Route::post('customers/{customer_id}',[\App\Http\Controllers\profile\ProfileController::class, 'show']);
////Route::post('customers/profiles/admin',[\App\Http\Controllers\profile\ProfileController::class, 'admin']);
//Route::apiResource('product', \App\Http\Controllers\product\ProductController::class);
//
////Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {
////    Route::post('login', 'login');
////    Route::post('register', 'register');
////    Route::post('logout', 'logout');
////    Route::post('refresh', 'refresh');
////});

Route::group(['as' => 'customer.', 'prefix' => 'customers'], function () {
    Route::post('login', [Customer\AuthController::class, 'login']);
    Route::post('register', [Customer\AuthController::class, 'register']);
    Route::post('logout', [Customer\AuthController::class, 'logout']);
    Route::post('refresh', [Customer\AuthController::class, 'refresh']);

});

Route::group(['as' => 'cart.', 'prefix' => 'cart'], function () {
    Route::post('add', [CartController::class, 'addItem']);
//    Route::post('delete', [CartController::class, 'addItem']);
//    Route::post('update', [CartController::class, 'addItem']);
});
Route::group(['as' => 'admin.', 'prefix' => 'admins'], function () {
        Route::post('login', [Admin\AuthController::class, 'login']);
        Route::post('register', [Admin\AuthController::class, 'register']);
        Route::post('logout', [Admin\AuthController::class, 'logout']);
        Route::post('refresh', [Admin\AuthController::class, 'refresh']);
});

