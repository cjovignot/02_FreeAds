@extends("layouts.freeadds_layout")

<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Registration</title>
</head>


<h4 style="position:fixed; z-index:999; left:20px; top:8px; color:white"> User Registration </h4>
<body>
    

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
                <label for="name">Name</label>
                <input type="text" name="name">
            </div>

            <div class="input-field col s12">
                <label for="email">Email address</label>
                <input type="email" name="email">
            </div>

            <div class="input-field col s12">
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>

            <div class="input-field col s12">
                <label for="passwordverify">Verify Password</label>
                <input type="password" name="passwordverify">
            </div>

            <div class="input-field col s12">
                <label for="phone_number">Phone number</label>
                <input type="text" name="phone_number">
            </div>
            
            <div>
                <button class="btn waves-effect waves-light" type="submit">Submit</button>
            </div>
        </form>

</body>
</html>

