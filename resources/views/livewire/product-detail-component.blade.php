<div>
    @extends('landing.base')
    @livewireStyles
    @section('content')
    <section id="productDetail" class="xl:mx-64 lg:mx-40 md:mx-48 sm:mx-24">
        @foreach ($data_selected_product as $data_product)
        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2  xl:grid-cols-2 2xl:grid-cols-3 gap-4 mx-4 md:mx-8 mb-5">
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
                    <!-- <div class="w-full flex flex-wrap md:block md:w-1/3 md:h-[360px]">
                    <img src="{{ $data_product->image }}" alt="" class="mx-auto mb-3 md:mb-4 w-20 h-20">
                    <img src="{{ $data_product->image }}" alt="" class="mx-auto mb-3 md:mb-4 w-20 h-20">
                    <img src="{{ $data_product->image }}" alt="" class="mx-auto mb-3 md:mb-4 w-20 h-20">
                    <img src="{{ $data_product->image }}" alt="" class="mx-auto md:mb-4 w-20 h-20">
                </div> -->
                    <div class="w-full md:w-2/3 md:h-[360px] mb-4">
                        <div class="font-bold text-2xl mb-3">Detail Barang {{ $data_product->name_product }}</div>
                        <div class="font-bold text-xl mb-1">Harga</div>
                        <div class="font-semibold text-xl mb-3">Rp. {{ $data_product->price }}</div>
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
                        <div class="font-semibold text-lg mb-1">Rating</div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-yellow" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                        </div>
                        <div class="font-regular text-base mb-3">{{ $data_product->rating }}</div>
                        <div class="font-semibold text-lg mb-1">Terjual</div>
                        <div class="font-regular text-base mb-3">{{ $data_product->sold }}</div>
                    </div>
                    <!-- <a class="" wire:click.prevent="store({{ $data_product->id}},'{{ $data_product->name_product }}', {{ $data_product->price }})" href="#">Add To Chart</a> -->
                    <form id="submits" action="/carts" method="GET" class="">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data_product->id }}">
                        <input type="hidden" name="name_product" value="{{ $data_product->name_product }}">
                        <input type="hidden" name="price" value="{{ $data_product->price }}">
                        <button type="submit">Add To Chart</button>
                    </form>
                    <!-- <div class="w-full flex items-stretch">
                        <div class="">
                            <button class="" wire:click.prevent="store({{ $data_product->id}},'{{ $data_product->name_product }}', {{ $data_product->price }})">Add To Chart</button>
                        </div>
                        <div class="">
                            <button class="w-44 md:w-[200px] bg-primary-one rounded-lg p-3 text-white font-semibold">Checkout</button>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="relative col-span-1 xl:col-span-2 2xl:col-span-1">
                <div class="relative">
                    <img src="{{ asset('img/custom.png') }}" alt="" class="mx-auto mb-3 md:mb-4 h-[360px]">
                </div>
                <div class="relative">
                    <button class="w-full bg-card-element-1 hover:bg-card-element-2 text-white font-semibold p-3 rounded-lg">Customization
                        Page</button>
                </div>
            </div>

        </div>
        <div class="w-full sm:w-2/3 p-3 md:mx-4">
            <span><b>Product Name:</b> {{ $data_product->name_product }}</span><br>
            <div class="font-semibold text-lg mb-1">Price: Rp. {{ $data_product->price }}</div>
            <div class="font-semibold text-lg mb-1">Features:</div>
            <ul>
                <li>
                    @if (empty($data_product->feature_1))
                    @else
                    - {{ $data_product->feature_1 }}
                    @endif
                </li>
                <li>
                    @if (empty($data_product->feature_2))
                    @else
                    - {{ $data_product->feature_2 }}
                    @endif
                </li>
                <li>
                    @if (empty($data_product->feature_3))
                    @else
                    - {{ $data_product->feature_3 }}
                    @endif
                </li>
                <li>
                    @if (empty($data_product->feature_4))
                    @else
                    - {{ $data_product->feature_4 }}
                    @endif
                </li>
            </ul>

        </div>
        @endforeach
    </section>

    <section id="catalog" class="lg:mx-64 md:mx-48 sm:mx-24">
        <div class="flex justify-center mb-8">
            <h1 class="font-semibold text-slate-900 text-md lg:text-xl md:text-lg">Hadir Untuk Hunian Anda</h1>
        </div>
        <div class="container product flex justify-center">
            <!-- Carousel wrapper -->
            <div class="columns-1 lg:columns-3 xl:columns-5">
                <!-- Product -->
                @foreach ($data_catalog as $catalog)
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
                                <h3 class="text-gray-900 font-semibold text-sm md:text-lg tracking-tigh md:mb-2">{{ $catalog->name_product }}</h3>
                                <p class="text-sm md:text-md md:mb-2">{{ $catalog->category }}</p>
                                <p class="text-sm md:text-base font-bold text-gray-900 md:mb-2">Rp {{ $catalog->price }}</p>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-yellow" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <p class="text-sm md:text-base ml-2">{{ $catalog->rating }} | Terjual {{ $catalog->sold }}</p>
                                </div>
                            </div>
                        </button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </section>
    <script>
        function submitFunction() {
            var form = document.getElementById("submits");
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
    @livewireScripts
</div>