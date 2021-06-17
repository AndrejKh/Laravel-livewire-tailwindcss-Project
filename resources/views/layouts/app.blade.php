<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Facebook --}}
        <meta name="facebook-domain-verification" content="g2sprhx1aauu2l7e2kdeipenk0bze7" />

        <!-- Google Tag Manager -->
        <script>
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-WQG59HF');
        </script>
        <!-- End Google Tag Manager -->

        <title>@yield('title')</title>

        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.png') }}">

        @yield('header')

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-gray-100 overflow-y-auto">
        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WQG59HF" height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!-- End Google Tag Manager (noscript) -->

        <x-jet-banner />

        <div class="min-h-screen bg-gray-100 relative">

            @livewire('navigation-menu')

            {{-- Modal de carrito de compras --}}
            @include('common.shopping_modal_car')

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>

            {{-- Boton flotante de carrito de compras --}}
            @include('common.buttom_float_shopping_car')
        </div>

        @stack('modals')

        @livewireScripts
        @include('common.footer')
    </body>
</html>
