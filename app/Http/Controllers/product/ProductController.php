<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\StoreProductRequest;
use App\Http\Resources\product\ProductResource;
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

    public function show($id)
    {
        $customer = Product::findOrFail($id);

//        return response()->json(['data' => $customer]);
        return new ProductResource($customer);
    }

    public function store(StoreProductRequest $request)
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

//    public function destory($id)
//    {
//        try {
//            $product = Product::findOrFail($id);
//            $product->delete();
//
//            return response()->json(['message' => 'product deleted successfully']);
//        } catch (\Exception $e) {
//            return response()->json(['error' => 'Failed to delete product.'], 500);
//        }
//
    }
