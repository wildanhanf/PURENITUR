@extends('admin.adminLayout')

@section('head')
<title>PURENITUR Admin Dashboard</title>
@endsection

@section('title', 'Data User')

@section('content')
<div class="row d-flex mt-5 mb-5 justify-content-center align-items-center">
    <div class="col-10 d-flex justify-content-center align-items-center">
        @foreach($data_user as $data)
        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="id" style="font-weight:bold">ID</label>
                        <span id="id" name="id">: {{ $data->id }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email" style="font-weight:bold">Email</label>
                        <span id="email" name="email">: {{ $data->email }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="username" style="font-weight:bold">Username</label>
                        <span id="username" name="username">: {{ $data->username }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="first_name" style="font-weight:bold">First Name</label>
                        <span id="first_name" name="first_name">: {{ $data->first_name }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="last_name" style="font-weight:bold">Last Name</label>
                        <span id="last_name" name="last_name">: {{ $data->last_name }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="gender" style="font-weight:bold">Gender</label>
                        <span id="gender" name="gender">: {{ $data->gender }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address" style="font-weight:bold">Address</label>
                        <span id="address" name="address">: {{ $data->address }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="telephone" style="font-weight:bold">Telephone</label>
                        <span id="telephone" name="telephone">: {{ $data->telephone }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="is_admin" style="font-weight:bold">Is Admin</label>
                        <span id="is_admin" name="is_admin">:
                            @if($data->is_admin == 1)
                            Admin
                            @else
                            User
                            @endif
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
        @endforeach
    </div>
</div>
@endsection