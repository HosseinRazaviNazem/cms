<?php

namespace App\Http\Controllers\cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\cart\CartRequest;
use App\Http\Resources\cart\CartResource;
use App\Models\Cart;

class CartController extends Controller
{
    public function addItem(CartRequest $request)
    {
        $cartItem = Cart::create($request->validated());

        return new CartResource($cartItem);
    }
}
