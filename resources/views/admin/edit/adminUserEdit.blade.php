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
                <input id="email" name="email" type="email" value="{{ $data->email }}" style="border:1px solid black" required readonly>
            </div>

            <div class="mt-2 mb-2">
                <label for="username">Username</label>
                <input id="username" name="username" type="text" value="{{ $data->username }}" style="border:1px solid black" required readonly>
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
                <label>Gender</label>
                @if($data->gender == 'M')
                <div class="mr-1">
                    <input type="radio" id="man" name="gender" value="M" required checked="checked" />
                    <label for=" man">Man</label>
                </div>
                <div class="mr-1">
                    <input type="radio" id="woman" name="gender" value="W" required />
                    <label for=" woman">Woman</label>
                </div>
                @elseif($data->gender == 'W')
                <div class="mr-1">
                    <input type="radio" id="man" name="gender" value="M" required />
                    <label for=" man">Man</label>
                </div>
                <div class="mr-1">
                    <input type="radio" id="woman" name="gender" value="W" required checked="checked" />
                    <label for=" woman">Woman</label>
                </div>
                @endif
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
                <label>Is-Admin</label>
                @if($data->is_admin == '1')
                <div class="mr-1">
                    <input type="radio" id="admin" name="is_admin" value="1" required checked="checked" />
                    <label for=" admin">Admin</label>
                </div>
                <div class="mr-1">
                    <input type="radio" id="not_admin" name="is_admin" value="0" required />
                    <label for=" not_admin">Not Admin</label>
                </div>
                @elseif($data->is_admin == '0')
                <div class="mr-1">
                    <input type="radio" id="admin" name="is_admin" value="1" required />
                    <label for=" admin">Admin</label>
                </div>
                <div class="mr-1">
                    <input type="radio" id="not_admin" name="is_admin" value="0" required checked="checked" />
                    <label for=" not_admin">Not Admin</label>
                </div>
                @endif
            </div>

            <div class="mt-2 mb-2">
                <button type="submit">Update</button>
            </div>
        </form>
        @endforeach
    </div>
</div>
@endsection