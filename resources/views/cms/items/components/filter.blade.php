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
