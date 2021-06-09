@extends('layouts.app')

    @section('title')
       Abastos y supermercados - Kabasto
    @endsection

    @section('header')
        {{-- precargar imagenes --}}
        <link rel="preload" href="{{ asset( 'home.svg' ) }}" as="image">

        <!-- Primary Meta Tags -->
        <meta name="title" content="Kabasto.com -  Compara y compra en los diferentes abastos de tu ciudad">
        <meta name="description" content="Kabasto.com - Selecciona todos tus productos, compara en los abastos y supermercados de tu ciudad, y compra!">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://kabasto.com/">
        <meta property="og:title" content="Kabasto - Compara precios y compra todos los productos de tu mercado">
        <meta property="og:description" content="Kabasto - Compara precios y compra todos los productos de tu mercado">
        <meta property="og:image" content="{{ asset( 'home.svg' ) }}">

        {{-- url canonical --}}
        <link rel="canonical" href="https://kabasto.com/supermercados" />
    @endsection


@section('content')

    @include('home.sections.carousel_banners')

    <div class="flex justify-center mt-3">
        <div class="max-w-7xl w-full">
            <h2 class="font-bold text-xl text-gray-900 px-2 md:px-0">
                <span class="hidden md:inline">({{ $total_tiendas_search }})</span>
                Abastos y supermercados <span class="hidden md:inline">encontrados</span>
            </h2>
            <span class="inline md:hidden text-gray-500 text-base px-2">({{ $total_tiendas_search }}) Resultados</span>
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
