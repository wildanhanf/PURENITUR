@section('title')
Catalog
@endsection
<div>
    @livewireStyles
    @extends('landing.base')
    @section('landing.content')
    <section id="product" class="p-5">
        <div class="container product">
            <!-- Carousel wrapper -->
            <div class="grid grid-flow-row auto-rows-max">
                <div class="grid grid-cols-5 auto-cols-auto">
                    <!-- Product -->
                    @foreach ($data as $catalog)
                    <form id="submits" action="/productDetail" method="GET">
                        @csrf
                        <div class="bg-white shadow-lg rounded-lg w-56 h-100 mx-10 my-4">
                            <!-- kalo bisa pake anchor lebih bagus -->
                            <button type="submit" style="text-align: left;">
                                <div class="flex justify-center p-3">
                                    <img src="{{ $catalog->image }}" alt="" class="w-[207px] h-[222px]">
                                </div>
                                <div class="px-4 pb-5">
                                    <input type="hidden" name="id_per_product" value="{{ $catalog->id }}">
                                    <h3 class="text-gray-900 font-semibold text-lg tracking-tigh mb-2">{{ $catalog->name_product }}</h3>
                                    <p class="text-md mb-2">{{ $catalog->category }}</p>
                                    <p class="text-base font-bold text-gray-900 mb-2">Rp {{ $catalog->price }}</p>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-yellow" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <p class="ml-2">4.7 | Terjual 500</p>
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