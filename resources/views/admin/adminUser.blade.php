@extends('admin.adminLayout')

@section('head')
<title>PURENITUR Admin Dashboard</title>
@endsection

@section('title', 'Data User')

@section('content')
<div class="row d-flex justify-content-center align-items-center">
    <a href="/admin/users/create" class="text-center">
        <button style="background-color:yellow">Create New User</button>
    </a>
</div>
<div class="row d-flex mt-5 mb-5 justify-content-center align-items-center">
    <div class="col-10 d-flex justify-content-center align-items-center">
        <table class="table table-bordered" style="border:black">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Address</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Is-Admin</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_user as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->first_name }}</td>
                    <td>{{ $data->last_name }}</td>
                    <td>{{ $data->gender }}</td>
                    <td>{{ $data->address }}</td>
                    <td>{{ $data->telephone }}</td>
                    @if($data->is_admin == 1)
                    <td style="background-color:green; color:white">
                        Admin
                    </td>
                    @else
                    <td>
                        User
                    </td>
                    @endif
                    <td>
                        <form action="/admin/users/edit" method="GET">
                            @csrf
                            <input id="id" name="id" type="hidden" value="{{ $data->id }}">
                            <button type="submit" style="background-color:orange">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="/admin/users/edit/delete" method="GET">
                            @csrf
                            <input id="id" name="id" type="hidden" value="{{ $data->id }}">
                            <button type="submit" style="background-color:red">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection