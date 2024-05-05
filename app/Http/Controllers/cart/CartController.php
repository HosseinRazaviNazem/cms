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


        $cartItem = Cart::create($request->validated());
        $cartItem = CartItem::where('user_id', $request->customer_id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            // Update quantity
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Add new item to cart
            $cartItem = new CartItem();
            $cartItem->user_id = $request->user_id;
            $cartItem->product_id = $request->product_id;
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
        }

        return response()->json(['message' => 'Item added to cart successfully']);
    }
