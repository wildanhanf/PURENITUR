@extends('admin.adminLayout')

@section('head')
<title>PURENITUR Admin Dashboard</title>
@endsection

@section('title', 'Edit Data Product')

@section('content')
<div class="row d-flex mt-5 mb-5 justify-content-center align-items-center">
    <div class="col-10 d-flex justify-content-center align-items-center">
        @foreach($data_product as $data)
        <form action="/admin/products/edit/update" method="GET">
            <div class="mt-2 mb-2">
                <label for="id">ID</label>
                <input id="id" name="id" type="number" value="{{ $data->id }}" style="border:1px solid black" required readonly>
            </div>

            <div class="mt-2 mb-2">
                <label for="name_product">Product Name</label>
                <input id="name_product" name="name_product" type="text" value="{{ $data->name_product }}" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="category">Category</label>
                <input id="category" name="category" type="text" value="{{ $data->category }}" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="sku">SKU</label>
                <input id="sku" name="sku" type="text" value="{{ $data->sku }}" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="price">Price</label>
                <input id="price" name="price" type="number" value="{{ $data->price }}" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="image">Image</label>
                <input id="image" name="image" type="text" value="{{ $data->image }}" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="rating">Rating</label>
                <input id="rating" name="rating" type="number" step="0.1" min="1.0" max="5.0" value="{{ $data->rating }}" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="sold">Sold</label>
                <input id="sold" name="sold" type="number" value="{{ $data->sold }}" style="border:1px solid black" required>
            </div>

            <div class="mt-2 mb-2">
                <label for="feature_1">Fitur 1</label>
                <input id="feature_1" name="feature_1" type="text" value="{{ $data->feature_1 }}" style="border:1px solid black">
            </div>

            <div class="mt-2 mb-2">
                <label for="feature_2">Fitur 2</label>
                <input id="feature_2" name="feature_2" type="text" value="{{ $data->feature_2 }}" style="border:1px solid black">
            </div>

            <div class="mt-2 mb-2">
                <label for="feature_3">Fitur 3</label>
                <input id="feature_3" name="feature_3" type="text" value="{{ $data->feature_3 }}" style="border:1px solid black">
            </div>

            <div class="mt-2 mb-2">
                <label for="feature_4">Fitur 4</label>
                <input id="feature_4" name="feature_4" type="text" value="{{ $data->feature_4 }}" style="border:1px solid black">
            </div>

            <div class="mt-2 mb-2">
                <button type="submit">Update</button>
            </div>
        </form>
        @endforeach
    </div>
</div>
@endsection