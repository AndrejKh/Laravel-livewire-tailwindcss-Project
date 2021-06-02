@extends('layouts.app')

@section('title')
    Kabasto.com - Página no encontrada :\
@endsection

@section('content')

    <div class="text-xl font-bold text-gray-900">
        No podemos encontrar la página que estas buscando
    </div>
    <div class="mx-auto my-10">
        <img src="{{ asset('404.svg') }}" alt="imagen de página no encontrada">
    </div>
    <a class="text-white bg-green-500 py-2 px-8 rounded-full shadow-md" href="{{ route('home') }}">Ir al inicio</a>

@endsection
