@extends('layout')
@section('title', 'Registration')
@section('content')
    <div class="container">
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
        <form action="{{route('login.post')}}" method="POST">
            @csrf
            <div>
                <label for="email">Email address</label>
                <input type="email" name="email">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>

    </div>
@endsection