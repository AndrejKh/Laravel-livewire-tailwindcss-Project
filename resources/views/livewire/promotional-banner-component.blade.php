<div x-data="{ open: false }" class="container w-full mx-auto">
    <div class="flex flex-wrap items-center">
        <h1 class="flex-auto my-5">Banners del sitio</h1>
        <button @click="open=!open" class="flex-1 btn-primary h-10">Nuevo Banner</button>
    </div>


    {{-- Formulario --}}
    <div x-show="open" class="bg-white rounded-lg shadow overflow-hidden w-full mx-auto p-4 mb-6">

        <div class="flex">
            <div class="flex-auto mb-3">
                <label class="form-label mb-2" for="page_banner">Página donde se verá el banner</label>
                <select class="form-control" id="page_banner" wire:model="page_banner">
                    <option value="">Selecciona una pagina</option>
                    <option value="home">Home</option>
                    <option value="promotions">Promociones</option>
                    <option value="tiendas">Tiendas</option>
                </select>
                @error('page_banner')
                    <small class="text-red-400 italic">{{$message}}</small>
                @enderror
            </div>
        </div>


            <div class="mb-3">
                <span>Selecciona la imagen del banner</span> <label class="text-green-600 cursor-pointer mb-2" for="banner">aqui</label>
                <input type="file" class="hidden" id="banner" wire:model="banner">
                @if ($banner)
                <div class="rounded-md max-w-md overflow-hidden shadow mx-auto h-48">
                    <img class="w-full" src="{{ $banner->temporaryUrl() }}">
                </div>

                @endif
                @error('banner')
                    <small class="text-red-400 italic">{{$message}}</small>
                @enderror
            </div>

            @if ($action === 'store')
                <button wire:click="agregar" class="btn-primary">Guardar</button>
            @else
                <button wire:click="update" class="btn-primary">Actualizar</button>
                <button wire:click="cancel" class="btn-delete">Cancelar</button>
            @endif
    </div>

    {{-- Listado de banners --}}
    <div class="flex bg-white w-full mb-3 py-3 px-3">
        <input
            wire:model="search"
            class="form-control flex-auto shadow block text-sm"
            type="text"
            placeholder="Buscar bannres por pagina..."
        >
        @if ($search != '')
            <button wire:click="clean" class="rounded-md shadow mx-2 px-4 bg-red-100 text-gray-600">X</button>
        @endif
        <div class="flex flex-shrink-0 md:pl-4">
            <select class="form-control text-sm pr-14" id="" wire:model="status">
                <option value="active">active</option>
                <option value="paused">paused</option>
            </select>
        </div>
        <div class="flex flex-shrink-0 md:pl-4">
            <select class="form-control text-sm pr-14" id="" wire:model="perPage">
                <option value="5">5 por pág</option>
                <option value="10">10 por pág</option>
                <option value="25">25 por pág</option>
                <option value="50">50 por pág</option>
                <option value="100">100 por pág</option>
            </select>
        </div>
    </div>
    @if ($banners->count())
        <div class="bg-white rounded-lg shadow overflow-hidden w-full mx-auto mb-8">
            <table >
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr class="text-xs font-medium text-gray-500 uppercase text-left tracking-wider">
                        <th class="px-6 py-3">Id</th>
                        <th class="px-6 py-3">Imagen</th>
                        <th class="px-6 py-3">Pagina</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($banners as $banner)
                        <tr class="text-sm text-gray-500">
                            <td class="px-6 py-4 text-center"> {{$banner->id}} </td>
                            <td class="px-6 py-4">
                                <div class="rounded-md w-32 overflow-hidden shadow mx-auto">
                                    <img class="w-full" src="/storage/{{$banner->banner}}">
                                </div>
                            </td>
                            <td class="px-6 py-4"> {{$banner->page}} </td>
                            <td class="px-6 py-4"> <span class="rounded-full bg-green-300 text-green-700 px-2 py-1">{{$banner->status}}</span> </td>
                            <td class="px-6 py-4 text-center">
                                <button @click="open= true" wire:click="edit({{$banner}})" class="rounded-3xl bg-blue-500 p-2">
                                    <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 24 24" ><path d="M0 0h24v24H0z" fill="none"/><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                                </button>
                                <button wire:click="destroy({{$banner}})" class="rounded-3xl bg-red-500 p-2">
                                    <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="bg-gray-100 px-6 py-4 border-t border-gray-200">
                {{-- Paginacion --}}
                {{ $banners->links() }}
            </div>
        </div>
    @else
        <div class="text-gray-400 bg-white py-3 px-4 border-t border-gray-200 mb-10">No se encontraron resultados para la busqueda "{{ $search }}" en la pagina {{ $page }} al mostrar {{ $perPage }}  por pagina</div>
    @endif


    {{-- Alert --}}
    <div x-data="{ open: {{$show_alert}} }" x-show="open" class="fixed right-8 top-8 bg-{{$color_alert}}-500 max-w-3xl mx-auto rounded-xl shadow-lg">
        <div class="max-w-7xl mx-auto py-2 px-3 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between flex-wrap">
            <div class="max-w-xl flex-1 flex items-center">
            <span class="flex p-2 rounded-lg">
                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='#fff'>
                    <path d='M0 0h24v24H0z' fill='none'/><path d='M18 7l-1.41-1.41-6.34 6.34 1.41 1.41L18 7zm4.24-1.41L11.66 16.17 7.48 12l-1.41 1.41L11.66 19l12-12-1.42-1.41zM.41 13.41L6 19l1.41-1.41L1.83 12 .41 13.41z'/>
                </svg>
            </span>
            <p class="ml-3 font-medium text-white">
                <span>
                    El banner fue {{$message_alert}} exitosamente!
                </span>
            </p>
            </div>
            <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
            <button wire:click="close_alert" type="button" class="-mr-1 flex p-2 rounded-md hover:bg-{{$color_alert}}-700 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                <span class="sr-only">Dismiss</span>
                <!-- Heroicon name: outline/x -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            </div>
        </div>
        </div>
    </div>
</div>
