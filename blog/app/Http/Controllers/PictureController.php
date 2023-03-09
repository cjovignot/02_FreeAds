<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function index()
    {
        return view('products.picture_upload');
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
      
        $imageName = time().'.'.$request->image->extension();  
       
        $request->image->move(public_path('img_source'), $imageName);

        return back()
        ->with('success','You have successfully upload image.')
        ->with('image',$imageName); 
    }

}