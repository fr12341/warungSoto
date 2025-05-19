<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/themes/main.css'])
    <title>Warung Soto</title>
</head>

<body>
    @include('themes.warungSoto.shared.header')
    {{-- @yield('content') --}}
    <main>
        @yield('content')
    </main>

    @include('themes.warungSoto.shared.footer')
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>
