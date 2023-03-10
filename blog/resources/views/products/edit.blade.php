@extends('layouts.freeadds_layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<h4 style="position: fixed; z-index: 999; left: 20px; top: 8px; color: white;">EDIT PRODUCT</h4>

<body>
    <div style="width: 60%; height: 86vh; display:flex; justify-content:center; margin-top:100px; flex-direction: column; border: none;" class="container">
        @if(session('status'))
        <div>
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <div>
                    <div>
                        <strong>Product Name :</strong>
                        <input type="text" name="name" value="{{ $product->name }}" placeholder="Product name">
                        @error('name')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <div>
                        <strong>Product Description :</strong>
                        <input type="text" name="description" placeholder="Product Description" value="{{ $product->description }}">
                        @error('description')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <div>
                        <strong>Product Price :</strong>
                        <input type="integer" name="price" value="{{ $product->price }}" placeholder="Product Price"> €
                        @error('price')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                <select class="browser-default" name="category_id">
                            <option value="0"> -- Choose a category -- </option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                </div>
                <div>
                <select class="browser-default" name="sub_category_id">
                            <option value="0"> -- Choose a category -- </option>
                            @foreach ($sub_categories as $sub_category)
                            <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                            @endforeach
                        </select>
                </div>
                
                <div style="justify-content: space-between; display: flex;">
                    <a class="btn btn-primary" href="{{ route('products.index') }}" enctype="multipart/form-data">Back</a>
                    <button style="margin: 10px;" type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>