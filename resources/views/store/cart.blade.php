@section('title')
Cart
@endsection

@extends('layouts.app')

@section('content')
<section>
    <div class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center pt-12 pl-20 space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="#" class="inline-flex items-center text-sm font-normal text-gray-700">
                    <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="#7D7D7D" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m7 21l7.9-18H17L9.1 21H7Z"/></svg>
                    <a href="#" class="ml-1 text-sm font-normal text-gray-700 md:ml-2">Store</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m7 21l7.9-18H17L9.1 21H7Z"/></svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Cart</span>
                </div>
            </li>
        </ol>
    </div>

    <div class="flex flex-start ml-20 my-16">
        <h3 class="text-2xl font-semibold">Shopping Cart</h3>
    </div>

    <div class="container mx-auto flex flex-row px-20">
    <div class="flex flex-col items-center bg-white rounded-lg shadow md:flex-row md:max-w-xl basis-1/2 h-56 md:h-auto p-4 md:p-6">
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg p-4" src="/img/Logo.png" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Kasur Pitung</h5>
                <p class="mb-3 font-normal text-gray-700">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                <span><p class="font-bold">RP 150.000</p></span>
            </div>
        </div>

        <div class="basis-1/4 mx-auto">02</div>
    </div>
</section>
@endsection