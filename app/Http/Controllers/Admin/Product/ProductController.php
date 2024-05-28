<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StoreProductRequest;
use App\Http\Resources\admin\ProductCollection;
use App\Http\Resources\admin\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return new ProductCollection(Product::paginate());
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return new ProductResource($product);
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

// delete try catch
// message de - 204
