<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div>
    <div>
        <div>
            @if ($message = Session::get('success'))
                <divrole="alert">
                    {{ $message }}
                </div>
                <img src="img_source/{{ Session::get('image') }}" class="mb-2" style="width:400px;height:400px;">
            @endif
            <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
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
       
                <div>
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </form>
            
        </div>
    </div>
</div>
</body>
</html>