@section('title')
Payment
@endsection

@section('js_script')
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
@endsection

@extends('layouts.app')

@section('content')
@if (Auth::user())
<section>
    <div class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center pt-12 pl-20 space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="#" class="inline-flex items-center text-sm font-normal text-gray-700">
                    <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="#7D7D7D" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
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

<section>
    <div class="container d-flex justify-content-center mt-5">
        <h1 class="mb-10 pl-20 text-2xl font-bold">Checkout</h1>
        <div class="card">
            <form method="GET" action="/payments">
                <div>
                    <!-- <div class="d-flex pt-3 pl-3">
                        {{-- <div><img src="https://img.icons8.com/ios-filled/50/000000/visa.png" width="60" height="80" /></div> --}}
                    </div> -->

                    <div>
                        <input id="id" type="hidden" name="id" value="{{ old('id', $user->id) }}" required readonly>
                        <input id="cart" type="hidden" name="cart" value="{{ $cart }}" required readonly>
                    </div>

                    <div class="second pl-2 d-flex py-2">
                        <div class="form-check">
                        </div>

                        <div class="border-left pl-2"><span class="head">Email</span>
                            <div class="d-flex"><span>{{ old('email', $user->email) }}</span></div>
                        </div>
                    </div>

                    <div class="second pl-2 d-flex py-2">
                        <div class="form-check">
                        </div>

                        <div class="border-left pl-2"><span class="head">Username</span>
                            <div class="d-flex"><span>{{ old('username', $user->username) }}</span></div>
                        </div>
                    </div>

                    <div class="second pl-2 d-flex py-2">
                        <div class="form-check">
                        </div>

                        <div class="border-left pl-2"><span class="head">Full Name</span>
                            <div class="d-flex"><span>{{ old('first_name', $user->first_name) }} {{ old('last_name', $user->last_name) }}</span></div>
                        </div>
                    </div>

                    <div class="second pl-2 d-flex py-2">
                        <div class="form-check">
                        </div>

                        <div class="border-left pl-2"><span class="head">Total Price</span>
                            <div class="d-flex"><span>{{ $total_price }}</span></div>
                        </div>

                        <input id="total_price" type="hidden" name="total_price" value="{{ $total_price }}" required readonly>
                    </div>

                    <div class="second pl-2 d-flex py-2">
                        <div class="form-check">
                        </div>

                        <div class="border-left pl-2"><span class="head">Input Discount ID</span>
                        </div>

                        <input id="discount_id" type="text" name="discount_id" style="border:1px solid black">
                    </div>

                    <div class="second pl-2 d-flex py-2">
                        <div class="form-check">
                        </div>

                        <div class="border-left pl-2"><span class="head">Final Price</span>
                            <div class="d-flex"><span>{{ $total_price }}</span></div>
                        </div>

                        <input id="final_price" type="hidden" name="final_price" value="{{ $total_price }}" required readonly>
                    </div>

                    <!-- <div class="second pl-2 d-flex py-2">
                        <div class="form-check">
                        </div>

                        <div class="border-left pl-2"><span class="head">Cart</span>
                            <div class="d-flex"><span>{{ $cart }}</span></div>
                        </div>

                        <input id="cart" type="hidden" name="cart" value="{{ $cart }}" required readonly>
                    </div> -->

                    <div class="second pl-2 d-flex py-2">
                        <div class="form-check">
                        </div>

                        <div class="border-left pl-2">
                            <p class="head">Select Payment Method :</p>
                            <p>Untuk Sekarang, Payment Method Hanya Transfer</p>
                            <input id="payment_method" type="hidden" name="payment_method" value="Bank Transfer BCA" required readonly>
                        </div>
                    </div>

                    <div class="second pl-2 d-flex py-2">
                        <div class="border-left pl-2">
                            <p class="head">Pastikan data-data sudah sesuai!</p>
                        </div>
                    </div>

                </div>

                <div class="d-flex justify-content-between px-3 pt-4 pb-3">
                    <a href="{{ route('cart') }}">
                        <div><span class="back">Go Back</span></div>
                    </a>
                    <button type="submit" id="pay-button" class="btn btn-warning button">Lanjut ke Pembayaran</button>
                </div>
            </form>
        </div>
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