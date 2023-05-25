@section('title')
Shipment
@endsection

@extends('landing.base')
@section('content')
<section class="xl:mx-64 lg:mx-40 md:mx-48 sm:mx-24 mx-5">
    <div class="flex mb-5" aria-label="Breadcrumb">
        <ol class="inline-flex items-center pt-12 space-x-1 md:space-x-3">
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
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Shipment</span>
                </div>
            </li>
        </ol>
    </div>
</section>
<section id="shipment" class="lg:mx-64 md:mx-48 sm:mx-24 mx-5 mb-3">
    <h1 class="mb-3 text-2xl font-bold">Payment</h1>
    @if ($shipment->count() > 0)
    @foreach($shipment as $data_shipment)
    <div class="w-full h-full xl:w-1/2 border-2 border-slate-800 rounded-md mb-3 p-5">
        <div class="m-2 text-sm font-medium lg:text-base">
            Order ID : {{ $data_shipment->id }}
        </div>
        <p class="m-2 text-md">
            Transaction ID : {{ $data_shipment->transaction_id }}<br>
            Status Payment : {{ $data_shipment->status_payment }}
        </p>
        <form id="submits1" action="/order-detail" method="GET" class="">
            @csrf
            <input type="hidden" name="id" id="id" value="{{ $data_shipment->id }}">
            <input type="hidden" name="user_id" id="user_id" value="{{ $data_shipment->user_id }}">
            <button type="submit" class="cursor-pointer bg-gray-100 py-1 px-3.5 duration-100 hover:bg-primary-1 hover:text-blue-50 rounded-md">Detail Order</button>
        </form>
    </div>
    @endforeach
    @else
    <div class="mt-10 mb-10 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
        <div class="mb-2 text-center">
            <p class="text-gray-700">Shipment masih Kosong. <br>Yuk Belanja Dulu!</p>
        </div>
        <a href="{{ 'catalog' }}">
            <button class="w-full rounded-md bg-primary-1 py-1.5 font-medium text-white hover:bg-primary-2">Go to Catalog</button>
        </a>
    </div>
    @endif
</section>
<section id="catalog" class="mt-5">
    <div class="flex justify-center mb-8">
        <h1 class="font-semibold text-slate-900 text-md lg:text-xl md:text-lg">Rekomendasi Untukmu</h1>
    </div>
    <div class="bg-primary-one">
        <div class="lg:mx-64 md:mx-48 sm:mx-24">
            <div class="container product flex justify-center  p-3">
                <!-- Carousel wrapper -->
                <div class="columns-1 lg:columns-3 xl:columns-5">
                    <!-- Product -->
                    @foreach ($data as $catalog)
                    <form id="submits" action="/productDetail" method="GET" class="">
                        @csrf
                        <div class="bg-white shadow-lg rounded-lg w-44 h-50 lg:w-56 lg:h-100 mb-2">
                            <!-- kalo bisa pake anchor lebih bagus -->
                            <button type="submit" style="text-align: left;" class="">
                                <div class="flex justify-center p-3">
                                    <img src="{{ $catalog->image }}" alt="" class="w-[100px] h-[130px] md:w-[207px] md:h-[222px]">
                                </div>
                                <div class="px-4 pb-5">
                                    <input type="hidden" name="id_per_product" value="{{ $catalog->id }}">
                                    <h3 class="text-gray-900 font-semibold text-sm md:text-lg tracking-tigh md:mb-2">
                                        {{ $catalog->name_product }}
                                    </h3>
                                    <p class="text-sm md:text-md md:mb-2">{{ $catalog->category }}</p>
                                    <p class="text-sm md:text-base font-bold text-gray-900 md:mb-2">Rp
                                        {{ $catalog->price }}
                                    </p>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-yellow" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <p class="text-sm md:text-base ml-2">4.7 | Terjual 500</p>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
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
</script>
@endsection