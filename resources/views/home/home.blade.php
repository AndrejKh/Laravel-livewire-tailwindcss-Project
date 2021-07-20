@extends('layouts.app')
@section('html')itemscope itemtype="http://schema.org/WebPage"@endsection

@section('title')
    Compara y compra en los diferentes abastos de tu ciudad - Kabasto.com
@endsection

@section('header')
    {{-- precargar imagenes --}}
    <link rel="preload" href="{{ asset( 'home.webp' ) }}" as="image">
    {{-- url canonical --}}
    <link rel="canonical" href="https://kabasto.com/" />
    <meta name="robots" content="index,follow"/>

    <!-- Primary Meta Tags -->
    <meta name="title" content="Compara y compra en los diferentes abastos de tu ciudad - Kabasto.com">
    <meta name="description" content="Selecciona todos los productos de tu mercado, comprara en los diferentes abastos y supermercados de tu ciudad, y compra! - Kabasto.com">
    <meta name="keywords" content="abastos y supermercados en venezuela">

    <!-- MAacado Schema.org para Google+ -->
    <meta itemprop="name" content="Compara y compra en los diferentes abastos de tu ciudad - Kabasto.com">
    <meta itemprop="description" content="Selecciona el abasto o supermercado donde deseas comprar en tu ciudad. Elige la opción de tu preferencia - Kabasto.com">
    <meta itemprop="image" content="{{ asset( 'home.png' ) }}">

    <!-- Open Graph para Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Compara y compra en los diferentes abastos de tu ciudad - Kabasto.com" />
    <meta property="og:url" content="https://kabasto.com" />
    <meta property="og:image" content="{{ asset( 'home.png' ) }}" />
    <meta property="og:description" content="Selecciona el abasto o supermercado donde deseas comprar en tu ciudad. Elige la opción de tu preferencia - Kabasto.com" />
    <meta property="og:site_name" content="Kabasto" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@kabasto_ve">
    <meta name="twitter:title" content="Compara y compra en los diferentes abastos de tu ciudad - Kabasto.com">
    <meta name="twitter:description" content="Selecciona el abasto o supermercado donde deseas comprar en tu ciudad. Elige la opción de tu preferencia - Kabasto.com">
    <meta name="twitter:image:src" content="{{ asset( 'home.png' ) }}">
    <meta name="twitter:creator" content="@kabasto_ve">


    <!-- Styles Carousel Lybrary -->
    <script src="{{ asset('vendor/carouseljs/owl.carousel.min.js') }}"></script>
@endsection

@section('content')

    {{-- Carousel principal --}}
    @include('home.sections.banners_home')

    {{-- Banners promocionales --}}
    @include('home.sections.banners_promotionals')

    {{-- Call To Action a registrarse --}}
    @include('home.sections.cta_login')

    {{-- Carousel productos 'mas comprados' --}}
    @include('home.sections.products_carousel')

    {{-- Categorias cards sencillas --}}
    @include('components.carousel_categories_banners')

    {{-- Carousel de productos de las categorias --}}
    @include('home.sections.carousel_products')

    {{-- Categorias cads con detalle --}}
    @include('home.sections.carousel_categories_card_details')

@endsection
