<div>
    {{$products_search_input}}
    <div x-data="{open:false, selected:false, category_name:'', img_cat:''}" class="mt-1 relative">
        <div class="relative w-full py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
            <span x-show="!selected" class="flex items-center">
                <input  @click="open = true" @click.away="open = false"
                        wire:model="products_search_input"

                        type="text"
                        class="w-full rounded-full"
                        placeholder="Buscar un producto"
                >
            </span>
            <div x-show="selected"
                @click="selected = false"
                class="flex items-center border-gray-900 shadow py-2 px-5 rounded-full cursor-pointer"
            >
                <img :src="img_cat" class="flex-shrink-0 h-6 w-6 rounded-full">
                <span x-text="category_name" class="font-normal text-lg ml-6 block truncate"></span>

                <span class="text-green-600 absolute inset-y-0 right-0 flex items-center pr-4">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </span>
            </div>
        </div>
        <ul   x-show="open"
                class="absolute mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">

            @foreach ($products as $product)
                <li @click="selected = !selected;
                            category_name= '{{$product->title}}';
                            img_cat='/storage/{{$product->photo_main_product}}' "
                            wire:click="SetCategory({{$product->id}})"
                            class="text-gray-900 cursor-pointer select-none relative py-2 pl-3">

                                <div class="flex items-center">
                                    <img src="/storage/{{$product->photo_main_product}}" class="flex-shrink-0 h-6 w-6 rounded-full" alt="">
                                    <span class="font-normal ml-3 block truncate">
                                        {{ $product->title }}
                                    </span>
                                </div>
                                <span class="text-sm text-green-600 absolute inset-y-0 right-0 flex items-center pr-4">
                                    {{$product->category->category}}
                                </span>
                </li>
            @endforeach

        </ul>
    </div>
</div>

