<div class="grid grid-cols-1 lg:grid-cols-2 gap-1 lg:gap-2 rounded-md overflow-hidden shadow-md my-2 bg-white w-full">
    <div class="col-span-1 lg:col-span-1 px-3 md:px-5 py-2 lg:py-3 text-left">
        <div class="grid grid-rows-2 lg:grid-rows-3">
            <a class="row-span-1 text-gray-900 hover:text-gray-700 text-left font-bold text-lg" href="{{route('products.category.show', $category->slug)}}">
                {{ $category->category }}
            </a>
            <p class="row-span-1 text-gray-600 text-left pt-1 lg:pt-3 text-sm mb-3">
                {{ $category->description }}
            </p>
            <a class="hidden lg:row-span-1 lg:inline rounded shadow-md bg-green-600 text-white py-1 px-5" href="{{route('products.category.show', $category->slug)}}">
                Ver todas
            </a>
        </div>
    </div>
    <a class="col-span-1 lg:col-span-1 order-first lg:order-last overflow-hidden" href="{{route('products.category.show', $category->slug)}}">
        <div class="bg-no-repeat bg-cover bg-center w-full h-24 md:h-32 xl:h-36 overflow-hidden" style="background-image: url('/storage/{{ $category->photo }}');"></div>
    </a>
</div>
