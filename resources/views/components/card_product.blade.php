<div class="max-w-xs rounded-md overflow-hidden shadow-md hover:shadow-xl my-2 bg-white relative mb-6">
    <a href="{{route('products.details.show', $product->slug)}}" aria-label="ver los precios del producto {{ $product->title }}">
        <img class="w-full" src="/storage/{{ $product->thumbnail }}" alt="{{ $product->title }}" width="250px" height="250px" loading="lazy">
        <span class="absolute top-4 left-2 svgProdcutInShoppingCar hidden" title="Producto en carrito">
            <img src="{{ asset('in_car.svg') }}" alt="imagen producto en carrito de compras" loading="lazy">
        </span>
        <div class="font-semibold text-xl text-gray-900 text-left px-2 pt-2">
            {{ $product->title }}
        </div>
    </a>
    <a class="block text-left text-gray-500 hover:text-gray-900 font-semibold text-base pt-2 pb-4 pr-5 md:mb-2 px-2" href="{{ route('products.category.show', $product->category->slug ) }}" aria-label="ver los precios de la categoría {{ $product->category->category }}">
        {{ $product->category->category }}
    </a>
    <span class="idProductCard" hidden>{{$product->id}}</span>
</div>


