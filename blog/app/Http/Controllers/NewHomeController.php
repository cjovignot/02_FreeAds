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
        $categories = Categories::all();

        $category = Product::join('categories', 'products.category_id', '=', 'categories.id')->distinct('categories.id')
        ->get(['products.category_id','categories.id', 'categories.name']);
        
        return view('home', compact('products', 'categories', 'category'));



    }
}