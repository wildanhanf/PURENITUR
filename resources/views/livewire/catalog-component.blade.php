@section('title')
Catalog
@endsection
<div>
    @livewireStyles
    @extends('landing.base')
    @section('content')
    @include('landing.search')
    <section id="product" class="mx-auto">
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
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="m7 21l7.9-18H17L9.1 21H7Z" />
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Store</span>
                    </div>
                </li>
            </ol>
        </div>
        <div class="container product mx-auto">
            <!-- Carousel wrapper -->
            <div class="grid grid-flow-row auto-rows-max justify-center">
                <div class="grid grid-cols-2 xl:grid-cols-6 auto-cols-auto p-5 gap-4">
                    <!-- Product -->
                    @foreach ($data as $catalog)
                    <form id="submits" action="/product-detail" method="GET" class="">
                        @csrf
                        <div class="bg-white shadow-lg rounded-lg w-44 h-50 lg:w-56 lg:h-100">
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