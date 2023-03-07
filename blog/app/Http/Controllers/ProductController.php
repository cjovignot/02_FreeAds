<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;




class ProductController extends Controller
{
    public function insert()
    {
        $urlData = getURLList();
        return view('my_project');
    }
    public function create(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:3|max:255',
            'parent_id' => 'required|int|max:10',
            'is_sub' => 'required|int|max:10'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('insert')
                ->withInput()
                ->withErrors($validator);
        } else {
            $data = $request->input();
            try {
                $category = new Categories;
                $category->name = $data['name'];
                $category->parent_id = $data['parent'];
                $category->is_sub = $data['is_sub'];
                $category->save();
                return redirect('insert')->with('status', "Insert successfully");
            } catch (Exception $e) {
                return redirect('insert')->with('failed', "operation failed");
            }
        }
    }
}
