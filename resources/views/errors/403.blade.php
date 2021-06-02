@extends('layouts.app')

@section('title')
    Kabasto.com - Página no accesible :\
@endsection

@section('content')

    <div>
        Esta página no esta permitida para tí. Debes iniciar sesión para accerder.
    </div>
    <a href="{{ route('login') }}">Iniciar sesión</a>
    <a href="{{ route('register') }}">Registrarse</a>

@endsection

