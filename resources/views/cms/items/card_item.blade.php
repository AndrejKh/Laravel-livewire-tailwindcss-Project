<div class="col-span-2 w-full rounded-xl shadow-md relative bg-white">
    <div class="grid grid-cols-5 px-2 py-1 lg:py-0">
        <div class="col-span-1 self-center">
            <img class="w-full" src="/storage/{{$item->product->photo_main_product}}" alt="imagen de banner">
        </div>
        <div class="col-span-4 flex flex-col justify-between sm:py-3 pl-2">
            <div class="grid grid-rows-2">
                <div class="flex justify-between items-center">
                    <h6 class="font-bold text-lg md:text-xl">{{$item->product->title}}</h6>
                    <span class="flex">
                        <button class="inline" wire:loading.attr="disabled" wire:click="setItemUpdate( {{ $item->id }} )">
                            <img src="{{ asset('/icons/edit.svg') }}" alt="">
                        </button>
                        <button class="inline ml-2" wire:loading.attr="disabled" wire:click="setItemDelete( {{ $item }} )">
                            <img src="{{ asset('/icons/delete.svg') }}" alt="">
                        </button>
                    </span>
                </div>
                <div class="grid grid-cols-4 text-sm md:text-md lg:text-lg text-gray-900">
                    <div class="col-span-2 flex flex-col">
                        <span class="font-semibold">
                            Precio
                        </span>
                        <span class="font-bold">
                            {{$item->price}} $USD
                        </span>
                    </div>
                    <div class=" col-span-2 flex flex-col">
                        <span class="font-semibold">
                            Cantidad
                        </span>
                        <span class="font-bold">
                            {{$item->quantity}} ud.
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
