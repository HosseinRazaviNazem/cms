<?php

namespace App\Http\Controllers\Customer\cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\cart\CartRequest;
use App\Http\Resources\Customer\cart\CartResource;
use App\Models\Cart;

class CartController extends Controller
{

// storeRequest
    public function store(CartRequest $request)
    {
        $validatedData = $request->validated();
        $cartItem = Cart::where('product_id', $validatedData['product_id'])->first();
        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create($validatedData);
        }
        return new CartResource($cartItem);
    }
}
