<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Product Form</title>
</head>

<body>
    <div>
        <div>
            <div>
                <div>
                    <h2>Edit Product</h2>
                </div>
                <div>
                    <a href="{{ route('products.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div>
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <div>
                    <div>
                        <strong>Product Name :</strong>
                        <input type="text" name="name" value="{{ $product->name }}" placeholder="Product name">
                        @error('name')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <div>
                        <strong>Product Description :</strong>
                        <input type="text" name="description" placeholder="Product Description" value="{{ $product->description }}">
                        @error('description')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <div>
                        <strong>Product Price :</strong>
                        <input type="integer" name="price" value="{{ $product->price }}" placeholder="Product Price">
                        @error('price')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>