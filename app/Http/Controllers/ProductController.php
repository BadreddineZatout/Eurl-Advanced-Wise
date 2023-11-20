<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Request;

class ProductController extends Controller
{
    public function getProducts(Request $request)
    {
        return Product::has('media')->latest()->get();
    }
}
