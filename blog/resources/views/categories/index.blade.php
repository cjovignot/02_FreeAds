<style>
    table tr td {
        border: 1px solid black;
    }

    h1 {
        color: blue;
    }
</style>



<h1>THIS IS THE CATEGORY PANEL</h1>



<!-- <p>This is the category table:

<table>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>parent ID</td>
        <td>Is Sub</td>
        <td>Update</td>
        <td>Delete</td>
    </tr>
    @foreach ($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->parent_id }}</td>
        <td>{{ $category->is_sub }}</td>
        <td><a href="">MAJ</a></td>
        <td><a href="">X</a></td>
    </tr>

    @endforeach
</table> -->


<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 9 CRUD Category </h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('categories.create') }}"> Create category</a>
            </div>
        </div>
    </div>
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