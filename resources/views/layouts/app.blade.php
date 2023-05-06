<!DOCTYPE html>
<html>

<head>
    @include('landing.head')
</head>

<body>
    <div>
        @include('landing.navbar')
    </div>
    <!-- <div>
        @include('landing.search')
    </div> -->
    <div class="lg:mt-4 2xl:mt-8">
        @yield('content')
    </div>
    <div>
        @include('landing.footer')
    </div>
</body>

</html>