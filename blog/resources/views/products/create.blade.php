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
                        <select name="category">
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
                    <div>
                        <strong>Product Sub Category :</strong>
                        <select name="sub_category">
                            <option value="0"> -- Choose a sub category -- </option>
                                @foreach ($sub_categories as $sub_category)
                                    <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                                @endforeach
                        </select>
                        @error('sub_category')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>
                </div>




                <div>
                    <div>
                        @if ($message = Session::get('success'))
                            <divrole="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <img src="img_source/{{ Session::get('image') }}" style="width:400px;height:400px;">
                        @endif
                
                        <!-- <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data"> -->
                            @csrf
                
                            <div>
                                <strong>Product Picture :</strong>
                                <input 
                                    type="file" 
                                    name="image" 
                                    id="inputImage"
                                    class="form-control @error('image') is-invalid @enderror">
                
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>                
                        <!-- </form> -->
                    </div>
                </div>







                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>