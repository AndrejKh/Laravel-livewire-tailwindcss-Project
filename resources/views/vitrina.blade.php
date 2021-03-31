<x-app-layout>
    @include('components.filtro_vitrina_menu')

    <div class="flex justify-center mt-3">
        <div class="max-w-7xl w-full">
            <h2 class="font-bold text-xl text-gray-900 px-2 md:px-0"> ({{ $total_products_search }}) Productos encontrados</h2>
        </div>
    </div>
    <div class="flex justify-center mt-3">
        <div class="max-w-7xl w-full px-2">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                @foreach ($products as $product)
                    @include('components.card_product')

                @endforeach
            </div>
            <div class="flex justify-center mt-4" id="pagination_nav">
                {!! $products->links() !!}
            </div>
        </div>
    </div>

    @include('home.carousel_categories_card_details')


</x-app-layout>
