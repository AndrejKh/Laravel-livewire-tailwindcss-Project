@extends('layouts.app')

    @section('title')
       Abastos y supermercados - Kabasto
    @endsection

    @section('header')
        {{-- precargar imagenes --}}
        <link rel="preload" href="{{ asset( 'home.png' ) }}" as="image">

        <meta name="robots" content="index,follow"/>

        <!-- Primary Meta Tags -->
        <meta name="title" content="Eligue el abasto de tu preferencia en nuestra red - Kabasto.com">
        <meta name="description" content="Selecciona el abasto o supermercado donde deseas comprar en tu ciudad. Elige la opción de tu preferencia - Kabasto.com">
        <meta name="keywords" content="precio de abastos y supermercados en venezuela">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://kabasto.com/supermercados">
        <meta property="og:title" content="Eligue el abasto de tu preferencia en nuestra red - Kabasto.com">
        <meta property="og:description" content="Selecciona el abasto o supermercado donde deseas comprar en tu ciudad. Elige la opción de tu preferencia - Kabasto.com">
        <meta property="og:image" content="{{ asset( 'home.webp' ) }}">

        {{-- url canonical --}}
        <link rel="canonical" href="https://kabasto.com/supermercados" />

        <!-- Styles Carousel Lybrary -->
    <link rel="stylesheet" href="{{ asset('vendor/carouseljs/owl.carousel.min.css') }}">
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}" ></script>
    <script src="{{ asset('vendor/carouseljs/owl.carousel.min.js') }}" ></script>
    @endsection


@section('content')

    @include('home.sections.carousel_banners')

    <div class="flex justify-center mt-3">
        <div class="max-w-7xl w-full">
            <h1 class="font-bold text-xl text-gray-900 px-2 md:px-0">
                <span class="hidden md:inline">({{ $total_tiendas_search }})</span>
                Abastos y supermercados <span class="hidden md:inline">encontrados</span>
            </h1>
            <span class="inline md:hidden text-gray-500 text-base px-2">({{ $total_tiendas_search }}) Resultados</span>
            <h2 class="text-gray-500 hidden md:block">Compara en nuestra red de abastos disponibles. Compra en el que más se adapte a ti.</h2>
        </div>
    </div>
    <div class="flex justify-center mt-3">
        <div class="max-w-7xl w-full px-2">
                @foreach ($tiendas as $tienda)

                    @include('supermercados.card_tienda')

                @endforeach
            <div class="flex justify-center mt-4" id="pagination_nav">
                {!! $tiendas->links() !!}
            </div>
        </div>
    </div>

    @include('home.sections.carousel_categories_card_details')


@endsection
