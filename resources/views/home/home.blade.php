@extends('layouts.app')

@section('title')
    Kabasto.com - Compara y compra en los diferentes abastos de tu ciudad
@endsection

@section('header')
	{{-- precargar imagenes --}}
	<link rel="preload" href="{{ asset( 'home.png' ) }}" as="image">

	<!-- Primary Meta Tags -->
	<meta name="title" content="Compara y compra en los diferentes abastos de tu ciudad - Kabasto.com">
	<meta name="description" content="Selecciona todos los productos de tu mercado, comprara en los diferentes abastos y supermercados de tu ciudad, y compra! - Kabasto.com">

	<!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://kabasto.com/">
	<meta property="og:title" content="Compara precios y compra todos los productos de tu mercado - Kabasto">
	<meta property="og:description" content="Selecciona todos los productos de tu mercado, comprara en los diferentes abastos y supermercados de tu ciudad, y compra! - Kabasto.com">
	<meta property="og:image" content="{{ asset( 'home.png' ) }}">

	{{-- url canonical --}}
	<link rel="canonical" href="https://kabasto.com/" />
@endsection

@section('content')

    {{-- Carousel principal --}}
    @include('home.sections.carousel_banners')

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
