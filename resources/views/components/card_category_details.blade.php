<div class="grid grid-cols-1 lg:grid-cols-2 gap-1 lg:gap-2 rounded-md overflow-hidden shadow-md my-2 bg-white w-full">
    <div class="col-span-1 lg:col-span-1 px-3 md:px-5 py-2 lg:py-3 text-left self-center">
        <a class="text-gray-900 hover:text-gray-700 text-left font-bold text-lg" href="{{route('products.category.show', $category->slug)}}">
            {{ $category->category }}
        </a>
        <p class="text-gray-600 text-left pt-1 lg:pt-3 text-sm">
            {{ $category->description }}
        </p>
    </div>
    <div class="col-span-1 lg:col-span-1 order-first lg:order-last overflow-hidden">
        <div class="bg-no-repeat bg-cover bg-center w-full h-24 md:h-32 xl:h-36 overflow-hidden" style="background-image: url('/storage/{{ $category->photo }}');"></div>
    </div>
</div>
