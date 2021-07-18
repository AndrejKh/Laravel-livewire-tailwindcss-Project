<div class="max-w-xs rounded-md overflow-hidden shadow-md my-2 bg-white relative cardProductBrand">
    <a href="{{route('brands.products.details.show', ['brand' => $tienda->slug, 'product' => $item->product->slug] ) }}" aria-label="ver detalle del producto {{ $item->product->title }}">
        <img class="w-full srcImageProductBrand" src="/storage/{{ $item->product->thumbnail }}" alt="{{ $item->product->title }}" width="250px" height="250px" loading="lazy">
    </a>
    <span class="absolute top-4 left-2 svgProdcutInShoppingCar hidden" title="Producto en carrito">
        <svg class="fill-current text-green-450" width="25" height="20" viewBox="0 0 202 185" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M146.686 110C154.183 110 160.78 105.9 164.179 99.7L199.966 34.8C203.664 28.2 198.866 20 191.269 20L43.324 20L33.9275 0L0 8.39138L21.2322 20L57.2188 95.9L43.7239 120.3C36.4266 133.7 46.023 150 61.2174 150L180.468 139.49L181.229 139.55L61.2174 130L72.2133 110H146.686ZM52.8205 40L174.275 40L146.686 90H76.5117L52.8205 40ZM61.2174 160C50.2214 160 41.3247 169 41.3247 180C41.3247 191 50.2214 180 61.2174 180C72.2133 180 81.2099 191 81.2099 180C81.2099 169 72.2133 160 61.2174 160ZM161.18 160C150.184 160 141.288 169 141.288 180C141.288 191 150.184 180 161.18 180C172.176 180 181.173 191 181.173 180C181.173 169 172.176 160 161.18 160Z"/>
        </svg>
    </span>
    <div class="px-2 pt-2">
        <div class="font-semibold text-xl text-gray-900 hover:text-gray-700 text-left">
            <a class="titleProductBrand" href="{{route('brands.products.details.show', ['brand' => $tienda->slug, 'product' => $item->product->slug] ) }}" aria-label="ver detalle del producto {{ $item->product->title }}">
                {{ $item->product->title }}
            </a>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-1 px-2 mb-2">
        <div class="col-span-1 text-sm px-0 text-left">
            {{-- <a class="text-gray-600 hover:text-gray-900" href="" aria-label="ver productos de la categoría {{ $item->product->category->category }}">
                {{ $item->product->category->category }}
            </a> --}}
        </div>
        <div class="col-span-2 font-bold text-sm text-blue-500 text-right">
            <div class="text-md font-base text-gray-700">
                <strong>{{$item->quantity}}</strong>
                <span class="inline" title="Disponibles">Disp.</span>
            </div>
        </div>
    </div>
    <div class="px-2 text-center">
        <span class="text-lg md:text-xl font-semibold text-blue-900">
            @php $price = number_format($item->price, 2, '.', ','); @endphp
            <span class="priceItem">{{ $price }}</span> USD$
        </span>
        <span class="text-xs md:text-xs text-gray-600 font-light">
                IVA Incluido
        </span>
    </div>
    <div class="px-2 pb-2">
        <div class="flex bg-gray-100 rounded-full">
            <span class="inline self-center bg-green-400 rounded-full p-2 cursor-pointer subtractProduct">
                <svg class="fill-current text-white h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 5v11.17l-4.88-4.88c-.39-.39-1.03-.39-1.42 0-.39.39-.39 1.02 0 1.41l6.59 6.59c.39.39 1.02.39 1.41 0l6.59-6.59c.39-.39.39-1.02 0-1.41-.39-.39-1.02-.39-1.41 0L13 16.17V5c0-.55-.45-1-1-1s-1 .45-1 1z"/></svg>
            </span>
            <span class="inline self-center w-full text-center text-semibold text-base quantityProductDetail">0</span>
            <span class="inline self-center bg-green-400 rounded-full p-2 cursor-pointer addProduct">
                <svg class="fill-current text-white h-5 w-5" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M13 19V7.83l4.88 4.88c.39.39 1.03.39 1.42 0 .39-.39.39-1.02 0-1.41l-6.59-6.59c-.39-.39-1.02-.39-1.41 0l-6.6 6.58c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0L11 7.83V19c0 .55.45 1 1 1s1-.45 1-1z"/></svg>
            </span>
        </div>
    </div>
    <span hidden class="idProductBrand">{{ $item->product->id }}</span>
</div>



