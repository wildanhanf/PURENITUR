@section('title')
    Customization
@endsection
<div>
    @livewireStyles
    @extends('landing.base')
    @section('content')
        @include('landing.search')
        <section class="xl:mx-64 lg:mx-40 md:mx-48 sm:mx-24 mb-5 mx-5">
            <div class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center pt-12 pl-5 space-x-1 md:space-x-3">
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
                            <a href="#" class="ml-1 text-sm font-normal text-gray-700 md:ml-2">Customization</a>
                        </div>
                    </li>
                </ol>
            </div>
        </section>
        <div class="border border-slate-600 block xl:hidden rounded-md mx-8 p-5 mb-4">
            <h1 class="justify-center font-semibold">Fitur ini hanya tersedia pada tampilan dekstop</h1>
        </div>
        <section class="xl:mx-64 lg:mx-40 md:mx-48 sm:mx-24 mb-5 mx-5 hidden xl:block">
            <div class="mb-3">
                <h1 class="text-xl font-semibold">Customization</h1>
            </div>
            <div class="flex w-full">
                <div class="flex w-1/3 border border-gray-500 rounded-md mr-2 bg-slate-500 h-[493px] overflow-auto">
                    <div class="grid grid-cols-1 p-5 justify-center w-full">
                            <!-- Product -->
                            @foreach ($data_catalog as $catalog)
                            <form id="submits" action="/product-detail/{{$catalog->name_product}}" method="POST" class="">
                                @csrf
                                <div class="bg-white shadow-lg rounded-lg">
                                    <button type="submit" style="text-align: left;" class="w-full">
                                    <!-- kalo bisa pake anchor lebih bagus -->
                                        <div class="flex justify-center p-3">
                                            <img src="{{ $catalog->image }}" alt="" class="h-12">
                                        </div>
                                        <div class="px-4 pb-5 grid justify-items-center">
                                            <input type="hidden" name="id_per_product" value="{{ $catalog->id }}">
                                            <h3 class="text-gray-900 font-semibold text-sm tracking-tigh mb-1">{{ $catalog->name_product }}</h3>
                                            <p class="text-sm mb-1">{{ $catalog->category }}</p>
                                            <p class="text-sm font-bold text-gray-900 mb-1">Rp {{ $catalog->price }}</p>
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 text-yellow" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                </svg>
                                                <p class="text-sm ml-2">{{ $catalog->rating }} | Terjual {{ $catalog->sold }}</p>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </form>
                            @endforeach
                    </div>
                </div>
                <div class="flex w-2/3 flex-col border border-gray-500 rounded-md h-[493px] items-end">
                    <div class="h-5/6"></div>
                    <div class="h-1/6 p-3 flex">
                        <p class="text-lg font-bold text-gray-900 mr-4">Rp XXX.XXX</p>
                        <button type="button" class="text-white bg-primary-1 font-medium rounded-lg text-sm px-5 py-2 focus:outline-none">Checkout</button>
                    </div>
                </div>
            </div>
        </section>
    @endsection
    @livewireScripts
</div>
