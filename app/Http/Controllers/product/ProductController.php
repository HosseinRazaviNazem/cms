<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\StoreProductRequest;
use App\Http\Resources\product\ProductResource;
use App\Http\Resources\product\ProdutCollection;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return new ProdutCollection(Product::paginate());
    }

    public function show($id)
    {
        $customer = Product::findOrFail($id);

        return new ProductResource($customer);
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());

        return new ProductResource($product);

    }

    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return new ProductResource($product);

        //        return response()->json(['message' => 'Customer updated successfully', 'data' => $customer]);
    }

    public function destory($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();

            return response()->json(['message' => 'product deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete product.'], 500);
        }

    }
}
