<!DOCTYPE html>
<html>

<head>
    @include('landing.head')
    <!-- <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head> -->
</head>

<body>
    <header>
        @include('landing.navbar')
    </header>
    <div>
        @include('landing.search')
    </div>
    <div class="lg:mt-4 2xl:mt-8">
        @yield('landing.content')
    </div>
    <div>
        @include('landing.footer')
    </div>
</body>

</html>