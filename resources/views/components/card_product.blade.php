<div class="max-w-xs rounded-md overflow-hidden shadow-md my-2 bg-white">
    <img class="w-full" src="/storage/{{ $product->photo_main_product }}" alt="Sunset in the mountains">
    <div class="px-2 md:px-4 pt-2 ">
      <div class="font-bold text-xl mb-2 text-blue-500 hover:text-gray-900 text-left">
          <a href="">
              {{ $product->title }} sfasfas sdf asdf asd
          </a>
    </div>
    </div>
    <div class="px-2 md:px-4 py-2 grid grid-cols-2 gap-4">
        <div class="font-bold text-sm mb-2 px-0">
            <a class="text-blue-500 hover:text-gray-900" href="">
                {{ $product->category->category }}
            </a>
        </div>
        <div class="font-bold text-sm mb-2 text-blue-500 text-right">
                5kg.
        </div>
      </div>
    <div class="px-2 md:px-4 pb-2 md:pb-4 flex justify-center">
        <a class="bg-green-300 rounded-md px-5 py-2 md:py-3 text-lg font-semibold shadow-sm w-full text-center hover:bg-green-800 hover:text-white" href="#">
          Ver precios
        </a>
    </div>
</div>


