<div class="grid grid-cols-2 gap-4 rounded-md overflow-hidden shadow-md my-2 bg-white w-full">
    <div class="px-5 py-3 text-left">
        <a class="text-gray-900 hover:text-gray-700 text-left font-bold text-lg" href="{{route('products.category.show', $category->slug)}}">
            {{ $category->category }}
        </a>
        <p class="text-gray-600 text-left pt-3 text-sm">
            {{ $category->description }}
        </p>
    </div>
    <div class="">
        <img class="h-full" src="/storage/{{ $category->photo }}" alt="Sunset in the mountains">
    </div>
</div>
