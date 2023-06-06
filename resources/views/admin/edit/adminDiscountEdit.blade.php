@extends('admin.adminLayout')

@section('head')
<title>PURENITUR Admin Dashboard</title>
@endsection

@section('title', 'Edit Data Discount')

@section('content')
<div class="row d-flex mt-5 mb-5 justify-content-center align-items-center">
    <div class="col-10 d-flex justify-content-center align-items-center">
        @foreach($data_discount as $data)
        <form action="/admin/discounts/edit/update" method="GET">
            <div class="mt-2 mb-2">
                <label for="id">ID</label>
                <input id="id" name="id" type="number" value="{{ $data->id }}" style="border:1px solid black" required readonly>
            </div>

            <div class="mt-2 mb-2">
                <label for="name_discount">Discount Name</label>
                <input id="name_discount" name="name_discount" type="text" value="{{ $data->name_discount }}" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="percentage">Percentage</label>
                <input id="percentage" name="percentage" type="number" min="1" max="100" value="{{ $data->percentage }}" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <button type="submit">Update</button>
            </div>
        </form>
        @endforeach
    </div>
</div>
@endsection