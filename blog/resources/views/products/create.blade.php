<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create product</title>
</head>

<body>
    <div>
        <div>
            <div>
                <div>
                    <h2>Add Product</h2>
                </div>
                <div>
                    <a href="{{ route('products.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div>
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <div>
                    <div>
                        <strong>Product Name :</strong>
                        <input type="text" name="name" class="form-control" placeholder="Product Name">
                        @error('name')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <div>
                        <strong>Product Description :</strong>
                        <input type="text" name="description" placeholder="Product description">
                        @error('description')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <div>
                        <strong>Product Price :</strong>
                        <input type="int" name="price" placeholder="Product price">
                        @error('price')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <div>
                        <strong>Product Category :</strong>
                        <input type="int" name="category_id" placeholder="Product category">
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