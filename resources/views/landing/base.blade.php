<!DOCTYPE html>
<html>

<head>
    @include('landing.head')
</head>

<body>
    <header class="sticky top-0 z-50">
        @include('landing.navbar')
    </header>
    <div>
        @yield('landing.content')
    </div>
    <div>
        @include('landing.footer')
    </div>
</body>
</html>