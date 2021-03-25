<div class="">

    <img src="/storage/{{$product->photo_main_product}}" alt="{{$product->title}}" class="w-full h-full object-cover" />
<div class="grid grid-cols-1">
    <div class="flex">

      </div>
  <div class="col-start-1 row-start-2 px-4">
    <div class="flex items-center text-sm font-medium my-5 sm:mt-2 sm:mb-4">
      <svg width="20" height="20" fill="currentColor" class="text-violet-600">
        <path d="M9.05 3.691c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.372 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.539 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118l-2.8-2.034c-.784-.57-.381-1.81.587-1.81H7.03a1 1 0 00.95-.69L9.05 3.69z" />
      </svg>
      <div class="ml-1">
        <span class="text-black">4.94</span>
        <span class="sm:hidden md:inline">(128)</span>
      </div>
      <div class="text-base font-normal mx-2">·</div>
      <div>{{$product->title}}</div>
    </div>
  </div>
  <div class="col-start-1 row-start-3 space-y-3 px-4">
    <p class="flex items-center text-black text-sm font-medium">
        {{$product->category->category}}
    </p>
    <button type="button" class="bg-green-600 text-green-500 text-base font-semibold px-6 py-2 rounded-lg">
        Ver Precios
    </button>
  </div>

</div>
</div>
