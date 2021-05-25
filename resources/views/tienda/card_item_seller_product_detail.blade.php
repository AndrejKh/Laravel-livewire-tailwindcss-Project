<div class="max-w-xs rounded-md overflow-hidden shadow-md my-2 bg-white">
    <img class="w-full" src="/storage/{{ $item->product->photo_main_product }}" alt="Sunset in the mountains">
    <div class="px-2 md:px-4 pt-2 ">
        <div class="font-bold text-xl mb-2 text-gray-900 hover:text-gray-700 text-left">
            <a href="{{route('products.details.show', $item->product->slug)}}">
                {{ $item->product->title }}
            </a>
        </div>
    </div>
    <div class="text-md font-semibold px-2 md:px-4">
        {{$item->price}} USD$
        <span class="text-gray-600 font-light">
            IVA Incluido
        </span>
    </div>
    <div class="px-2 md:px-4 py-0 md:py-2 grid grid-cols-2 gap-4">
        <div class="font-bold text-sm mb-2 px-0 text-left">
            <a class="text-blue-500 hover:text-gray-900" href="">
                {{ $item->product->category->category }}
            </a>
        </div>
        <div class="font-bold text-sm mb-2 text-blue-500 text-right">
            <div class="text-md font-base text-gray-700">
                <strong>{{$item->quantity}}</strong>
                <span class="inline" title="Disponibles">Disp.</span>
            </div>
        </div>
    </div>
    <div class="px-2 md:px-4 pb-2 md:pb-4 flex justify-center">
        <a class="bg-green-600 rounded-md px-5 py-2 md:py-3 text-lg text-white font-semibold shadow-sm w-full text-center hover:bg-green-800 " href="{{route('products.details.show', $item->product->slug)}}">
          Ver precios
        </a>
    </div>
</div>



