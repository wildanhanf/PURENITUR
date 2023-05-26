@section('title')
Cart
@endsection
<div>
    @extends('landing.base')
    @section('content')
    @livewireStyles
    <section class="mt-8 xl:mx-64 lg:mx-40 md:mx-48 sm:mx-24">
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
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="m7 21l7.9-18H17L9.1 21H7Z" />
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Cart</span>
                    </div>
                </li>
            </ol>
        </div>
    </section>
    <section class="xl:mx-64 lg:mx-40 md:mx-48 sm:mx-24">
        <div class="pt-5">
            <h1 class="mb-10 p-5 text-2xl font-bold">Shopping Cart</h1>
            @if (Session::has('success_message'))
            <div class="alert alert-success">
                <strong>Sucess | {{ Session::get('success_message') }}</strong>
            </div>
            @endif
            <div class="mx-auto justify-center px-6 md:flex md:space-x-6 xl:px-0">
                <div class="grid grid-flow-row auto-rows-max justify-center">
                    <div class="grid grid-cols-1 auto-cols-auto p-5 gap-4">
                        @if (Cart::count() > 0)
                        @foreach (Cart::content() as $item)
                        <div class="rounded-lg md:w-2/3 xl:w-full">
                            <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start md:flex md:justify-start">
                                <img src="{{ $item->model->image }}" alt="product-image" class="w-full rounded-lg sm:w-40" />
                                <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                    <div class="mt-3 sm:mt-0">
                                        <h2 class="text-lg font-bold text-gray-900 mr-4">
                                            {{ $item->model->name_product }}
                                        </h2>
                                        <!-- <p class="mt-1 text-xs text-gray-700">Empuk bet coy asli dah.</p> -->
                                    </div>
                                    <div class="mt-2 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                        <div class="flex items-center border-gray-100">
                                            <form id="submits1" action="/dec-qty" method="GET" class="">
                                                @csrf
                                                <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                                                <button type="submit" class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-primary-1 hover:text-blue-50">-</button>
                                            </form>
                                            <!-- <a class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-primary-1 hover:text-blue-50" wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')">-</a> -->
                                            <span class="h-8 w-8 border bg-white text-center text-xs outline-none p-2">{{ $item->qty }}</span>
                                            <form id="submits2" action="/add-qty" method="GET" class="">
                                                @csrf
                                                <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                                                <button type="submit" class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-primary-1 hover:text-blue-50">+</button>
                                            </form>
                                            <!-- <a class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-primary-1 hover:text-blue-50" wire:click.prevent="increaseQuantity('{{ $item->rowId }}')">+</a> -->
                                        </div>
                                        <div class="flex items-center space-x-4">
                                            <p class="mt-2 text-sm font-bold">Rp. {{ $item->model->price }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        @endforeach
                        @endif
                    </div>
                </div>

                <!-- Sub total -->
                @if (Cart::count() > 0)
                <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                    <div class="mb-2 flex justify-between">
                        <p class="text-gray-700">Subtotal</p>
                        <p class="text-gray-700">Rp. {{ Cart::subtotal() }}</p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-gray-700">Tax</p>
                        <p class="text-gray-700">Rp. {{ Cart::tax() }}</p>
                    </div>
                    <hr class="my-4" />
                    <div class="flex justify-between">
                        <p class="text-lg font-bold">Total</p>
                        <div class="">
                            <p class="mb-1 text-lg font-bold">Rp. {{ Cart::total() }}</p>
                            <p class="text-sm text-gray-700">Sudah Termasuk Pajak</p>
                        </div>
                    </div>

                    <form action="/checkout" method="POST">
                        @csrf

                        <input type="hidden" name="cart" value="{{ Cart::content() }}">
                        <input type="hidden" name="total_price" value="{{ Cart::total() }}">

                        <button type="submit" class="mt-6 w-full rounded-md bg-primary-1 py-1.5 font-medium text-white hover:bg-primary-2">Order</button>
                    </form>
                </div>
                @else
                <div class="mt-10 mb-10 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                    <div class="mb-2 text-center">
                        <p class="text-gray-700">Shopping Cart masih Kosong. <br>Yuk Belanja Dulu!</p>
                    </div>
                    <a href="{{ 'catalog' }}">
                        <button class="w-full rounded-md bg-primary-1 py-1.5 font-medium text-white hover:bg-primary-2">Go
                            to Catalog</button>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </section>
    <script>
        function submitFunction1() {
            var form = document.getElementById("submits1");
            console.log(document.getElementsByName('id_per_product').value);

            var input = document.createElement("input");
            input.type = "hidden";
            input.name = "parameter";
            input.value = document.getElementsByName('id_per_product').value;

            form.appendChild(input);

            form.submit();
        }

        function submitFunction2() {
            var form = document.getElementById("submits2");
            console.log(document.getElementsByName('id_per_product').value);

            var input = document.createElement("input");
            input.type = "hidden";
            input.name = "parameter";
            input.value = document.getElementsByName('id_per_product').value;

            form.appendChild(input);

            form.submit();
        }
    </script>
    @livewireScripts
    @endsection

</div>