<div class="max-w-xs rounded-md overflow-hidden shadow-md my-2 bg-white">
    <img class="w-full" src="/storage/{{ $item->product->photo_main_product }}" alt="Sunset in the mountains">
    <div class="px-2 md:px-4 pt-2 ">
        <div class="font-bold text-xl mb-2 text-gray-900 hover:text-gray-700 text-left">
            <a href="{{route('products.details.show', $item->product->id)}}">
                {{ $item->product->title }}
            </a>
        </div>
    </div>
    <div class="text-3xl font-light ">
        {{$item->price}} USD$
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
                <span class="inline md:hidden">Disp.</span>
                <span class="hidden md:inline">Disponibles</span>
            </div>
        </div>
    </div>
    <div class="px-2 md:px-4 pb-2 md:pb-4 flex justify-center">
        <a class="bg-green-400 rounded-md px-5 py-2 md:py-3 text-lg font-semibold shadow-sm w-full text-center hover:bg-green-800 hover:text-white" href="{{route('products.details.show', $item->product->id)}}">
          Ver precios
        </a>
    </div>
</div>



