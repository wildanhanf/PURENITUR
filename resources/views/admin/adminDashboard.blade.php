@extends('admin.adminLayout')

@section('head')
<title>PURENITUR Admin Dashboard</title>
@endsection

@section('content')
<div class="row d-flex mt-5 mb-5">
    <div class="col d-flex justify-content-center align-items-center">
        <ul>
            <li>
                <a href="{{ route('admin-user') }}">
                    <p>Data User</p>
                </a>
            </li>
            <li>
                <a href="{{ route('admin-product') }}">
                    <p>Data Product</p>
                </a>
            </li>
            <li>
                <a href="{{ route('admin-order') }}">
                    <p>Data Order</p>
                </a>
            </li>
            <li>
                <a href="{{ route('admin-customize-product') }}">
                    <p>Data Customize Product</p>
                </a>
            </li>
            <li>
                <a href="{{ route('admin-shipment') }}">
                    <p>Data Shipment</p>
                </a>
            </li>
            <li>
                <a href="{{ route('admin-discount') }}">
                    <p>Data Discount</p>
                </a>
            </li>
            <li>
                <a href="{{ route('home.index') }}">
                    <p>BACK TO WEBSITE</p>
                </a>
            </li>
        </ul>
    </div>
</div>
@endsection