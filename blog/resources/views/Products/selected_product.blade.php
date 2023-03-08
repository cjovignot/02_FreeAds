<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product->name}}</title>
</head>
<body>
    <h1>{{ $product->name }}</h1>

<p>Product ID : {{ $product->id }}</p>
<p>Product description : {{ $product->description }}</p>
<p>Product category ID : {{ $product->category_id }}</p>
<p>Product Sub category ID : {{ $product->sub_category_id }}</p>
<p>Product price : {{ $product->price }} €</p>
<p>Product image path : {{ $product->image_path }}</p>
<p>Product creator ID : {{ $product->created_by }}</p>


</body>

</html>