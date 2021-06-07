@extends('layouts.app')

@section('title')
    Kabasto.com - Compara y compra en los diferentes abastos de tu ciudad
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
