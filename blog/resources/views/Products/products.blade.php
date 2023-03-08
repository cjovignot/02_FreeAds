<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List of all products</title>
</head>
<body>
    <h1>List of all products</h1>


<table>
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>DESCRIPTION</th>
        <th>PRICE</th>
        <th>IMAGE_PATH</th>
        <th>CREATED BY</th>
        <th>CREATED AT</th>
        <th>UPDATED AT</th>
    </tr>

    @foreach($products as $product)

<tr>
    <td>{{$product->id}}</td>
    <td><a style="text-decoration: none; color: marine"; href="{{$product->id}}">{{$product->name}}</a></td>    <td>{{$product->description}}</td>
    <td>{{$product->price}} €</td>
    <td>{{$product->image_path}}</td>
    <td>{{$product->created_by}}</td>
    <td>{{$product->created_at}}</td>
    <td>{{$product->updated_at}}</td>
</tr>


    @endforeach
</table>

</body>

</html>