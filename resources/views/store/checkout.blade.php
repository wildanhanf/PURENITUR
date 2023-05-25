@section('title')
Checkout
@endsection

@section('js_script')
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
@endsection

@extends('layouts.app')

@section('content')
@if (Auth::user())
<section>
    <div class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center pt-12 pl-5 space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="#" class="inline-flex items-center text-sm font-normal text-gray-700">
                    <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="#7D7D7D" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                        </path>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="m7 21l7.9-18H17L9.1 21H7Z" />
                    </svg>
                    <a href="#" class="ml-1 text-sm font-normal text-gray-700 md:ml-2">Store</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="m7 21l7.9-18H17L9.1 21H7Z" />
                    </svg>
                    <a href="#" class="ml-1 text-sm font-normal text-gray-700 md:ml-2">Cart</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="m7 21l7.9-18H17L9.1 21H7Z" />
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Checkout</span>
                </div>
            </li>
        </ol>
    </div>
</section>

<section class="flex flex-wrap xl:mx-64 lg:mx-40 md:mx-48 sm:mx-24">
    <div class="container mt-5 mx-5">
        <h1 class="mb-5 text-2xl font-bold">Checkout Details</h1>
        <div class="card border border-slate-700 rounded-md p-5 mb-5">
            <form method="GET" action="/checkouts">
                <!-- <div class="d-flex pt-3 pl-3">
                                                            {{-- <div><img src="https://img.icons8.com/ios-filled/50/000000/visa.png" width="60" height="80" /></div> --}}
                                                        </div> -->

                <div>
                    <div class="flex flex-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="mr-2">
                            <path fill="currentColor" d="M7 22q-.825 0-1.413-.588T5 20q0-.825.588-1.413T7 18q.825 0 1.413.588T9 20q0 .825-.588 1.413T7 22Zm10 0q-.825 0-1.413-.588T15 20q0-.825.588-1.413T17 18q.825 0 1.413.588T19 20q0 .825-.588 1.413T17 22ZM6.15 6l2.4 5h7l2.75-5H6.15ZM5.2 4h14.75q.575 0 .875.513t.025 1.037l-3.55 6.4q-.275.5-.738.775T15.55 13H8.1L7 15h12v2H7q-1.125 0-1.7-.988t-.05-1.962L6.6 11.6L3 4H1V2h3.25l.95 2Zm3.35 7h7h-7Z" />
                        </svg>
                        <p class="font-semibold text-lg">Order Summary</p>
                    </div>
                    @foreach ($json as $item)
                    <p class="my-2 font-bold">Item {{ $loop->iteration }}</p>
                    <p class="my-2">Quantity : {{ $item->qty }}</p>
                    <p class="my-2">Name : {{ $item->model->name_product }}</p>
                    <p class="my-2">SKU : {{ $item->model->sku }}</p>
                    <p class="my-2">Price : {{ $item->model->price }}</p>
                    <img src="{{ $item->model->image }}" class="h-32 w-32 my-2 border border-primary-2 rounded-md p-2">
                    <hr class="h-1 my-8 bg-primary-2 border-0 rounded-md">
                    @endforeach
                </div>

                <div class="">
                    <div class="form-check">
                    </div>

                    <div class=""><span class="head font-semibold text-lg">Total Price</span>
                        <div class="my-2"><span>{{ $total_price }}</span></div>
                    </div>

                    <input id="total_price" type="hidden" name="total_price" value="{{ $total_price }}" required readonly>
                </div>

                <div>
                    <input id="id" type="hidden" name="id" value="{{ old('id', $user->id) }}" required readonly>
                    <input id="cart" type="hidden" name="cart" value="{{ $cart }}" required readonly>
                </div>

                <div class="">
                    <div class="form-check">
                    </div>

                    <div class=""><span class="my-2">Gunakan Kupon Diskon!!</span>
                    </div>

                    <input id="discount_id" type="text" name="discount_id" style="border:1px solid black" class="my-2 rounded-sm">
                </div>

                <div class="">
                    <div class="form-check">
                    </div>

                    <div class=""><span class="my-2">Final Price</span>
                        <div class="my-2"><span>{{ $total_price }}</span></div>
                    </div>

                    <input id="final_price" type="hidden" name="final_price" value="{{ $total_price }}" required readonly>
                </div>
        </div>

        <p class="my-2 font-bold text-lg">Payment Method</p>

        <div class="bg-primary-1 rounded-md mb-5">
            <ol class="text-white text-base p-8 list-outside list-decimal">
                <li>Checkout barang pada halaman ini untuk menerima kode pembayaran.</li>
                <li>Setelah menerima kode pembayaran, lakukan transfer pada nomor rekening yang tersedia.</li>
                <li>Simpan tanda bukti pembayaran.</li>
                <li>Isi formulir untuk memberikan bukti pembayaran kepada <b>Admin</b>.</li>
                <li>Pembayaran akan dikonfirmasi paling lambat 1 x 24 jam, pembayaran akan otomatis batal jika
                    melebihi waktu yang ditentukan.</li>
                <li>Anda akan menerima email apabila pembayaran terkonfirmasi, kemudian anda bisa melihat menu
                    pengiriman pada menu <b>Notifikasi</b>.</li>
            </ol>
        </div>

        <div class="card border border-slate-700 rounded-md p-5 mb-5">
            <div class="">
                <div class="form-check">
                </div>

                <div class="my-2">
                    <p>Untuk Sekarang, Payment Method Hanya Transfer</p>
                    <input id="payment_method" type="hidden" name="payment_method" value="Bank Transfer BCA" required readonly>
                </div>
            </div>

            <div class="">
                <div class="form-check">
                </div>

                <div class="my-2"><span class="head">Alamat Pengiriman</span>
                    <div class="my-2 border border-slate-700 rounded-sm">
                        <input type="text" id="shipment_address" name="shipment_address" value="{{ old('address', $user->address) }}"></input>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="my-2">
                    <p class="head">Pastikan data-data sudah sesuai!</p>
                </div>
            </div>
        </div>


        <div class="my-2 w-full rounded-md border-2 border-slate-700 h-12">
            <a href="{{ route('cart') }}" class="">
                <div class="text-center font-semibold py-2"><span class="back">Go Back</span></div>
            </a>
        </div>
        <button type="submit" id="pay-button" class="w-full bg-primary-1 rounded-md text-white mb-2 h-12">Lanjut
            ke
            Pembayaran</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        function send_response_to_form(result) {
            //jadi masukan hasil result berbentuk JSON yang telah di ubah ke bentuk string oleh JSON.stringify, ke dalam value json_callback
            document.getElementById('json_callback').value = JSON.stringify(result);

            // //buat coba-coba
            // alert(document.getElementById('json_callback').value);

            //submit hasil nya ke hidden form melalui id "submit_form"
            $('#submit_form').submit();
        }
    </script>
</section>
@else
<p>silahkan login dulu</p>
@endif
@endsection