@extends('layouts.freeadds_layout')
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Freeads Users</title>
</head>

<h4 style="position: fixed; z-index: 999; left: 20px; top: 8px; color: white;">Freeads USERS</h4>

<body>
    <div style="display:flex; justify-content:center; width:100%; margin-top:100px; flex-direction: column; border: none;" class="container">
    @include('layouts.adminmenu')  
    <a class="btn btn-success" href="{{ route('users.create') }}">Create User</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User Password</th>
                    <th>User Phone number</th>
                    <th>Admin</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->admin }}</td>
                        <td>
                            <form action="{{ route('users.destroy',$user->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $users->links() !!}
    </div>
</body>
</html>