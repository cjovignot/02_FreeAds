<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product->name}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
    <h1>{{ $product->name }}</h1>

<img style="height: 300px; width: 300px;" src="{{ URL::asset($product->image_path) }}">
<p>Product ID : {{ $product->id }}</p>
<p>Product description : {{ $product->description }}</p>
<p>Product category ID : {{ $product->category_id }}</p>
<p>Product Sub category ID : {{ $product->sub_category_id }}</p>
<p>Product price : {{ $product->price }} €</p>
<p>Product creator ID : {{ $product->created_by }}</p>


</body>

</html>