<?php

namespace App\Http\Controllers;

use App\Models\Brand;

class BrandController extends Controller
{
    public function getBrands()
    {
        return Brand::select(['id', 'name'])->orderBy('name')->get();
    }
}
