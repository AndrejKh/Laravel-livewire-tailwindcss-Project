<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-6 mb-14">
        <div class="hidden md:block bg-gray-100 px-0 md:px-1 lg:px-4 py-6 rounded-sm shadow-sm col-span-1">
          <!-- Aside Navbar -->
          @include('components.aside_navbar_perfil')
        </div>

        <div class="bg-gray-100 px-2 md:p-6 col-span-5 pb-8">

            <!-- Contenido -->
            <div class="w-full p-0 md:p-3 lg:p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 max-w-7xl mt-2 gap-2">
                    {{-- Agregar Marca --}}
                    @livewire('brand-component',['user_id' => auth()->user()->id])
                    {{-- Direccion de la marca --}}
                    @livewire('address-component',['user_id' => auth()->user()->id])
                </div>

                {{-- Banners de marca --}}
                @livewire('banner-component',['user_id' => auth()->user()->id])

                {{-- Zonas de Envio --}}
                @livewire('delivery-component',['user_id' => auth()->user()->id])
            </div>

        </div>
    </div>
    @include('common.navbar_movil_perfil')
</x-app-layout>
