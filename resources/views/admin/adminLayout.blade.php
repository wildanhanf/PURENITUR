<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('head')
    <link rel="shortcut icon" href="/img/fav-logo.png">
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <div class="container-fluid mt-5 mb-5">
        <h1 class="text-center">Admin Dashboard</h1>
        <h2 class="text-center">Hello, Cek Admin</h2>
        <h4 class="text-center mt-5">@yield('title')</h4>
        @yield('content')
    </div>
</body>

</html>