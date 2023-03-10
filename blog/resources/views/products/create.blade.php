<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
                        <select name="category_id">
                            <option value="0"> -- Choose a category -- </option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                        </select>
                        @error('category')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    @if ($message = Session::get('success'))
                        <divrole="alert">
                            {{ $message }}
                        </div>
                        <img src="img_source/{{ Session::get('image') }}" class="mb-2" style="width:400px;height:400px;">
                    @endif
                        @csrf
            
                        <div>
                            <label class="form-label" for="inputImage">Select Image:</label>
                            <input 
                                type="file" 
                                name="image" 
                                id="inputImage"
                                class="form-control @error('image') is-invalid @enderror">
            
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>

                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>