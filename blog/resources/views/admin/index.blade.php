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
            <tr>
                <th>USERS</th>
                    <td></td>
                <th>ADMINS</th>
                <th>CATEGORIES</th>
                <th>PRODUCTS</th>
            </tr>
            <tr>
                <td>QTE_USERS</td>
                <td>QTE_ADMINS</td>
                <td>QTE_CATEGORIES</td>
                <td>QTE_PRODUCTS</td>
            </tr>
        </div>
    </div>
</div>
@endsection