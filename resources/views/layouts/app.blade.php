<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Kabasto') }}</title>
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icons/favicon.png') }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Styles Carousel Lybrary -->
        <link rel="stylesheet" href="{{ asset('vendor/carouseljs/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/carouseljs/owl.theme.default.min.css') }}">

        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/carouseljs/owl.carousel.min.js') }}"></script>

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-gray-100 overflow-y-auto">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100 relative">
            @livewire('navigation-menu')
            {{-- Modal de carrito de compras --}}
            @include('common.shopping_modal_car')
            {{-- @livewire('shopping-car-component') --}}

            <!-- Page Content -->
            <main class="">
                {{ $slot }}
            </main>

            {{-- Verifico si estoy en el administrador, no deberia verse el carrito aqui --}}
            @php
                $ruta = Route::currentRouteName();
                $rutaArray = explode(".", $ruta);
            @endphp
            @if ( !in_array('profile', $rutaArray) && !in_array('cms', $rutaArray) && !in_array('dashboard', $rutaArray) && !in_array('comparar', $rutaArray) )
                {{-- Boton flotante de carrito de compras --}}
                @include('common.buttom_float_shopping_car')
            @endif
        </div>

        @stack('modals')

        @livewireScripts
        @include('common.footer')
    </body>
</html>
