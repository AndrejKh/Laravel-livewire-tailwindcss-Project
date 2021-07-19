<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @yield('html')>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- Facebook --}}
        <meta name="facebook-domain-verification" content="g2sprhx1aauu2l7e2kdeipenk0bze7" />
        <!-- Google Tag Manager -->
        {{-- <script defer>
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
        @livewireStyles
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-gray-100 overflow-y-auto">
        <!-- Google Tag Manager (noscript) -->
        {{-- <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WQG59HF" height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript> --}}
        <!-- End Google Tag Manager (noscript) -->

        <x-jet-banner />

        <div class="min-h-screen bg-gray-100 relative">

            @livewire('navigation-menu')
            <div class="block lg:hidden py-2 md:py-3 text-center fixed bottom-0 bg-gray-50 w-full z-20 border-t-2 border-gray-200 ubicationTag">
                <svg class="inline h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                <span class="font-medium leading-5 ubicationText">Ubicación</span>
            </div>

            <!-- Page Content -->
            <main>
                <span hidden id="siteUrl"> {{ env('APP_URL') }} </span>
                <span hidden id="csrf_token">{{ csrf_token() }}</span>
                @yield('content')
            </main>

            {{-- Verifico si estoy en el administrador, no deberia verse el carrito aqui --}}
            @php
                $ruta = Route::currentRouteName();
                $rutaArray = explode(".", $ruta);
            @endphp
            @if ( !in_array('profile', $rutaArray) && !in_array('comparar', $rutaArray) )

                {{-- Boton flotante de carrito de compras --}}
                @include('common.buttom_float_shopping_car')
                {{-- Modal de carrito de compras --}}
                @include('common.shopping_modal_car')

                @include('common.tawk_io')

            @endif

        </div>

        @stack('modals')

        @livewireScripts
        @include('common.footer')

        @include('common.modal_ubication')

    </body>
</html>
