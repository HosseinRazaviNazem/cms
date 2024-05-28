<?php

namespace App\Http\Controllers\Customer\product;

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
}


