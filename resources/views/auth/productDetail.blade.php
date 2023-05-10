@extends('landing.base')
@section('landing.content')

<section id="productDetail" class="xl:mx-64 lg:mx-40 md:mx-48 sm:mx-24">
    @foreach($data_selected_product as $data_product)
    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4 mx-4 md:mx-8 mb-5">
        <div class="relative">
            <div class="relative">
                <img src="{{ $data_product->image }}" alt="" class="mx-auto mb-3 md:mb-4 h-[360px]">
            </div>
            <div class="relative">
                <button class="w-full bg-primary-one rounded-lg p-3 text-white">Discount Details</button>
            </div>
        </div>
        <div class="relative">
            <div class="flex flex-wrap">
                <div class="w-full flex flex-wrap md:block md:w-1/3 md:h-[360px]">
                    <img src="{{ $data_product->image }}" alt="" class="mx-auto mb-3 md:mb-4 w-20 h-20">
                    <img src="{{ $data_product->image }}" alt="" class="mx-auto mb-3 md:mb-4 w-20 h-20">
                    <img src="{{ $data_product->image }}" alt="" class="mx-auto mb-3 md:mb-4 w-20 h-20">
                    <img src="{{ $data_product->image }}" alt="" class="mx-auto md:mb-4 w-20 h-20">
                </div>
                <div class="w-full md:w-2/3 md:h-[360px] mb-4">
                    <div class="font-bold text-2xl mb-3">Detail Barang {{ $data_product->name_product }}</div>
                    <div class="text-xs mb-3">{{ $data_product->description }}</div>
                    <div class="font-bold text-xl mb-1">Harga</div>
                    <div class="font-semibold text-xl mb-3">Rp {{ $data_product->price }}</div>
                    <!-- <div class="w-full flex flex-wrap justify-between mb-3">
                        <div class="font-bold text-base">Jumlah Barang</div>
                        <div class="flex flex-wrap">
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor" d="M128 24a104 104 0 1 0 104 104A104.11 104.11 0 0 0 128 24Zm0 192a88 88 0 1 1 88-88a88.1 88.1 0 0 1-88 88Zm48-88a8 8 0 0 1-8 8h-32v32a8 8 0 0 1-16 0v-32H88a8 8 0 0 1 0-16h32V88a8 8 0 0 1 16 0v32h32a8 8 0 0 1 8 8Z" />
                                </svg>
                            </a>
                            <span class="mx-1 border rounded-md px-3 h-5"></span>
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 20c-4.41 0-8-3.59-8-8s3.59-8 8-8s8 3.59 8 8s-3.59 8-8 8m0-18A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2M7 13h10v-2H7" />
                                </svg>
                            </a>
                        </div>
                    </div> -->
                    <!-- <div class="font-semibold text-lg mb-1">Warna</div>
                    <div class="flex flex-wrap mb-3">
                        <button class="w-7 h-7 rounded-full bg-primary-one text-white shadow-md border border-white mx-1"></button>
                        <button class="w-7 h-7 rounded-full bg-primary-2 text-white shadow-md border border-white mx-1"></button>
                        <button class="w-7 h-7 rounded-full bg-primary-3 text-white shadow-md border border-white mx-1"></button>
                        <button class="w-7 h-7 rounded-full bg-primary-4 text-white shadow-md border border-white mx-1"></button>
                    </div> -->
                    <div class="font-semibold text-lg mb-1">Nomor SKU</div>
                    <div class="font-regular text-base mb-3">{{ $data_product->sku }}</div>
                </div>
                <div class="w-full flex items-stretch">
                    <div class="">
                        <button class="w-44 md:w-[200px] bg-white rounded-lg p-3 text-primary-one font-semibold border-2 border-primary-one mr-1">Add To Chart</button>
                    </div>
                    <div class="">
                        <button class="w-44 md:w-[200px] bg-primary-one rounded-lg p-3 text-white font-semibold">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative">
            <div class="relative">
                <img src="{{asset('img/custom.png')}}" alt="" class="mx-auto mb-3 md:mb-4 h-[360px]">
            </div>
            <div class="relative">
                <button class="w-full bg-card-element-1 hover:bg-card-element-2 text-white font-semibold p-3 rounded-lg">Discount Details</button>
            </div>
        </div>

    </div>
    <div class="w-full sm:w-2/3 p-3 md:mx-4">
        <span><b>Product Name:</b> {{ $data_product->name_product }}</span><br>
        <p><b>Description:</b> {{ $data_product->description }}</p>
        <div class="font-semibold text-lg mb-1">Price: {{ $data_product->price }}</div>
        <div class="font-semibold text-lg mb-1">Features:</div>
        <ul>
            <li>Made from high-quality wood</li>
            <li>Unique interlocking design</li>
            <li>Easy to mount on your wall</li>
            <li>Perfect for displaying decorative items, books, and other small items</li>
            <li>Available in multiple colors to match your home decor</li>
        </ul>

    </div>
    @endforeach
</section>

<section id="catalog" class="lg:mx-64 md:mx-48 sm:mx-24">

</section>

@endsection