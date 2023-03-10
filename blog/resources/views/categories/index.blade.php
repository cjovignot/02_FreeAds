@extends('layouts.freeadds_layout')

@section('content')

<h4 style="position: fixed; z-index: 999; left: 20px; top: 8px; color: white;">CATEGORIES</h4>

<body>
        <div style="display:flex; justify-content:center; width:100%; margin-top:100px; flex-direction: column; border: none;" class="container">  
@include('layouts.adminmenu')    
        <a class="btn btn-success" href="{{ route('categories.create') }}"> Create category</a>

            <div class="pull-right mb-2">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Category is_sub</th>
                            <th>Category Parent ID</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->is_sub }}</td>
                            <td>{{ $category->parent_id }}</td>
                            <td>
                                <form action="{{ route('categories.destroy',$category->id) }}" method="Post">
                                    <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</body>
@endsection