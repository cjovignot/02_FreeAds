<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function display_products()
    {
        return view('Products.products', [
            'products' => Product::all()
        ]);
    }

    public function show($id)
    {
        return view('Products.selected_product', [
            'product' => Product::findOrFail($id)
        ]);
    }
}
