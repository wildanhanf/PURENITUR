@extends('admin.adminLayout')

@section('head')
<title>PURENITUR Admin Dashboard</title>
@endsection

@section('title', 'Data Shipment')

@section('content')
<div class="row d-flex mt-5 mb-5 justify-content-center align-items-center">
    <div class="col-10 d-flex justify-content-center align-items-center">
        <table class="table table-bordered" style="border:black">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Shipment Name</th>
                    <th scope="col">Shipment Type</th>
                    <th scope="col">Day Estimation</th>
                    <th scope="col">Shipment Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_shipment as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->name_shipment }}</td>
                    <td>{{ $data->type_shipment }}</td>
                    <td>{{ $data->day_estimation }}</td>
                    <td>{{ $data->price_shipment }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection