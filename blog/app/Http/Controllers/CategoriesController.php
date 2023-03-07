<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();


        return view('categories.index', compact('categories'));
    }


    public function create()
    {


        return view('categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'is_sub' => 'required',
            'parent_id' => 'required',
        ]);

        Categories::create($request->post());
        return redirect()->route('categories.index')->with('success', 'category has been created successfully.');
    }


    public function show(Categories $category)
    {
        return view('categories.show', compact('category'));
    }



    public function edit(Categories $category)
    {
        return view('categories.edit', compact('category'));
    }


    public function update(Request $request, Categories $category)
    {
        $request->validate([
            'name' => 'required',
            'is_sub' => 'required',
            'parent_id' => 'required',
        ]);


        $category->fill($request->post())->save();
        return redirect()->route('categories.index')->with('success', 'Category Has Been updated successfully');
    }


    public function destroy(Categories $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'category has been deleted successfully');
    }
}
