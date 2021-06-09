@extends('layouts.app')

    @section('title')
        {{ $tienda->brand }} - Kabasto
    @endsection

    @section('header')
        {{-- precargar imagenes --}}
        <link rel="preload" href="/storage/{{ $tienda->profile_photo_path_brand }}" as="image">

        <!-- Primary Meta Tags -->
        <meta name="title" content="Todos los productos de {{ $tienda->brand }} - Kabasto.com">
        <meta name="description" content="Haz tus compras en {{ $tienda->brand }} y recomiendalo a tu familia y amigos - Kabasto.com">
        <meta name="keywords" content="precio de productos de {{ $tienda->brand }} en venezuela">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://kabasto.com/supermercado/{{ $tienda->slug }}">
        <meta property="og:title" content="Todos los productos de {{ $tienda->brand }} - Kabasto.com">
        <meta property="og:description" content="Haz tus compras en {{ $tienda->brand }} y recomiendalo a tu familia y amigos - Kabasto.com">
        <meta property="og:image" content="/storage/{{ $tienda->profile_photo_path_brand }}">

        {{-- url canonical --}}
        <link rel="canonical" href="https://kabasto.com/supermercado/{{ $tienda->slug }}" />
    @endsection

@section('content')

    @include('tienda.card_tienda')

    @include('tienda.carousel_banners_tienda')

    @include('tienda.carousel_cards_deliveries')



    @if ( count($items) > 0 )

        <div class="flex justify-center mt-3">
            <div class="max-w-7xl w-full">
                <h4 class="font-bold text-xl text-gray-900 px-2 md:px-0">
                    ({{count($items)}}) Productos Disponibles
                </h4>
            </div>
        </div>

        <div class="flex justify-center mt-3">
            <div class="max-w-7xl w-full px-2">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3">
                    @foreach ($items as $item)

                        @include('tienda.card_item_seller_product_detail')

                    @endforeach
                </div>
                <div class="flex justify-center my-4" id="pagination_nav">
                    {!! $items->links() !!}
                </div>
            </div>
        </div>
    @endif

@endsection
