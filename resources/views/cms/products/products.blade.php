@extends('layouts.app')

    @section('title')
        Productos - Kabasto
    @endsection

@section('content')

    <div class="grid grid-cols-1 md:grid-cols-6 mb-14">
        <div class="hidden md:block bg-gray-100 px-0 md:px-1 lg:px-4 py-6 rounded-sm shadow-sm col-span-1">
          <!-- Aside Navbar -->
          @include('common.aside_navbar_perfil')
        </div>

        <div class="bg-white p-6 rounded-sm shadow-sm col-span-5">
            <!-- Contenido -->
            <div class="w-full p-6">

                @livewire('product-component')
            </div>
        </div>
    </div>
    @include('common.navbar_movil_perfil')

@endsection
