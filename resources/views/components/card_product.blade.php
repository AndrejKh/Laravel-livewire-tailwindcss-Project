<div class="max-w-xs rounded-md overflow-hidden shadow-md my-2 bg-white relative">
    <a href="{{route('products.details.show', $product->slug)}}" aria-label="ver los precios del producto {{ $product->title }}">
        <img class="w-full" src="/storage/{{ $product->photo_main_product }}" alt="{{ $product->title }}">
    </a>
    <span class="absolute top-4 left-2 svgProdcutInShoppingCar hidden" title="Producto en carrito">
        <svg class="fill-current text-green-450" width="25" height="20" viewBox="0 0 202 185" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M146.686 110C154.183 110 160.78 105.9 164.179 99.7L199.966 34.8C203.664 28.2 198.866 20 191.269 20L43.324 20L33.9275 0L0 8.39138L21.2322 20L57.2188 95.9L43.7239 120.3C36.4266 133.7 46.023 150 61.2174 150L180.468 139.49L181.229 139.55L61.2174 130L72.2133 110H146.686ZM52.8205 40L174.275 40L146.686 90H76.5117L52.8205 40ZM61.2174 160C50.2214 160 41.3247 169 41.3247 180C41.3247 191 50.2214 180 61.2174 180C72.2133 180 81.2099 191 81.2099 180C81.2099 169 72.2133 160 61.2174 160ZM161.18 160C150.184 160 141.288 169 141.288 180C141.288 191 150.184 180 161.18 180C172.176 180 181.173 191 181.173 180C181.173 169 172.176 160 161.18 160Z"/>
        </svg>
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
            <a class="text-gray-500 hover:text-gray-900 text-base py-4" href="{{ route('products.category.show', $product->category->slug ) }}" aria-label="ver los precios de la categoría {{ $product->category->category }}">
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


