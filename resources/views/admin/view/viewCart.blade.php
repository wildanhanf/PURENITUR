@extends('admin.adminLayout')

@section('head')
<title>PURENITUR Admin Dashboard</title>
@endsection

@section('title', 'Data Cart')

@section('content')
<div class="row d-flex mt-5 mb-5 justify-content-center align-items-center">
    <div class="col-10 d-flex justify-content-center align-items-center">
        @foreach($json as $data)
        <table>
            <thead>
                <th colspan="2">Data Barang {{ $loop->iteration }}</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label for="rowId" style="font-weight:bold">Row ID</label>
                        <span id="rowId" name="rowId">: {{ $data->rowId }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="name" style="font-weight:bold">Name</label>
                        <span id="name" name="name">: {{ $data->name }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="category" style="font-weight:bold">Category</label>
                        <span id="category" name="category">: {{ $data->model->category }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="sku" style="font-weight:bold">SKU</label>
                        <span id="sku" name="sku">: {{ $data->model->sku }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="base_price" style="font-weight:bold">Base Price</label>
                        <span id="base_price" name="base_price">: Rp. {{ $data->model->price }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="image" style="font-weight:bold">Image</label><br>
                        <img name="image" id="image" src="{{ $data->model->image }}" style="width:80px;height:80px">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="rating" style="font-weight:bold">Rating</label>
                        <span id="rating" name="rating">: {{ $data->model->rating }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="sold" style="font-weight:bold">Sold</label>
                        <span id="sold" name="sold">: {{ $data->model->sold }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="qty" style="font-weight:bold">Quantity</label>
                        <span id="qty" name="qty">: {{ $data->qty }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="total_price" style="font-weight:bold">Total Price</label>
                        <span id="total_price" name="total_price">: Rp. {{ $data->price }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="tax" style="font-weight:bold">Pajak</label>
                        <span id="tax" name="tax">: Rp. {{ $data->tax }}</span>
                    </td>
                </tr>
            </tbody>
        </table>
        @endforeach
    </div>
</div>
@endsection