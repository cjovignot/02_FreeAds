<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My products</title>
</head>

<style>th{border:1px black solid; width=280px;}td{border:1px black solid;}</style>

<body>
    <div>
        <div>
            <div>
                <div>
                    <h2>My products</h2>
                </div>
                <div>
                    <a href="{{ route('products.create') }}"> Create Product</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div>
                <p>{{ $message }}</p>
            </div>
        @endif
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Product Price</th>
                    <th>Created By</th>
                    <th>Picture</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><a href="{{route('products.show', $product->id)}}">{{ $product->name }}</a></td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->created_by }}</td>
                        <td><img style="height: 100px; width: 100px;" src="{{ URL::asset($product->image_path) }}"></td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id) }}" method="Post">
                                <a href="{{ route('products.edit', $product->id) }}">Update</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>