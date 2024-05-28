<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Customer;
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
//Customer.....................................................
Route::group(['as' => 'customer.', 'prefix' => 'customers'], function () {
    Route::post('login', [Customer\Auth\AuthController::class, 'login']);
    Route::post('register', [Customer\Auth\AuthController::class, 'register']);
    Route::post('logout', [Customer\Auth\AuthController::class, 'logout']);
    Route::post('refresh', [Customer\Auth\AuthController::class, 'refresh']);
    Route::apiResource('products', Customer\product\ProductController::class);
    Route::apiResource('cart', Customer\cart\CartController::class);
    Route::apiResource('profile', Customer\profile\ProfileController::class);


});

//ADMIN ................................
Route::group(['as' => 'admin.', 'prefix' => 'admins'], function () {
    //auth........................................
        Route::post('login', [Admin\Auth\AuthController::class, 'login']);
        Route::post('register', [Admin\Auth\AuthController::class, 'register']);
        Route::post('logout', [Admin\Auth\AuthController::class, 'logout']);
        Route::post('refresh', [Admin\Auth\AuthController::class, 'refresh']);
    //Product.....................................
    Route::apiResource('products', Admin\Product\ProductController::class);
    //Customer  .....................................
    Route::apiResource('customers', Admin\Customer\CustomerController::class);


});

