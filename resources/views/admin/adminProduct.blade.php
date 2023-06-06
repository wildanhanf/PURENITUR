@extends('admin.adminLayout')

@section('head')
<title>PURENITUR Admin Dashboard</title>
@endsection

@section('title', 'Data Product')

@section('content')
<div class="row d-flex justify-content-center align-items-center">
    <a href="/admin/products/create" class="text-center">
        <button style="background-color:yellow">Create New Product</button>
    </a>
</div>
<div class="row d-flex mt-5 mb-5 justify-content-center align-items-center">
    <div class="col-10 d-flex justify-content-center align-items-center">
        <table class="table table-bordered" style="border:black">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">SKU</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Sold</th>
                    <th scope="col">Fitur 1</th>
                    <th scope="col">Fitur 2</th>
                    <th scope="col">Fitur 3</th>
                    <th scope="col">Fitur 4</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_product as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->name_product }}</td>
                    <td>{{ $data->category }}</td>
                    <td>{{ $data->sku }}</td>
                    <td>{{ $data->price }}</td>
                    <td><img src="{{ $data->image }}" style="width:80px; height:80px"></td>
                    <td>{{ $data->rating }}</td>
                    <td>{{ $data->sold }}</td>
                    <td>{{ $data->feature_1 }}</td>
                    <td>{{ $data->feature_2 }}</td>
                    <td>{{ $data->feature_3 }}</td>
                    <td>{{ $data->feature_4 }}</td>
                    <td>
                        <form action="/admin/products/edit" method="GET">
                            @csrf
                            <input id="id" name="id" type="hidden" value="{{ $data->id }}">
                            <button type="submit" style="background-color:orange">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="/admin/products/edit/delete" method="GET">
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