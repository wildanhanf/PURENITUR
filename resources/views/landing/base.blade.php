<!DOCTYPE html>
<html>

<head>
    @include('landing.head')
    <!-- <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head> -->
    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body class="font-montserrat">
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
