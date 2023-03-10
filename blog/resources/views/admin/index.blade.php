<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
@extends('layouts.freeadds_layout')

@section('content')

<h4 style="position: fixed;z-index: 999;left: 20px;top: 8px;color: white;">ADMIN PANEL</h4>

<div style="display:flex; justify-content:center; width:100%; margin-top:100px; border: none;" class="container">
    <div class="flex">


        @include('layouts.adminmenu')

    </div>
</div>
@endsection