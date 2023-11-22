<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show', compact('product'));
    }

    public function getProducts(Request $request)
    {
        $limit = $request->query('limit', 4);
        $offset = $request->query('offset', 0);

        $products = Product::has('media')->latest();

        if ($search = $request->query('search')) {
            $products->where('name', 'like', "%$search%");
        }

        return $products->offset($offset * $limit)->limit($limit)->get();
    }
}
