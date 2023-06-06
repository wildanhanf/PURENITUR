@extends('admin.adminLayout')

@section('head')
<title>PURENITUR Admin Dashboard</title>
@endsection

@section('title', 'Create Data Discount')

@section('content')
<div class="row d-flex mt-5 mb-5 justify-content-center align-items-center">
    <div class="col-10 d-flex justify-content-center align-items-center">
        <form action="/admin/discounts/create/create" method="GET">
            <div class="mt-2 mb-2">
                <label for="name_discount">Discount Name</label>
                <input id="name_discount" name="name_discount" type="text" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="percentage">Percentage</label>
                <input id="percentage" name="percentage" type="number" min="1" max="100" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <button type="submit">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection