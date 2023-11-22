<?php

namespace App\Http\Controllers;

use App\Models\Supplier;

class SupplierController extends Controller
{
    public function getSuppliers()
    {
        return Supplier::select(['id', 'name'])->orderBy('name')->get();
    }
}
