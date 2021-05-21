<x-app-layout>

    {{-- @include('components.categories_menu') --}}

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

</x-app-layout>
