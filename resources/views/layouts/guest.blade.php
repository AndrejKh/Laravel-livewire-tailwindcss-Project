<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Facebook --}}
        <meta name="facebook-domain-verification" content="g2sprhx1aauu2l7e2kdeipenk0bze7" />

        <!-- Google Tag Manager -->
        {{-- <script>
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-WQG59HF');
        </script> --}}
        <!-- End Google Tag Manager -->

        <title>@yield('title')</title>

        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.png') }}">

        @yield('header')

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="bg-gray-100">
        <!-- Google Tag Manager (noscript) -->
        {{-- <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WQG59HF" height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript> --}}
        <!-- End Google Tag Manager (noscript) -->

        <div class="flex bg-gray-100 ml-5 mt-5">
            <a class="text-gray-900 hover:text-blue-700 font-semibold" href="{{ route('home') }}">
                <svg class="inline fill-current" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><path d="M9.7,18.3L9.7,18.3c0.39-0.39,0.39-1.02,0-1.41L5.83,13H21c0.55,0,1-0.45,1-1v0c0-0.55-0.45-1-1-1H5.83l3.88-3.88 c0.39-0.39,0.39-1.02,0-1.41l0,0c-0.39-0.39-1.02-0.39-1.41,0L2.7,11.3c-0.39,0.39-0.39,1.02,0,1.41l5.59,5.59 C8.68,18.68,9.32,18.68,9.7,18.3z"/></svg>
                Volver al inicio
            </a>
        </div>
        <div class="font-sans text-gray-900 antialiased">
            {{-- {{ $slot }} --}}
            @yield('content')
        </div>
    </body>
</html>
