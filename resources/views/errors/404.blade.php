@extends('layouts.app')

@section('title')
    Kabasto.com - Página no encontrada :\
@endsection

@section('content')

    <div class="text-2xl font-bold text-gray-900 text-center mt-14">
        No podemos encontrar la página que estas buscando
    </div>
    <div class="mt-10 text-center">
        <img class="mx-auto mb-10" src="{{ asset('404.svg') }}" alt="imagen de página no encontrada">
        <a class="text-xl text-white bg-green-500 py-2 px-16 rounded-full shadow-md" href="{{ route('home') }}">Ir al inicio</a>
    </div>

@endsection
