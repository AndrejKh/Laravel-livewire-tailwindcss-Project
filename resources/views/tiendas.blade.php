<x-app-layout>

    @include('components.categories_menu')

    @include('home.carousel_banners')

    <div class="flex justify-center mt-3">
        <div class="max-w-7xl w-full">
            <h2 class="font-bold text-xl text-gray-900 px-2 md:px-0"> <span class="hidden md:inline">({{ $total_tiendas_search }})</span> Supermercados y Tiendas <span class="hidden md:inline">encontrados</span></h2>
            <span class="inline md:hidden text-gray-500 text-base px-2">({{ $total_tiendas_search }}) Resultados</span>
        </div>
    </div>
    <div class="flex justify-center mt-3">
        <div class="max-w-7xl w-full px-2">
                @foreach ($tiendas as $tienda)
                    @include('components.card_tienda')
                @endforeach
            <div class="flex justify-center mt-4" id="pagination_nav">
                {!! $tiendas->links() !!}
            </div>
        </div>
    </div>

    @include('home.carousel_categories_card_details')


</x-app-layout>
