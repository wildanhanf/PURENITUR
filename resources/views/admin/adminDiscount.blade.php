@extends('admin.adminLayout')

@section('head')
<title>PURENITUR Admin Dashboard</title>
@endsection

@section('title', 'Data Discount')

@section('content')
<div class="row d-flex justify-content-center align-items-center">
    <a href="/admin/discounts/create" class="text-center">
        <button style="background-color:yellow">Create New Discount</button>
    </a>
</div>
<div class="row d-flex mt-5 mb-5 justify-content-center align-items-center">
    <div class="col-10 d-flex justify-content-center align-items-center">
        <table class="table table-bordered" style="border:black">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Discount Name</th>
                    <th scope="col">Percentage</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_discount as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->name_discount }}</td>
                    <td>{{ $data->percentage }}</td>
                    <td>
                        <form action="/admin/discounts/edit" method="GET">
                            @csrf
                            <input id="id" name="id" type="hidden" value="{{ $data->id }}">
                            <button type="submit" style="background-color:orange">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="/admin/discounts/edit/delete" method="GET">
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