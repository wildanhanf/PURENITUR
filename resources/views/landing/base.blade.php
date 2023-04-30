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
        @yield('landing.content')
    </div>
    <div>
        @include('landing.footer')
    </div>
</body>
</html>