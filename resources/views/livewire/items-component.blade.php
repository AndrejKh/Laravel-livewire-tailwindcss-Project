<div class="container w-full mx-auto">
    <div class="grid grid-cols-3 md:grid-cols-5 lg:grid-cols-6 gap-2 md:gap-3 mb-4 lg:mb-6" >
        <div class="col-span-2 md:col-span-4 lg:col-span-5 self-center">
            <div class="grid grid-cols-5 lg:grid-cols-4 gap-2">
                <h1 class="col-span-5 md:col-span-2 lg:col-span-1 self-center">
                    @if ($items)
                    <strong>
                        ({{$items->count()}})
                    </strong>
                    @endif
                    Todos tus productos
                </h1>
                <div class="col-span-3 self-center w-full justify-self-end hidden md:inline">
                      <div class="relative">
                        <span class="absolute inset-y-0 right-0 flex items-center pl-2">
                          <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                          </button>
                        </span>
                        <input type="text" class="w-full border-0 py-2 text-sm text-gray-900 rounded-md pr-10 focus:outline-none focus:text-gray-900 shadow-md" placeholder="Buscar productos..."  wire:model="search">
                      </div>
                </div>
            </div>
        </div>
        <div class="col-span-1 justify-self-end	self-center w-full">
            <select class="text-xs md:text-sm bg-white rounded-md shadow-md border-0 py-auto w-full" wire:model="status">
                <option value="">Todos</option>
                <option value="active">Activos</option>
                <option value="paused">Pausados</option>
                {{-- <option value="no_inventary">Sin Inventario</option> --}}
            </select>
        </div>
        <div class="col-span-3 self-center md:hidden">
            <div class="relative">
                <span class="absolute inset-y-0 right-0 flex items-center pl-2">
                    <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </span>
                <input type="text" wire:model="search" class="w-full border-0 py-2 text-sm text-gray-900 rounded-md pr-10 focus:outline-none focus:text-gray-900 shadow-md" placeholder="Buscar productos...">
            </div>
        </div>
    </div>

    @if ($items)

        @if ($items->count())
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-2 md:gap-3">

            @foreach ($items as $item)
                <div class="col-span-2 w-full rounded-xl shadow-md relative bg-white">
                    <span wire:click="setItemDelete({{$item}})" class="w-6 h-6 absolute -top-2 -right-2 rounded-full bg-gray-600 text-white flex items-center justify-center cursor-pointer">x</span>
                    <div class="grid grid-cols-5 px-2">
                        <div class="col-span-1 self-center">
                            <img class="w-full" src="/storage/{{$item->product->photo_main_product}}" alt="imagen de banner">
                        </div>
                        <div class="col-span-4 flex flex-col justify-between sm:py-3">
                            <div class="flex justify-between items-center">
                                <h6 class="font-bold text-lg md:text-xl ">{{$item->product->title}}</h6>
                                <span class="flex ">
                                    {{-- Cual es el status del item? --}}
                                    @if ($item->status == 'active')
                                        <svg wire:click="setItemStatus( {{$item}} )" class="h-4 md:h-5 fill-current text-green-450 cursor-pointer" title="Producto activo" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.47 5.63c.39.39.39 1.01 0 1.4L9.13 18.37c-.39.39-1.01.39-1.4 0l-4.2-4.2c-.39-.39-.39-1.01 0-1.4.39-.39 1.01-.39 1.4 0l3.5 3.5L19.07 5.63c.39-.39 1.01-.39 1.4 0zm-2.11-2.12l-9.93 9.93-2.79-2.79c-.78-.78-2.05-.78-2.83 0l-1.4 1.4c-.78.78-.78 2.05 0 2.83l5.6 5.6c.78.78 2.05.78 2.83 0L22.59 7.74c.78-.78.78-2.05 0-2.83l-1.4-1.4c-.79-.78-2.05-.78-2.83 0z"/></svg>
                                    @else
                                        <svg wire:click="setItemStatus( {{$item}} )" class="h-4 md:h-5 fill-current text-blue-450 cursor-pointer" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M8 19c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2s-2 .9-2 2v10c0 1.1.9 2 2 2zm6-12v10c0 1.1.9 2 2 2s2-.9 2-2V7c0-1.1-.9-2-2-2s-2 .9-2 2z"/></svg>
                                    @endif
                                    <svg class="h-4 md:h-5 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z"/></svg>
                                </span>
                            </div>
                            <span class="text-xs sm:text-sm text-gray-500">{{$item->product->category->category}}</span>
                            <div class="flex justify-between mt-2 mb-1">
                                <div class="flex items-center">
                                    <span>
                                        Precio
                                    </span>
                                    <input class="text-sm font-semibold rounded-full inline w-14 lg:w-20 px-1 py-1 h-6 text-center mx-1 border-gray-400 bg-gray-100" type="number" value="{{$item->price}}" step="0.01">
                                    <strong>
                                        $
                                    </strong>
                                </div>
                                <div class="flex items-center">
                                    <span>
                                        Cantidad
                                    </span>
                                    <input class="text-sm font-semibold rounded-full inline w-14 lg:w-20 px-1 py-1 h-6 text-center ml-1 border-gray-400 bg-gray-100" type="number" value="{{$item->quantity}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $items->links() }}
        @else
            <div class="text-gray-400 bg-white py-3 px-4 border-t border-gray-200 mb-10">No se encontraron resultados </div>
        @endif
    @else
        <div class="text-gray-900 bg-white py-3 px-4 border-t border-gray-200 mb-10">No tienes aun productos. Recuerda que debes primero crear tu marca para poder agregar productos!</div>
    @endif

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
                <div class="col-span-4 self-center">
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

    {{-- Modal pausar o activar item --}}
    @if ($itemToChangeStatus)
    <x-jet-dialog-modal wire:model="show_modal_status">
        <x-slot name="title">
            <div class="grid grid-cols-5 py-2">
                <h5 class="col-span-4 text-xl font-bold text-gray-900">Pausar producto</h5>
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
                    <img class="w-full" src="/storage/{{$itemToChangeStatus->product->photo_main_product}}" alt="imagen de banner">
                </div>
                <div class="col-span-4 self-center">
                    <h6 class="font-bold text-lg md:text-xl ">{{$itemToChangeStatus->product->title}}</h6>
                    <span class="text-md text-gray-500">{{$itemToChangeStatus->product->category->category}}</span>
                    <strong class="text-xl block">{{$itemToChangeStatus->price}} $USD</strong>
                </div>
            </div>

        </x-slot>
        <x-slot name="footer">
            <div class="flex">
                <button wire:click="cancel"  type="button" class="w-full mr-2 rounded-md py-2 text-base text-black shadow-sm hover:bg-gray-100 focus:outline-none transition ease-in-out duration-150 sm:text-sm items-center border border-gray-300">
                    Cancelar
                </button>
                @if ($itemToChangeStatus->status == 'active')
                <button wire:click="pausarItem( {{$itemToChangeStatus}} )" type="button" class="flex w-full rounded-md border border-transparent px-4 py-2 bg-blue-450 text-base text-white shadow-sm justify-center content-center">
                    <svg class="h-6 fill-current text-white inline" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M8 19c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2s-2 .9-2 2v10c0 1.1.9 2 2 2zm6-12v10c0 1.1.9 2 2 2s2-.9 2-2V7c0-1.1-.9-2-2-2s-2 .9-2 2z"/></svg>
                    Pausar item
                </button>
                @else
                <button wire:click="activarItem( {{$itemToChangeStatus}} )" type="button" class=" flex w-full rounded-md border border-transparent px-4 py-2 bg-green-450 text-base text-white shadow-sm justify-center content-center">
                    <svg class="h-6 fill-current text-white inline" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.47 5.63c.39.39.39 1.01 0 1.4L9.13 18.37c-.39.39-1.01.39-1.4 0l-4.2-4.2c-.39-.39-.39-1.01 0-1.4.39-.39 1.01-.39 1.4 0l3.5 3.5L19.07 5.63c.39-.39 1.01-.39 1.4 0zm-2.11-2.12l-9.93 9.93-2.79-2.79c-.78-.78-2.05-.78-2.83 0l-1.4 1.4c-.78.78-.78 2.05 0 2.83l5.6 5.6c.78.78 2.05.78 2.83 0L22.59 7.74c.78-.78.78-2.05 0-2.83l-1.4-1.4c-.79-.78-2.05-.78-2.83 0z"/></svg>
                    Activar item
                </button>
                @endif
            </div>
        </x-slot>
    </x-jet-dialog-modal>
    @endif

    @include('common.alert')

</div>
