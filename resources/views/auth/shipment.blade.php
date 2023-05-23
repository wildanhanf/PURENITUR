@extends('landing.base')
@section('content')
<section id="shipment" class="lg:mx-64 md:mx-48 sm:mx-24 mx-12 mb-3">
    <div class="mb-3">
        <h1 class="text-xl font-semibold">Shipment</h1>
    </div>
    <div class="w-full xl:w-1/2 h-28 border-2 border-slate-800 rounded-md mb-2">
        <div class="m-2 text-sm font-medium lg:text-base">
            Ship-1234567890 (Pengiriman Selesai)
        </div>
        <p class="m-2 text-xs">
            Barangmu sedang diantarkan oleh kurir PURENITUR
        </p>
        <a href="" class="m-2 text-xs underline decoration-1 text-blue-500">
            Detail Barang
        </a>
    </div>
    <div class="w-full xl:w-1/2 h-28 border-2 border-slate-800 rounded-md mb-2">
        <div class="m-2 text-sm font-medium lg:text-base">
            Ship-1234567891
        </div>
        <p class="m-2 text-xs">
            Barangmu sedang diantarkan oleh kurir PURENITUR
        </p>
        <a href="" class="m-2 text-xs underline decoration-1 text-blue-500">
            Detail Barang
        </a>
    </div>
</section>
<section id="catalog" class="">
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
@endsection