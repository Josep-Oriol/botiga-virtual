<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('logos/favicon.ico') }}" type="image/x-icon">
    <meta name="asset-url" content="{{ asset('') }}">
    <meta name="base-url" content="{{ url('/') }}">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-custom-dark1 text-white">

    @include('utils.header')

    <main class="min-h-screen">
        @yield('content')
    </main>

    @include('utils.footer')

    <script>
        window.user = {!! Auth::check() ? Auth::user()->toJson() : 'null' !!};
    </script>


</body>
</html>