@extends('layouts.freeadds_layout')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

@section('content')
<!-- <link href="{{ asset('css/stylesheet.css') }}" rel="stylesheet"> -->


<container style="display:flex; justify-content:center; width:100%; margin-top:120px;">

<h4 style="position: fixed;z-index: 999;left: 20px;top: 8px;color: white;">HOME</h4>

    <div style="position: fixed; left: 20px; top: 100px; z-index: 999;" class="admin_menu">
    
        <div class="border">filter title</div>
        <div class="border">search</div>
        <div class="border">filter section</div>
        <div class="border">filter button</div>
    </div>

    <div style="display: flex; margin: auto; flex-direction: column;" class="card_container">
        @foreach($products as $product)
        <div style="margin: auto; margin-bottom: 20px; width: 100%;" class="row">
            <div style="width:100%;" class="col s12 m6">
            <div class="card">
                <div class="card-image">
                <img style="width:100%; height:auto;" src="{{ URL::asset($product->image_path) }}">
                <span style="color: #fff; position: absolute; bottom: 0; height: 40px; left: 0; background-color: #607d8ba3; max-width: 100%; border-radius: 0 20px 0 0; padding: 0 24px; width: 100%;;" class="card-title">{{ $product->name }}</span>
                <a style="position: absolute; right: 24px; bottom: -29px;" class="btn-floating halfway-fab waves-effect waves-light red"><i style="width: inherit; display: inline-block; text-align: center; color: #fff; font-size: 2.3rem; line-height: 34px;" class="material-icons">+</i></a>
                </div>
                <div style="display: flex; justify-content: space-between; padding: 24px;" class="details_card">
                    <div>
                        <div style="padding: 5px 0;" class="card-content">
                            <p>
                                @foreach($category as $category_name)
                                
                                    @if($category_name->id == $product->category_id)
                                        <strong style="font-size: 25px;">{{ $category_name['name'] }}</strong>
                                    @endif
                                @endforeach
                            </p>
                        </div>
                        <div style="padding: 5px 0;" class="card-content">
                        <p>{{ $product->description }}</p>
                        </div>
                    </div>
                    <div>
                        <div style="padding: 5px 0;" class="card-content">
                            <p><strong style="font-size: 25px; display: flex; justify-content: flex-end;">{{ $product->price }} €</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</container>
@endsection