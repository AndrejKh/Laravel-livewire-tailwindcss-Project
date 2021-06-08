<div x-data="{ open: false }" class="container max-w-7xl mx-auto">
    <div class="flex flex-wrap items-center">
        <h1 class="flex-auto my-5">Usuarios del sitio</h1>
    </div>

    {{-- Listado de categorias --}}
    <div class="flex bg-white w-full mb-3 py-3 px-3">
        <input
            wire:model="search"
            class="form-control flex-auto shadow block text-sm"
            type="text"
            placeholder="Buscar estados..."
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
    @if ($usuarios->count())
        <div class="bg-white rounded-lg shadow overflow-hidden w-full mx-auto mb-8">
            <table >
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr class="text-xs font-medium text-gray-500 uppercase text-left tracking-wider">
                        <th class="p-3">Id</th>
                        <th class="p-3"></th>
                        <th class="p-3">Nombre</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Identidad</th>
                        <th class="p-3">Telefono</th>
                        <th class="p-3">Estado</th>
                        <th class="p-3">Ciudad</th>
                        <th class="p-3 text-center">Perfil</th>
                        <th class="p-3 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($usuarios as $usuario)
                        <tr class="text-sm text-gray-500">
                            <td class="p-2 text-center"> {{$usuario->id}} </td>
                            <td class="p-2">
                                @if ($usuario->profile_photo_path)
                                    <img class="h-8 w-8 rounded-full object-cover" src="/storage/{{$usuario->profile_photo_path}}" alt="" />
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" fill="#777">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                                </svg>
                                @endif
                            </td>
                            <td class="p-2"> {{$usuario->name}} </td>
                            <td class="p-2"> {{$usuario->email}} </td>
                            <td class="p-2"> {{$usuario->type_identity}} - {{$usuario->doc_identity}} </td>
                            <td class="p-2"> {{$usuario->phone}} </td>
                            <td class="p-2"> @if ($usuario->state) {{$usuario->state->state}} @endif </td>
                            <td class="p-2"> @if ($usuario->city) {{$usuario->city->city}} @endif </td>
                            <td class="p-2 text-center">
                                @if ( $usuario->roles[0]->name == 'seller' )
                                    <span class="text-green-600">
                                        {{ $usuario->roles[0]->name }}
                                    </span>
                                @elseif( $usuario->roles[0]->name == 'buyer' )
                                    <span class="text-yellow-600">
                                        {{ $usuario->roles[0]->name }}
                                    </span>
                                @else
                                    <span class="text-blue-600">
                                        {{ $usuario->roles[0]->name }}
                                    </span>
                                @endif
                            </td>
                            <td class="p-2 text-center"> <span class="rounded-full bg-green-300 text-green-700 px-2">{{$usuario->status}}</span> </td>
                            <td>
                                <button class="rounded-full py-1 px-3 bg-blue-600 text-white" wire:click="">Pausar</button>
                            </td>

                            {{-- <td class="px-6 py-4 text-center">
                                <button @click="open= true" wire:click="edit({{$usuario}})" class="rounded-3xl bg-blue-500 p-2">
                                    <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 24 24" ><path d="M0 0h24v24H0z" fill="none"/><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                                </button>
                                <button wire:click="destroy({{$usuario}})" class="rounded-3xl bg-red-500 p-2">
                                    <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                                </button>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="bg-gray-100 px-6 py-4 border-t border-gray-200">
                {{-- Paginacion --}}
                {{ $usuarios->links() }}
            </div>
        </div>
    @else
        <div class="text-gray-400 bg-white py-3 px-4 border-t border-gray-200 mb-10">No se encontraron resultados para la busqueda "{{ $search }}" en la pagina {{ $page }} al mostrar {{ $perPage }}  por pagina</div>
    @endif

    @include('common.alert')
</div>

