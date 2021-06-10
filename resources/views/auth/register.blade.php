@extends('layouts.guest')
    @section('title')
        Regístrate en Kabasto
    @endsection

    @section('header')
        {{-- precargar imagenes --}}
        <link rel="preload" href="{{ asset( 'home.png' ) }}" as="image">

        <meta name="robots" content="index,follow"/>

        <!-- Primary Meta Tags -->
        <meta name="title" content="Registrate y compra en los diferentes abastos de tu ciudad - Kabasto.com">
        <meta name="description" content="Disfruta de comparar y comprar en los diferentes abastos y supermercados de tu ciudad. Todo desde un solo lugar, sin salir de casa. Kabasto.com">
        <meta name="keywords" content="supermercados en venezuela">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://kabasto.com/register">
        <meta property="og:title" content="Registrate y compra en los diferentes abastos de tu ciudad - Kabasto.com">
        <meta property="og:description" content="Disfruta de comparar y comprar en los diferentes abastos y supermercados de tu ciudad. Todo desde un solo lugar, sin salir de casa. Kabasto.com">
        <meta property="og:image" content="{{ asset( 'home.png' ) }}">

        {{-- url canonical --}}
        <link rel="canonical" href="https://kabasto.com/register" />
    @endsection

@section('content')

    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="Nombre" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="Email" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="Contraseña" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="Confirmar contraseña" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4" hidden>
                <x-jet-input id="buyer" type="text" name="role" required value="buyer" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    ¿Ya tienes una cuenta?
                </a>

                <x-jet-button class="ml-4">
                    Registrarse
                </x-jet-button>
            </div>

            <hr class="mt-5">

            <div class="flex items-center justify-center mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('auth.register_seller') }}">
                        Crear cuenta para vender como tienda
                    </a>
                @endif
            </div>
        </form>
    </x-jet-authentication-card>

@endsection
