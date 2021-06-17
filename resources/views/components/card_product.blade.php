<div class="max-w-xs rounded-md overflow-hidden shadow-md my-2 bg-white relative">
    <a href="{{route('products.details.show', $product->slug)}}" aria-label="ver los precios del producto {{ $product->title }}">
        <img class="w-full" src="/storage/{{ $product->photo_main_product }}" alt="{{ $product->title }}" width="250px" height="250px">
    </a>
    <span class="absolute top-4 left-2 svgProdcutInShoppingCar hidden" title="Producto en carrito">
        <img src="{{ asset('in_car.svg') }}" alt="imagen producto en carrito de compras">
    </span>
    <div class="px-2 pt-2">
        <div class="font-bold text-xl text-gray-900 hover:text-gray-700 text-left">
          <a class="py-3" href="{{route('products.details.show', $product->slug)}}" aria-label="ver los precios del producto {{ $product->title }}">
              {{ $product->title }}
          </a>
        </div>
    </div>
    <div class="px-2 py-1 grid grid-cols-1 gap-4">
        <div class="font-semibold text-sm md:mb-2 px-0 text-left">
            <a class="text-gray-500 hover:text-gray-900 text-base py-4 pr-5" href="{{ route('products.category.show', $product->category->slug ) }}" aria-label="ver los precios de la categoría {{ $product->category->category }}">
                {{ $product->category->category }}
            </a>
        </div>
        {{-- <div class="font-bold text-sm md:mb-2 text-blue-500 text-right">
                5kg.
        </div> --}}
    </div>
    <div class="px-2 pb-2 flex justify-center">
        {{-- <a class="btn-primary" href="{{route('products.details.show', $product->slug)}}" aria-label="ver los precios del producto {{ $product->title }}">
          Ver precios
        </a> --}}
    </div>
    <span class="idProductCard" hidden>{{$product->id}}</span>
</div>


