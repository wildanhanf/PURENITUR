@extends('admin.adminLayout')

@section('head')
<title>PURENITUR Admin Dashboard</title>
@endsection

@section('title', 'Data Order')

@section('content')
<div class="row d-flex mt-5 mb-5 justify-content-center align-items-center">
    <div class="col-10 d-flex justify-content-center align-items-center">
        <table class="table table-bordered" style="border:black">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User_ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Cart</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Discount ID</th>
                    <th scope="col">Final Price</th>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Payment Type</th>
                    <th scope="col">Status Payment</th>
                    <th scope="col">Image Payment</th>
                    <th scope="col">Shipment ID</th>
                    <th scope="col">Shipment Status</th>
                    <th scope="col">Shipment Address</th>
                    <th scope="col">Timestamp Order</th>
                    <th scope="col">Timestamp Update</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_order as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->user_id }}</td>
                    <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                    <td>JSON NYA NANTI YAK</td>
                    <td>{{ $data->price_total }}</td>
                    <td>{{ $data->discount_id }}</td>
                    <td>{{ $data->final_price }}</td>
                    <td>{{ $data->transaction_id }}</td>
                    <td>{{ $data->payment_type }}</td>
                    <td>{{ $data->status_payment }}</td>
                    <td>{{ $data->image_payment }}</td>
                    <td>{{ $data->shipment_id }}</td>
                    <td>{{ $data->shipment_status }}</td>
                    <td>{{ $data->shipment_address }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection