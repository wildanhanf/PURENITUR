@extends('admin.adminLayout')

@section('head')
<title>PURENITUR Admin Dashboard</title>
@endsection

@section('title', 'Edit Data Order')

@section('content')
<div class="row d-flex mt-5 mb-5 justify-content-center align-items-center">
    <div class="col-10 d-flex justify-content-center align-items-center">
        @foreach($data_order as $data)
        <form action="/admin/orders/edit/update" method="GET">
            <div class="mt-2 mb-2">
                <label for="id">ID</label>
                <input id="id" name="id" type="number" value="{{ $data->id }}" style="border:1px solid black" required readonly>
            </div>

            <div class="mt-2 mb-2">
                <label for="user_id">USER ID</label>
                <input id="user_id" name="user_id" type="number" value="{{ $data->user_id }}" style="border:1px solid black" required readonly>
            </div>

            <!-- <div class="mt-2 mb-2">
                <label for="full_name">Full Name</label>
                <input id="full_name" name="full_name" type="text" value="{{ $data->first_name }} {{ $data->last_name }}" style="border:1px solid black" required readonly>
            </div> -->

            <div class="mt-2 mb-2">
                <span>Cart</span>
                <a href="">View Cart</a>
            </div>

            <div class="mt-2 mb-2">
                <label for="price_total">Total Price</label>
                <input id="price_total" name="price_total" type="number" value="{{ $data->price_total }}" style="border:1px solid black" required readonly>
            </div>

            <div class="mt-2 mb-2">
                <label for="discount_id">Discount ID</label>
                <input id="discount_id" name="discount_id" type="text" value="{{ $data->discount_id }}" style="border:1px solid black">
            </div>

            <div class="mt-2 mb-2">
                <label for="final_price">Final Price</label>
                <input id="final_price" name="final_price" type="number" value="{{ $data->final_price }}" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="transaction_id">Transaction ID</label>
                <input id="transaction_id" name="transaction_id" type="number" value="{{ $data->transaction_id }}" style="border:1px solid black" required readonly>
            </div>

            <div class="mt-2 mb-2">
                <label for="payment_type">Payment Type</label>
                <input id="payment_type" name="payment_type" type="text" value="{{ $data->payment_type }}" style="border:1px solid black" required readonly>
            </div>

            <div class="mt-2 mb-2">
                <label for="status_payment">Status Payment</label>
                <select name="status_payment" id="status_payment">
                    @if($data->status_payment == 'WAITING FOR PAYMENT')
                    <option value="WAITING FOR PAYMENT" selected>WAITING FOR PAYMENT</option>
                    <option value="WAITING FOR CONFIRMATION">WAITING FOR CONFIRMATION</option>
                    <option value="FAILED">FAILED</option>
                    <option value="CONFIRMED">CONFIRMED</option>
                    @elseif($data->status_payment == 'WAITING FOR CONFIRMATION')
                    <option value="WAITING FOR PAYMENT">WAITING FOR PAYMENT</option>
                    <option value="WAITING FOR CONFIRMATION" selected>WAITING FOR CONFIRMATION</option>
                    <option value="FAILED">FAILED</option>
                    <option value="CONFIRMED">CONFIRMED</option>
                    @elseif($data->status_payment == 'FAILED')
                    <option value="WAITING FOR PAYMENT">WAITING FOR PAYMENT</option>
                    <option value="WAITING FOR CONFIRMATION">WAITING FOR CONFIRMATION</option>
                    <option value="FAILED" selected>FAILED</option>
                    <option value="CONFIRMED">CONFIRMED</option>
                    @elseif($data->status_payment == 'CONFIRMED')
                    <option value="WAITING FOR PAYMENT">WAITING FOR PAYMENT</option>
                    <option value="WAITING FOR CONFIRMATION">WAITING FOR CONFIRMATION</option>
                    <option value="FAILED">FAILED</option>
                    <option value="CONFIRMED" selected>CONFIRMED</option>
                    @endif
                </select>
            </div>

            <div class="mt-2 mb-2">
                <span>Image Payment</span>
                <a href="">View Image</a>
            </div>

            <div class="mt-2 mb-2">
                <label for="shipment_id">Shipment ID</label>
                @if(empty($data->shipment_id))
                <select name="shipment_id" id="shipment_id">
                    <option value="" selected>Null</option>
                    <option value="{{ $data->id }}">{{ $data->id }}</option>
                </select>
                @else
                <input id="shipment_id" name="shipment_id" type="number" value="{{ $data->shipment_id }}" style="border:1px solid black" required readonly>
                @endif
            </div>

            <div class="mt-2 mb-2">
                <label for="shipment_status">Shipment Status</label>
                @if(empty($data->shipment_id))
                <select name="shipment_status" id="shipment_status">
                    <option value="" selected>Null</option>
                    <option value="SHIPPING">SHIPPING</option>
                </select>
                @elseif($data->shipment_status == 'SHIPPING')
                <select name="shipment_status" id="shipment_status">
                    <option value="SHIPPING">SHIPPING</option>
                    <option value="ARRIVED">ARRIVED</option>
                </select>
                @else
                <input id="shipment_status" name="shipment_status" type="text" value="{{ $data->shipment_status }}" style="border:1px solid black" required readonly>
                @endif
            </div>

            <div class="mt-2 mb-2">
                <label for="shipment_address">Shipment Address</label>
                <input id="shipment_address" name="shipment_address" type="text" value="{{ $data->shipment_address }}" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="created_at">Created At</label>
                <input id="created_at" name="created_at" type="datetime" value="{{ $data->created_at }}" style="border:1px solid black" readonly>
            </div>

            <div class="mt-2 mb-2">
                <label for="updated_at">Updated At</label>
                <input id="updated_at" name="updated_at" type="datetime" value="{{ $data->updated_at }}" style="border:1px solid black">
            </div>

            <div class="mt-2 mb-2">
                <button type="submit">Update</button>
            </div>
        </form>
        @endforeach
    </div>
</div>
@endsection