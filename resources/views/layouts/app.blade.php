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

            {{-- Verifico si estoy en el administrador, no deberia verse el carrito aqui --}}
            @php
                $ruta = Route::currentRouteName();
                $rutaArray = explode(".", $ruta);
            @endphp
            @if ( !in_array('profile', $rutaArray) && !in_array('comparar', $rutaArray) )

                {{-- Boton flotante de carrito de compras --}}
                @include('common.buttom_float_shopping_car')

            @endif

        </div>



        @stack('modals')

        @livewireScripts
        @include('common.footer')
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/60d125fb65b7290ac6372ab7/1f8ofonpi';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
    </body>
</html>
