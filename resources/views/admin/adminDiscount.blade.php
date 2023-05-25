@extends('admin.adminLayout')

@section('head')
<title>PURENITUR Admin Dashboard</title>
@endsection

@section('title', 'Data Discount')

@section('content')
<div class="row d-flex mt-5 mb-5 justify-content-center align-items-center">
    <div class="col-10 d-flex justify-content-center align-items-center">
        <table class="table table-bordered" style="border:black">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Discount Name</th>
                    <th scope="col">Percentage</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_discount as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->name_discount }}</td>
                    <td>{{ $data->percentage }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection