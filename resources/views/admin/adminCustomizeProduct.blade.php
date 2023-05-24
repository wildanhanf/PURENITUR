@extends('admin.adminLayout')

@section('head')
<title>PURENITUR Admin Dashboard</title>
@endsection

@section('title', 'Data Customize Product')

@section('content')
<div class="row d-flex mt-5 mb-5 justify-content-center align-items-center">
    <div class="col-10 d-flex justify-content-center align-items-center">
        <table class="table table-bordered" style="border:black">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Cabinets Cart</th>
                    <th scope="col">Beds Cart</th>
                    <th scope="col">Price Total</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_customize_product as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->name_product }}</td>
                    <td>{{ $data->user_id }}</td>
                    <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                    <td>{{ $data->cabinets_cart }}</td>
                    <td>{{ $data->beds_cart }}</td>
                    <td>{{ $data->price_total }}</td>
                    <td>{{ $data->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection