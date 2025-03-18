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

    <script type="module" src="{{ asset('js/client/chatbot/chatbot.js') }}"></script>

    <!--Start of Tawk.to Script-->
    <!--<script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/67d9645293f31d190d5eb927/1imkivp7b';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>-->
    <!--End of Tawk.to Script-->

</body>
</html>