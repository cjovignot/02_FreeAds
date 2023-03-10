@extends('layouts.freeadds_layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Category</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<h4 style="position: fixed; z-index: 999; left: 20px; top: 8px; color: white;">CREATE CATEGORY</h4>

<body>
    <div style="width: 60%; height: 86vh; display:flex; justify-content:center; margin-top:100px; flex-direction: column; border: none;" class="container">

        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Category Name :</strong>
                        <input type="text" name="name" class="form-control" placeholder="Category Name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Category parent_id :</strong>
                        <select class="browser-default" name="parent_id">
                            <option value="0"></option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>

                        @error('parent_id')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div style="justify-content: space-between; display: flex;">
                    <a class="btn btn-primary" href="{{ route('categories.index') }}" enctype="multipart/form-data">Back</a>
                    <button style="margin: 10px;" type="submit" class="btn btn-primary ml-3" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>