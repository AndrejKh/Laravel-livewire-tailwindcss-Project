<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-6 mb-14 bg-gray-100">
        <div class="hidden md:block bg-gray-100 px-0 md:px-1 lg:px-4 py-6 rounded-sm shadow-sm col-span-1">
          <!-- Aside Navbar -->
          @include('components.aside_navbar_perfil')
        </div>

        <div class=" px-2 rounded-sm shadow-sm col-span-5">
            <!-- Contenido -->
            <div class="w-full">

                @livewire('purchases-component',['user_id' => auth()->user()->id])

            </div>
        </div>
    </div>
    @include('common.navbar_movil_perfil')
</x-app-layout>
