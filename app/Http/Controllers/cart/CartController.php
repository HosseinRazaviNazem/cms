<?php

namespace App\Http\Controllers\cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\cart\CartRequest;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addItem(CartRequest $request)
    {
        $validatedData = $request->validated();

        $cartItem = Cart::where('customer_id', $validatedData['customer_id'])
            ->where('product_id', $validatedData['product_id'])
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $validatedData['quantity'];
            $cartItem->save();
        } else {
            $cartItem = new cart();
            $cartItem->user_id = $validatedData['customer_id'];
            $cartItem->product_id = $validatedData['product_id'];
            $cartItem->quantity = $validatedData['quantity'];
            $cartItem->save();
        }

        return response()->json(['message' => 'Item added to cart successfully'], 200);
    }
}
