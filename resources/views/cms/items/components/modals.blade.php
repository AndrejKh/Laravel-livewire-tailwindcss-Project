{{-- Modal eliminar item --}}
@if ($itemToDelete)
    <x-jet-dialog-modal wire:model="show_modal_delete">
        <x-slot name="title">
            <div class="grid grid-cols-5 py-2">
                <h5 class="col-span-4 text-xl font-bold text-gray-900">Eliminar producto</h5>
                <span wire:click="cancel" class="justify-self-end">
                    <svg class="cursor-pointer" width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" fill="black"/>
                    </svg>
                </span>
            </div>
        </x-slot>

        <x-slot name="content">

            <div class="grid grid-cols-5 gap-2">
                <div class="col-span-1 self-center">
                    <img class="w-full" src="/storage/{{$itemToDelete->product->photo_main_product}}" alt="imagen de banner">
                </div>
                <div class="col-span-4 self-center ml-3">
                    <h6 class="font-bold text-lg md:text-xl ">{{$itemToDelete->product->title}}</h6>
                    <span class="text-md text-gray-500">{{$item->product->category->category}}</span>
                    <strong class="text-xl block">{{$item->price}} $USD</strong>
                </div>
            </div>

        </x-slot>
        <x-slot name="footer">
            <div class="flex">
                <button wire:click="cancel"  type="button" class="w-full mr-2 rounded-md py-2 text-base text-black shadow-sm hover:bg-gray-100 focus:outline-none transition ease-in-out duration-150 sm:text-sm items-center border border-gray-300">
                    Cancelar
                </button>
                <button wire:click="destroy( {{$itemToDelete}} )" type="button" class="w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base text-white shadow-sm hover:bg-red-700 focus:outline-none transition ease-in-out duration-150 sm:text-sm items-center">
                    Eliminar
                </button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>
@endif

{{-- Modal actualizar item --}}
@if ($itemToUpdate)
    <x-jet-dialog-modal wire:model="show_modal_delete">
        <x-slot name="title">
            <div class="grid grid-cols-5 py-2">
                <h5 class="col-span-4 text-xl font-bold text-gray-900">Actualizar producto</h5>
                <span wire:click="cancel" class="justify-self-end">
                    <svg class="cursor-pointer" width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" fill="black"/>
                    </svg>
                </span>
            </div>
        </x-slot>

        <x-slot name="content">

            <div class="grid grid-cols-5 lg:grid-cols-7 gap-2 p-2 rounded-md shadow bg-green-100">
                <div class="col-span-1 self-center">
                    <img class="w-full rounded-md" src="/storage/{{$itemToUpdate->product->photo_main_product}}" alt="imagen de banner">
                </div>
                <div class="col-span-4 lg:grid-cols-6 self-center ml-4">
                    <h6 class="font-bold text-lg md:text-xl ">{{$itemToUpdate->product->title}}</h6>
                    <span class="text-sm text-gray-500">{{$itemToUpdate->product->category->category}}</span>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 mt-3">
                <div class="col-span-1">
                    <div class="flex-auto mb-3">
                        <label class="text-md font-semibold mb-2" for="quantity">Cantidad</label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input wire:model.lazy="quantity" autocomplete="min_amount_purchase" type="number" class="flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300" required onkeypress="return filterInteger(event);">
                            <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-800 text-sm font-bold" title="Unidad">
                                ud.
                            </span>
                        </div>
                        @error('quantity')
                            <small class="text-red-400 italic">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex-auto mb-3">
                        <label class="text-md font-semibold mb-2" for="price">Precio</label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input wire:model.lazy="price" autocomplete="min_amount_purchase" type="number" class="flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300" required onkeypress="return filterFloat(event,this);">
                            <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-green-600 text-sm font-bold" title="Dólares">
                                $USD
                            </span>
                        </div>
                        @error('price')
                            <small class="text-red-400 italic">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>

        </x-slot>
        <x-slot name="footer">
            <div class="grid grid-cols-5 gap-1">
                <button wire:click="cancel"  type="button" class="col-span-2 w-full mr-2 rounded-md py-2 text-base text-black shadow-sm hover:bg-gray-100 focus:outline-none transition ease-in-out duration-150 sm:text-sm items-center border border-gray-300">
                    Cancelar
                </button>
                <button wire:click="update()" type="button" class="col-span-3 w-full rounded-md border border-transparent px-4 py-2 bg-green-500 text-base text-white shadow-sm hover:bg-green-800 focus:outline-none transition ease-in-out duration-150 sm:text-sm items-center">
                    Actualizar
                </button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>
@endif
