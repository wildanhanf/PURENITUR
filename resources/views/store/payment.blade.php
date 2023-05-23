@section('title')
Payment
@endsection

@extends('layouts.app')

@section('content')
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
    <div class="h-screen pt-20">
        <h1 class="mb-10 pl-20 text-2xl font-bold">Payment</h1>
        <div class="mx-auto max-w-6xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
            <div class="rounded-lg md:w-2/3">
                @foreach($data_order as $data)
                <div class="justify-between mb-6 rounded-lg border bg-white p-6 shadow-md sm:flex sm:justify-start">
                    <div class="mt-5 sm:mt-0">
                        <h2 class="text-lg font-bold text-gray-900">ORDER ID : PRNTR-ORD-{{ $data->id }}</h2>
                        <h2 class="text-md font-bold text-gray-900">Status Pembayaran : Belum Upload Bukti Pembayaran</h2>
                        <p class="mt-4 text-sm text-gray-700 font-medium">Lakukan pembayaran dalam 24 jam dari (tanggal)</p>
                        <a class="inline-block mt-4 text-sm text-gray-700 font-medium hover:underline" href="https://www.google.com" target="_blank">Upload Bukti Pembayaran</a><br>
                        <button class="mt-6 w-32 rounded-md bg-primary-1 py-1.5 font-medium text-white hover:bg-primary-2" disabled>Confirm</button>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Sub total -->
            <div class="mt-6 h-full rounded-lg border bg-primary-1 p-6 shadow-md md:mt-0 md:w-2/3">
                <div class="mt-5 sm:mt-0">
                    <h2 class="text-lg font-bold text-gray-900">Payment Method</h2>
                    <ol class="pl-4 max-w-md space-y-1 text-gray-900 list-decimal list-outside">
                        <li>
                            <span class="font-semibold text-gray-900">Pembayaran Hanya Transfer ke Bank BCA</span>
                        </li>
                        <li>
                            <span class="font-semibold text-gray-900">Rekening PURENITUR<br>BCA 111111111 an PT PURENITUR</span>
                        </li>
                        <li>
                            <span class="font-semibold text-gray-900">Simpan tanda bukti pembayaran.</span>
                        </li>
                        <li>
                            <span class="font-semibold text-gray-900">Upload Foto bukti pembayaran pada Formulir di samping</span>
                        </li>
                        <li>
                            <span class="font-semibold text-gray-900">Pembayaran akan dikonfirmasi paling lambat 1 x 24 jam, pembayaran akan otomatis batal jika melebihi waktu yang ditentukan.</span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection