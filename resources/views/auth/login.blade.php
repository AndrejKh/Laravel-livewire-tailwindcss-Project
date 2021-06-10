@extends('layouts.guest')
    @section('title')
        Inicia sesión y disfruta de comprar en Kabasto
    @endsection

    @section('header')
        {{-- precargar imagenes --}}
        <link rel="preload" href="{{ asset( 'home.png' ) }}" as="image">

        <meta name="robots" content="index,follow"/>

        <!-- Primary Meta Tags -->
        <meta name="title" content="Inicia sesión para disfrutar de toda la experiencia - Kabasto.com">
        <meta name="description" content="Ingresa a la plataforma y descubre lo fácil que es encontrar un abasto en tu ciudad. Kabasto.com">
        <meta name="keywords" content="precios en los supermercados en venezuela">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://kabasto.com/login">
        <meta property="og:title" content="Inicia sesión para disfrutar de toda la experiencia - Kabasto.com">
        <meta property="og:description" content="Ingresa a la plataforma y descubre lo fácil que es encontrar un abasto en tu ciudad. Kabasto.com">
        <meta property="og:image" content="{{ asset( 'home.png' ) }}">

        {{-- url canonical --}}
        <link rel="canonical" href="https://kabasto.com/login" />
    @endsection

@section('content')

    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
        @if( app('request')->input('r') )
        {{--
             fue redireccionado desde la vista de comparar,
             El usuario comparo los precios y al momento de comprar, no estaba logeado
             --}}
        <div class="text-green-600 font-semibold text-md my-3 text-center">
            Inicia sesión para completar tu compra.
        </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="Email" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="Contraseña" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">
                        Recordarme
                    </span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        Olvide mi contraseña
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    Ingresar
                </x-jet-button>
            </div>
            <hr class="mt-4">

            <div class="flex items-center justify-center mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        Crear cuenta
                    </a>
                @endif
            </div>
        </form>
    </x-jet-authentication-card>

@endsection
