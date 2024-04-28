<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\StoreProductRequest;
use App\Http\Resources\product\ProdutCollection;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::query()->paginate();

        return response()->json([
            'success' => true,
            'data' => new ProdutCollection($products),

        ]);
    }

    public function show()
    {

    }


    public function store(StoreProductRequest $request)54
    {
        $product = Product::create($request->validated());

        return response()->json(['message' => 'Product created successfully', 'data' => $product], 201);
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }


}
