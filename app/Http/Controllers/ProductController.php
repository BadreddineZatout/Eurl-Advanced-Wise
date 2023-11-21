<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Request;

class ProductController extends Controller
{
    function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    public function getProducts(Request $request)
    {
        return Product::has('media')->latest()->get();
    }
}
