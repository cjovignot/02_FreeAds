<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use App\Models\User;


class NewHomeController extends Controller
{
    public function show()
    {
        $products = Product::all();
        $categories = Categories::all()->where('$product->category_id', '=', '$category->id');
        return view('home', compact('products', 'categories'));
    }
}
