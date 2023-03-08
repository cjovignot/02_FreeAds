<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public $categories;
    public function index()
    {
        $categories = Categories::all();


        return view('categories.index', compact('categories'));
    }


    public function create()
    {
        $categories = Categories::all()
            ->where('is_sub', '0');
        $subcategories = Categories::all()
            ->where('is_sub', '1');

        return view('categories.create',  compact('subcategories'), compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'required',
        ]);
        if ($request['parent_id'] == true) {
            $request['is_sub'] = 1;
        } else {
            $request['is_sub'] = 0;
        }

        Categories::create($request->post());
        return redirect()->route('categories.index')->with('success', 'category has been created successfully.');
    }


    public function show(Categories $category)
    {
        return view('categories.show', compact('category'));
    }



    public function edit(Categories $category)
    {

        $categories = Categories::all()
            ->where('is_sub', '0');
        // ->where('id', != ,$category['id']);

        $subcategories = Categories::all()
            ->where('is_sub', '1');

        return view('categories.edit', compact('categories'), compact('category'), compact('subcategories'),);
    }


    public function update(Request $request, Categories $category)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'required',
        ]);
        if ($request['parent_id'] == true) {
            if ($request['parent_id'] == $category['id]']) {
                return view('categories.edit');
            }
            $request['is_sub'] = 1;
        } else {
            $request['is_sub'] = 0;
        }


        $category->fill($request->post())->save();
        return redirect()->route('categories.index')->with('success', 'Category Has Been updated successfully');
    }


    public function destroy(Categories $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'category has been deleted successfully');
    }


    public function display_filter()
    {
        $categories = Categories::all();
        dd($categories);
        return view('categories.filter', compact('categories'));
    }
}
