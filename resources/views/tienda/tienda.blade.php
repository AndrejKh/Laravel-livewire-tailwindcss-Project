<x-app-layout>
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
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                    @foreach ($items as $item)

                        @include('tienda.card_item_seller_product_detail')

                    @endforeach
                </div>
                <div class="flex justify-center mt-4" id="pagination_nav">
                    {!! $items->links() !!}
                </div>
            </div>
        </div>
    @endif


    @include('home.carousel_categories_card_details')


</x-app-layout>
