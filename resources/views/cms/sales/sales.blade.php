@extends('layouts.app')

    @section('title')
        Ventas - Kabasto
    @endsection

@section('content')

    <div class="grid grid-cols-1 md:grid-cols-6 mb-14 bg-gray-100">
        <div class="hidden md:block bg-gray-100 px-0 md:px-1 lg:px-4 py-6 rounded-sm shadow-sm col-span-1">
          <!-- Aside Navbar -->
          @include('common.aside_navbar_perfil')
        </div>

        <div class=" px-2 rounded-sm shadow-sm col-span-5">
            <!-- Contenido -->
            <div class="w-full">

                @livewire('sales-component',['user_id' => auth()->user()->id])

            </div>
        </div>
    </div>
    {{-- Modal de notificacion --}}
    <div class="fixed right-8 top-8 bg-green-450 rounded-md shadow-lg px-2 py-1 alertActive z-50" style="display:none;" id="notificationAlert">
        <div class="flex items-center justify-between flex-wrap px-2">
            <div class="max-w-xl flex-1 flex items-center">
                <p class="font-medium text-white">
                    Compra calificada exitosamente!
                </p>
            </div>
            <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                <button type="button" class="-mr-1 flex p-1 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2" onclick="hideNotificationAlert()">
                    <span class="sr-only">Dismiss</span>
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        function hideNotificationAlert(){
            document.getElementById('notificationAlert').style.display = 'none';
        }
    </script>
    @include('common.navbar_movil_perfil')

@endsection
