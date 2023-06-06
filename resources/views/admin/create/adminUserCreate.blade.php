@extends('admin.adminLayout')

@section('head')
<title>PURENITUR Admin Dashboard</title>
@endsection

@section('title', 'Create Data User')

@section('content')
<div class="row d-flex mt-5 mb-5 justify-content-center align-items-center">
    <div class="col-10 d-flex justify-content-center align-items-center">
        <form action="/admin/users/create/create" method="GET">
            <div class="mt-2 mb-2">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="username">Username</label>
                <input id="username" name="username" type="text" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="first_name">First Name</label>
                <input id="first_name" name="first_name" type="text" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="last_name">Last Name</label>
                <input id="last_name" name="last_name" type="text" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label>Gender</label>
                <div class="mr-1">
                    <input type="radio" id="man" name="gender" value="M" required />
                    <label for=" man">Man</label>
                </div>
                <div class="mr-1">
                    <input type="radio" id="woman" name="gender" value="W" required />
                    <label for=" woman">Woman</label>
                </div>
            </div>

            <div class="mt-2 mb-2">
                <label for="address">Address</label>
                <input id="address" name="address" type="text" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="telephone">No HP</label>
                <input id="telephone" name="telephone" type="number" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label>Is-Admin</label>
                <div class="mr-1">
                    <input type="radio" id="admin" name="is_admin" value="1" required />
                    <label for=" admin">Admin</label>
                </div>
                <div class="mr-1">
                    <input type="radio" id="not_admin" name="is_admin" value="0" required />
                    <label for=" not_admin">Not Admin</label>
                </div>
            </div>

            <div class="mt-2 mb-2">
                <button type="submit">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection