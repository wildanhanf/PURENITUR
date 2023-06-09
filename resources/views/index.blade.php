@section('title')
Home
@endsection

@extends('landing.base')
@section('content')
@include('landing.search')
<section id="welcome" class="lg:mx-64 md:mx-48 sm:mx-24 mx-12">
    <div class="container flex flex-wrap">
        <div class="md:w-1/2 py-8 md:py-10 2xl:py-16 px-4">
            <div class="max-w-xl mx-auto text-center">
                <img src="{{ asset('img/Welcome.png') }}" alt="">
            </div>
        </div>
        <div class="md:w-1/2 py-8 md:py-10 2xl:py-16 px-4">
            <div class="max-w-xl mx-auto text-center 2xl:pt-24">
                <h2 class="font-bold text-dark text-xl mb-4 lg:text-2xl md:text-xl">Bangun Rumah Impianmu<br>Bersama Kami
                </h2>
                <p class="text-md md:text-lg">Kami menyediakan furnitur lokal dengan kualitas terbaik untuk membuat
                    hunian impian anda</p>
            </div>
        </div>
    </div>
</section>
<section id="category" class="bg-primary-one p-6">
    <div class="lg:mx-64 md:mx-48 sm:mx-24 mx-12">
        <div class="container flex flex-wrap mx-auto">
            <div class="grid grid-cols-2 2xl:grid-cols-3 gap-4 mx-auto">
                <div class="relative">
                    <form id="submits" action="/catalog/kursi" method="POST" class="">
                        @csrf
                        <input type="hidden" name="category" id="category" value="Kursi">
                        <button type="submit" class="">
                            <img src="{{ asset('img/kursi.png') }}" alt="" class="hover:blur-sm" style="border-radius: 10px; height:225px; width:400px">
                            <h3 class="absolute text-2xl text-slate-100 font-bold top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" style="color:#ffffff">
                                Kursi</h3>
                        </button>
                    </form>
                </div>
                <div class="relative">
                    <form id="submits" action="/catalog/meja" method="POST" class="">
                        @csrf
                        <input type="hidden" name="category" id="category" value="Meja">
                        <button type="submit" class="">
                            <img src="{{ asset('img/meja.png') }}" alt="" class="hover:blur-sm" style="border-radius: 10px; height:225px; width:400px">
                            <h3 class="absolute text-2xl text-slate-100 font-bold top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" style="color:#ffffff">
                                Meja</h3>
                        </button>
                    </form>
                </div>
                <div class="relative">
                    <form id="submits" action="/catalog/lampu" method="POST" class="">
                        @csrf
                        <input type="hidden" name="category" id="category" value="Lampu">
                        <button type="submit" class="">
                            <img src="{{ asset('img/lampu.jpg') }}" alt="" class="hover:blur-sm" style="border-radius: 10px; height:225px; width:400px">
                            <h3 class="absolute text-2xl text-slate-100 font-bold top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" style="color:#ffffff">
                                Lampu</h3>
                        </button>
                    </form>
                </div>
                <div class="relative">
                    <form id="submits" action="/catalog/tanaman" method="POST" class="">
                        @csrf
                        <input type="hidden" name="category" id="category" value="Tanaman">
                        <button type="submit" class="">
                            <img src="{{ asset('img/tanaman.jfif') }}" alt="" class="hover:blur-sm" style="border-radius: 10px; height:225px; width:400px">
                            <h3 class="absolute text-2xl text-slate-100 font-bold top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" style="color:#ffffff">
                                Tanaman</h3>
                        </button>
                    </form>
                </div>
                <div class="relative">
                    <form id="submits" action="/catalog/rak" method="POST" class="">
                        @csrf
                        <input type="hidden" name="category" id="category" value="Kompartemen">
                        <button type="submit" class="">
                            <img src="{{ asset('img/rak.png') }}" alt="" class="hover:blur-sm" style="border-radius: 10px; height:225px; width:400px">
                            <h3 class="absolute text-2xl text-slate-100 font-bold top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" style="color:#ffffff">
                                Rak</h3>
                        </button>
                    </form>
                </div>
                <div class="relative">
                    <a href="/catalog">
                        <img src="{{ asset('img/kasur.png') }}" alt="" class="hover:blur-sm" style="border-radius: 10px; height:225px; width:400px">
                        <h3 class="absolute text-2xl text-slate-100 font-bold top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" style="color:#ffffff">
                            Catalog</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="product" class="p-5">
    <div class="flex justify-center mb-8">
        <h1 class="font-semibold text-slate-900 text-md lg:text-xl md:text-lg">Hadir Untuk Hunian Anda</h1>
    </div>
    <div class="container product flex justify-center">
        <!-- Carousel wrapper -->
        <div class="columns-1 lg:columns-3 xl:columns-6">
            <!-- Product -->
            @foreach ($data as $catalog)
            <div class="mb-1.5">
                <form id="submits" action="/product-detail/{{$catalog->name_product}}" method="POST" class="">
                    @csrf
                    <div class="bg-white shadow-lg rounded-lg w-56 mx-auto">
                        <button type="submit" style="text-align: left;" class="">
                            <a class="flex justify-center p-3">
                                <img src="{{ $catalog->image }}" alt="" class="w-[207px] h-[222px]">
                            </a>
                            <div class="px-4 pb-5">
                                <h3 class="text-gray-900 font-semibold text-lg tracking-tigh mb-2">
                                    {{ $catalog->name_product }}
                                </h3>
                                <p class="text-md mb-2">{{ $catalog->category }}</p>
                                <p class="text-base font-bold text-gray-900 mb-2">Rp {{ $catalog->price }}</p>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-yellow" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <span class="ml-2">{{ $catalog->rating }} | Terjual {{ $catalog->sold }}</span>
                                </div>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section id="customization" class="bg-secondary-3 p-6">
    <div class="flex justify-center mb-9">
        <h1 class="font-semibold text-white text-md lg:text-xl md:text-lg text-center">Rancang Sendiri Furnitur Untuk
            Hunian Anda</h1>
    </div>
    <div class="flex justify-center mb-9">
        <img src="{{ asset('img/custom.png') }}" alt="">
    </div>
    <div class="flex justify-center mb-9">
        <a href="/customization" class="bg-card-element-1 hover:bg-card-element-2 text-white font-semibold py-2 px-12 rounded-full">
            Lihat Halaman
        </a>
    </div>
</section>
@endsection