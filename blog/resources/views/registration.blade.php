@extends('layouts.freeadds_layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<h4 style="position: fixed; z-index: 999; left: 20px; top:8px; color:white">REGISTRATION</h4>

<body>
    <div style="width: 60%; height: 86vh; display:flex; justify-content:center; margin-top:100px; flex-direction: column; border: none;" class="container">

        <div>
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

        </div>
        <form action="{{route('registration.post')}}" method="POST">
            @csrf

            <div class="input-field col s12">
                <input placeholder="Name" type="text" name="name">
            </div>

            <div class="input-field col s12">
                <input placeholder="Email address" type="email" name="email">
            </div>

            <div class="input-field col s12">
                <input placeholder="Password" type="password" name="password">
            </div>

            <div class="input-field col s12">
                <input placeholder="Verify Password" type="password" name="passwordverify">
            </div>

            <div class="input-field col s12">
                <input placeholder="Phone number" type="text" name="phone_number">
            </div>
            
            <!-- <div>
                <button class="btn waves-effect waves-light" type="submit">Submit</button>
            </div> -->
            <div style="justify-content: space-between; display: flex;">
                <a href="/" class="waves-effect waves-light btn">Cancel</a>
                <button style="margin: 10px;" type="submit" class="btn btn-primary ml-3" type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>

