<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-6 mb-14">
        <div class="hidden md:block bg-gray-100 px-0 md:px-1 lg:px-4 py-6 rounded-sm shadow-sm col-span-1">
          <!-- Aside Navbar -->
          @include('common.aside_navbar_perfil')
        </div>

        <div class="bg-gray-100 p-2 md:p-6 rounded-sm shadow-sm col-span-5">
            <!-- Contenido -->
            <div class="w-full">
                {{-- Listado de items --}}
                @livewire('items-component',['user_id' => auth()->user()->id])
                {{-- Modal para crear items --}}
                @livewire('modal-products-items-component',['user_id' => auth()->user()->id])
            </div>
        </div>
    </div>
    @include('common.navbar_movil_perfil')
</x-app-layout>
