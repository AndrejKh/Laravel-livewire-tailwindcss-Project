<x-app-layout>

    <div class="flex justify-center mt-3">
        <div class="max-w-7xl w-full px-2">
            <div class="grid grid-cols-1 lg:grid-cols-6 gap-3">
                <div class="max-w-7xl col-span-3 rounded-xl shadow-md overflow-hidden">
                    <img class="w-full" src="/storage/{{ $product->photo_main_product }}" alt="{{ $product->title }}">
                </div>
                <div class="max-w-7xl col-span-3 relative px-3 mt-4">
                    <h1 class="text-4xl text-gray-900 font-semibold mb-3 md:mb-5 lg:mb-6">{{ $product->title }}</h1>
                    @if ( count($items) > 0 )
                        <span class="bg-blue-400 text-white font-semibold rounded-sm shadow px-3 py-2 absolute top-0 right-4">
                            Disponible
                        </span>
                    @endif
                    <a class="text-md text-gray-900" href="{{route('products.category.show', $product->category->slug)}}">
                        Categoría: <span class="text-gray-400">{{ $product->category->category }}</span>
                    </a>
                    <p class="text-gray-500 mt-4 md:mt-6 lg:mt-10 text-base md:text-lg">{{ $product->description }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-3">
        <div class="max-w-7xl w-full px-2">
                @foreach ($items as $item)
                    @include('components.card_item_seller_product_detail')
                @endforeach
        </div>
    </div>

    @include('home.carousel_categories_card_details')


</x-app-layout>
