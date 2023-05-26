@extends('admin.adminLayout')

@section('head')
<title>PURENITUR Admin Dashboard</title>
@endsection

@section('title', 'Edit Data User')

@section('content')
<div class="row d-flex mt-5 mb-5 justify-content-center align-items-center">
    <div class="col-10 d-flex justify-content-center align-items-center">
        @foreach($data_user as $data)
        <form action="/admin/users/edit/update" method="GET">
            <div class="mt-2 mb-2">
                <label for="id">ID</label>
                <input id="id" name="id" type="number" value="{{ $data->id }}" style="border:1px solid black" required readonly>
            </div>

            <div class="mt-2 mb-2">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ $data->email }}" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="username">Username</label>
                <input id="username" name="username" type="text" value="{{ $data->username }}" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="first_name">First Name</label>
                <input id="first_name" name="first_name" type="text" value="{{ $data->first_name }}" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="last_name">Last Name</label>
                <input id="last_name" name="last_name" type="text" value="{{ $data->last_name }}" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="gender">Gender</label>
                <input id="gender" name="gender" type="text" value="{{ $data->gender }}" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="address">Address</label>
                <input id="address" name="address" type="text" value="{{ $data->address }}" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="telephone">No HP</label>
                <input id="telephone" name="telephone" type="number" value="{{ $data->telephone }}" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="is_admin">Is-Admin</label>
                <input id="is_admin" name="is_admin" type="number" value="{{ $data->is_admin }}" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <button type="submit">Update</button>
            </div>
        </form>
        @endforeach
    </div>
</div>
@endsection