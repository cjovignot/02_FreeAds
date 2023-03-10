@extends('layouts.freeadds_layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<h4 style="position: fixed; z-index: 999; left: 20px; top: 8px; color: white;">CREATE PRODUCT</h4>

<body>
    <div style="width: 60%; height: 86vh; display:flex; justify-content:center; margin-top:100px; flex-direction: column; border: none;" class="container">
        @if(session('status'))
        <div>
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <div>
                    <div>
                        <strong>Product Name :</strong>
                        <input type="text" name="name" class="form-control" placeholder="Product Name">
                        @error('name')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <div>
                        <strong>Product Description :</strong>
                        <input type="text" name="description" placeholder="Product description">
                        @error('description')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <div>
                        <strong>Product Price :</strong>
                        <input type="int" name="price" placeholder="Product price">
                        @error('price')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <div>
                        <strong>Product Category :</strong>
                        <select class="browser-default" name="category_id">
                            <option value="0"> -- Choose a category -- </option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                        </select>
                        @error('category')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    @if ($message = Session::get('success'))
                        <divrole="alert">
                            {{ $message }}
                        </div>
                        <img src="img_source/{{ Session::get('image') }}" class="mb-2" style="width:400px;height:400px;">
                    @endif
                        @csrf
            
                        <div>
                            <strong>Select a picture :</strong>
                            <input 
                                type="file" 
                                name="image" 
                                id="inputImage"
                                class="form-control @error('image') is-invalid @enderror">
            
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>

                <div style="justify-content: space-between; display: flex;">
                    <a class="btn btn-primary" href="{{ route('products.index') }}" enctype="multipart/form-data">Back</a>
                    <button style="margin: 10px;" type="submit" class="btn btn-primary ml-3" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>