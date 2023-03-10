@extends('layouts.freeadds_layout')
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My products</title>
</head>


<h4 style="position: fixed; z-index: 999; left: 20px; top: 8px; color: white;">MY PRODUCTS</h4>

<body>
    <div style="display:flex; justify-content:center; width:100%; margin-top:100px; flex-direction: column; border: none;" class="container">
        @include('layouts.adminmenu')  
        
        <a class="btn btn-success" href="{{ route('products.create') }}">Create Product</a>
        @if ($message = Session::get('success'))
            <div>
                <p>{{ $message }}</p>
            </div>
        @endif
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Product Price</th>
                    <!-- <th>Category ID</th> -->
                    <th>Cat Name</th>
                    <th>Created By</th>
                    <th>Picture</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><a href="{{route('products.show', $product->id)}}">{{ $product->name }}</a></td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <!-- <td>{{ $product->category_id }}</td> -->
                        @foreach ($categories as $category)
                            @if($category->id == $product->category_id)
                                <td>{{ $category->name }}</td>
                            @endif
                        @endforeach
                        <td>{{ $product->created_by }}</td>
                        <td><img style="height: 100px; width: 100px;" src="{{ URL::asset($product->image_path) }}"></td>
                        <td>
                            <form style="display: flex; justify-content: space-between;" action="{{ route('products.destroy', $product->id) }}" method="Post">
                                <a style="margin: 0;" href="{{ route('products.edit', $product->id) }}" class="waves-effect waves-light btn">Update</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="waves-effect waves-light btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>