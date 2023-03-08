@extends('layouts.freeadds_layout')

@section('content')

<link href="{{ asset('css/stylesheet.css') }}" rel="stylesheet">





<div>
    <h1>THIS IS THE admin PANEL</h1>
</div>




<div class="container">
    <div class="flex">

        <div class="border filter">

            @include('layouts.adminmenu')


        </div>

        <div class="border productcontainer">
            admin index display
        </div>

    </div>

</div>
@endsection