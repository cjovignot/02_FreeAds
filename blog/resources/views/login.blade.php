@extends('layouts.freeadds_layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<h4 style="position: fixed; z-index: 999; left: 20px; top: 8px; color: white;">LOGIN</h4>

<body>
    <div style="width: 60%; height: 86vh; display:flex; justify-content:center; margin-top:100px; flex-direction: column; border: none;" class="container">
            @if($errors->any())
                <div>
                    @foreach($errors->all() as $error)
                        <div>
                            {{$error}}
                        </div>
                    @endforeach
                </div>
            @endif

            @if(session()->has('error'))
                <div>
                    {{session('error')}}
                </div>
            @endif

            @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
        <form action="{{route('login.post')}}" method="POST">
            @csrf
            <div>
                <input placeholder="Username" type="text" name="name">
            </div>
            <div>
                <input placeholder="Password" type="password" name="password">
            </div>
            <div style="justify-content: space-between; display: flex;">
                <a href="/" class="waves-effect waves-light btn">Cancel</a>
                <button style="margin: 10px;" type="submit" class="btn btn-primary ml-3" type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
