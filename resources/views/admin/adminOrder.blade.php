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
                    <!-- <th scope="col">Full Name</th> -->
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
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_order as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>
                        <form action="/admin/orders/view-user" method="POST">
                            @csrf
                            <input id="user_id" name="user_id" type="hidden" value="{{ $data->user_id }}">
                            <button type="submit" style="background-color:gray; color:white">View User</button>
                        </form>
                    </td>
                    <td>
                        <form action="/admin/orders/view-cart" method="POST">
                            @csrf
                            <input id="id" name="id" type="hidden" value="{{ $data->id }}">
                            <input id="cart" name="cart" type="hidden" value="{{ $data->cart }}">
                            <button type="submit" style="background-color:blue; color:white">View Cart</button>
                        </form>
                    </td>
                    <td>{{ $data->price_total }}</td>
                    @if(empty($data->discount->id))
                    <td>EMPTY</td>
                    @else
                    <td>{{ $data->discount_id }}</td>
                    @endif
                    <td>{{ $data->final_price }}</td>
                    <td>{{ $data->transaction_id }}</td>
                    <td>{{ $data->payment_type }}</td>
                    <td>{{ $data->status_payment }}</td>
                    <td><a href="{{ asset('') }}{{ $data->image_payment }}">View Image</a>
                        <img src="" />
                    </td>
                    @if(empty($data->shipment_id))
                    <td colspan="2">Belum Dikirim</td>
                    @else
                    <td>{{ $data->shipment_id }}</td>
                    <td>{{ $data->shipment_status }}</td>
                    @endif
                    <td>{{ $data->shipment_address }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->updated_at }}</td>
                    <td>
                        <form action="/admin/orders/edit" method="GET" class="mb-2">
                            @csrf
                            <input id="id" name="id" type="hidden" value="{{ $data->id }}">
                            <button type="submit" style="background-color:orange">Edit</button>
                        </form>
                        <form action="/admin/orders/edit/delete" method="GET">
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