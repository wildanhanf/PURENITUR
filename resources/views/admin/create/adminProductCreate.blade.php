@extends('admin.adminLayout')

@section('head')
<title>PURENITUR Admin Dashboard</title>
@endsection

@section('title', 'Create Data Product')

@section('content')
<div class="row d-flex mt-5 mb-5 justify-content-center align-items-center">
    <div class="col-10 d-flex justify-content-center align-items-center">
        <form action="/admin/products/create/create" method="GET">
            <div class="mt-2 mb-2">
                <label for="name_product">Product Name</label>
                <input id="name_product" name="name_product" type="text" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="category">Category</label>
                <input id="category" name="category" type="text" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="price">Price</label>
                <input id="price" name="price" type="number" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="image">Link Image</label>
                <input id="image" name="image" type="text" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="rating">Rating</label>
                <input id="rating" name="rating" type="number" step="0.1" min="1.0" max="5.0" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="feature_1">Fitur 1</label>
                <input id="feature_1" name="feature_1" type="text" style="border:1px solid black">
            </div>

            <div class="mt-2 mb-2">
                <label for="feature_2">Fitur 2</label>
                <input id="feature_2" name="feature_2" type="text" style="border:1px solid black">
            </div>

            <div class="mt-2 mb-2">
                <label for="feature_3">Fitur 3</label>
                <input id="feature_3" name="feature_3" type="text" style="border:1px solid black">
            </div>

            <div class="mt-2 mb-2">
                <label for="feature_4">Fitur 4</label>
                <input id="feature_4" name="feature_4" type="text" style="border:1px solid black">
            </div>

            <div class="mt-2 mb-2">
                <button type="submit">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection