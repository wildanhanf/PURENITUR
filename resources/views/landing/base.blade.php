<!DOCTYPE html>
<html>

<head>
    @include('landing.head')
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