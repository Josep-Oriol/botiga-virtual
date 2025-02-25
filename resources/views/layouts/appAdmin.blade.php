<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('logos/favicon.ico') }}" type="image/x-icon">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script type="module" src="{{asset('js/admin/panelAdmin.js')}}"></script>
    <meta name="asset-url" content="{{ asset('') }}">
</head>
<body class="bg-custom-dark1 text-white overflow-hidden">

    <div class="flex h-screen">
        @include('admin.utils.barraNavegacion') 

        <main class="flex-1 min-h-screen p-6 overflow-y-auto">
            @yield('content')
        </main>
    </div>

</body>
</html>