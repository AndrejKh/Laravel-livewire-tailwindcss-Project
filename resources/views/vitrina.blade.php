<x-app-layout>
    <div class="flex">
        <div class="flex justify-center mt-3">
            <div class="max-w-7xl w-full px-6">
                <h2 class="font-bold text-2xl text-gray-900 px-2 md:px-0 mb-2"> ({{ $total_products_search }}) Productos encontrados</h2>
                @isset($query)
                    <span class="text-md text-gray-600">
                        Búsqueda:
                    </span>
                    <strong class="text-md text-gray-600">
                        {{ $query }}
                    </strong>
                @endisset
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-9 mb-14 bg-gray-100 max-w-7xl">

        <div class="md:col-span-2 hidden md:block bg-gray-100 px-0 md:px-2 lg:px-3">
          <!-- Aside Navbar -->
          @include('components.aside_filter')

        </div>

        <!-- Contenido -->
        <div class="md:col-span-7 max-w-7xl w-full px-4 mt-3">

            <div class="flex justify-center">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                    @foreach ($products as $product)

                        @include('components.card_product')

                    @endforeach
                </div>
                <div class="flex justify-center mt-4" id="pagination_nav">
                    {{-- {!! $products->links() !!} --}}
                </div>
            </div>

            @include('home.carousel_categories_card_details')

        </div>
    </div>
</x-app-layout>
