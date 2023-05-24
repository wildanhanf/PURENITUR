@section('title')
    Payment
@endsection

@extends('layouts.app')

@section('content')
    <section class="xl:mx-64 lg:mx-40 md:mx-48 sm:mx-24 mx-5">
        <div class="flex mb-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center pt-12 space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-normal text-gray-700">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="#7D7D7D" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
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
                <li>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="m7 21l7.9-18H17L9.1 21H7Z" />
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Checkout</span>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="m7 21l7.9-18H17L9.1 21H7Z" />
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Payment</span>
                    </div>
                </li>
            </ol>
        </div>
    </section>
    <section class="xl:mx-64 lg:mx-40 md:mx-48 sm:mx-24 mb-5 mx-5">
        <h1 class="mb-5 text-2xl font-bold">Payment</h1>
        @if ($data_order->count() > 0)
                <div class="rounded-lg md:w-2/3">
                    @foreach ($data_order as $data)
                        <form method="GET" action="/payments">
                            @csrf

                            <div
                                class="justify-between rounded-lg border bg-white p-5 shadow-md sm:flex sm:justify-start mb-5">
                                <div class="sm:mt-0">
                                    <h2 class="text-lg font-bold text-gray-900">ORDER ID : PRNTR-ORD-{{ $data->id }}
                                    </h2>
                                    <input id="id" type="hidden" name="id" value="{{ $data->id }}" required
                                        readonly>

                                    <h2 class="text-md font-bold text-gray-900">Status Pembayaran :
                                        {{ $data->status_payment }}</h2>

                                    @if ($data->transaction_id > 0)
                                        <p>Bukti Pembayaran sudah di upload</p>
                                        <p>Transaction Id : PRNTR-TR-{{ $data->transaction_id }}</p>
                                        <a class="mt-6 w-32 rounded-md bg-primary-1 py-1.5 font-medium text-white hover:bg-primary-2"
                                            href="{{ route('shipment') }}">Go to Shipment</a>
                                    @else
                                        <p class="mt-4 text-sm text-gray-700 font-medium">Lakukan pembayaran dalam 24 jam
                                            dari {{ $data->created_at }}</p>
                                        <div>
                                            <span class="inline-block mt-4 text-sm text-gray-700 font-medium mb-4">Upload Bukti
                                                Pembayaran</span><br>
                                            <input type="file" id="image_payment" name="image_payment" required>
                                        </div>
                                    @endif

                                    @if ($data->transaction_id > 0)
                                    @else
                                        <button
                                            class="mt-6 w-32 rounded-md bg-primary-1 py-1.5 font-medium text-white hover:bg-primary-2">Confirm</button>
                                    @endif
                                </div>
                            </div>

                        </form>
                    @endforeach
                </div>
                <!-- Sub total -->
                <p class="my-2 font-bold text-lg">Payment Method</p>
                <div class="mt-2 h-full rounded-lg border bg-primary-1 p-6 shadow-md md:mt-0 md:w-2/3">
                    <div class="mt-2 sm:mt-0">
                        <ol class="pl-4 max-w-md space-y-1 text-white list-decimal list-outside">
                            <li>
                                <span class="font-semibold">Pembayaran Hanya Transfer ke Bank BCA</span>
                            </li>
                            <li>
                                <span class="font-semibold">Rekening PURENITUR<br>BCA 111111111 an PT PURENITUR</span>
                            </li>
                            <li>
                                <span class="font-semibold">Simpan tanda bukti pembayaran.</span>
                            </li>
                            <li>
                                <span class="font-semibold">Upload Foto bukti pembayaran pada Formulir di samping</span>
                            </li>
                            <li>
                                <span class="font-semibold">Pembayaran akan dikonfirmasi paling lambat 1 x 24 jam,
                                    pembayaran akan otomatis batal jika melebihi waktu yang ditentukan.</span>
                            </li>
                        </ol>
                    </div>
                </div>
        @else
            <div class="mt-10 mb-10 rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                <div class="mb-2 text-center">
                    <p class="text-gray-700">Kamu belom belanja. <br>Yuk Belanja Dulu!</p>
                </div>
                <a href="{{ 'catalog' }}">
                    <button class="w-full rounded-md bg-primary-1 py-1.5 font-medium text-white hover:bg-primary-2">Go to
                        Catalog</button>
                </a>
            </div>
        @endif
    </section>
@endsection
