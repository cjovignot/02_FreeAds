<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categories;
use App\Models\Product;


class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $products = Product::all();
        return view('admin.index');
    }
}
