<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{

        /**
        * Display a listing of the resource.
        *
        */
        public function index()
        {
            $products = Product::all();
            return view('products.index', compact('products'));
        }
    
        public function show(Product $product)
        {
            return view('products.selected',compact('product'));
        }


        /**
        * Show the form for creating a new resource.
        *
        */
        public function create()
        {
            return view('products.create');
        }
    
        /**
        * Store a newly created resource in storage.
        *
        */
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'category_id' => 'required',
                
            ]);
            $request['created_by'] = 1; // will contain current user id (in this case: admin)
            Product::create($request->post());
    
            return redirect()->route('products.index')->with('success','Product has been created successfully.');
        }
    
    
        /**
        * Show the form for editing the specified resource.
        */
        public function edit(Product $product)
        {
            return view('products.edit',compact('product'));
        }
    
        /**
        * Update the specified resource in storage.
        */
        public function update(Request $request, Product $product)
        {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
            ]);
            
            $product->fill($request->post())->save();
    
            return redirect()->route('products.index')->with('success','Product Has Been updated successfully');
        }
    
        /**
        * Remove the specified resource from storage.
        */
        public function destroy(Product $product)
        {
            $product->delete();
            return redirect()->route('products.index')->with('success','Product has been deleted successfully');
        }

}
