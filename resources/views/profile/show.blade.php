@extends('layouts.app')

    @section('title')
        Perfil - Kabasto
    @endsection

@section('content')

    <div class="grid grid-cols-1 md:grid-cols-6">
        <div class="hidden md:block bg-gray-100 px-0 md:px-1 lg:px-4 py-6 rounded-sm shadow-sm col-span-1">
          <!-- Aside Navbar -->
          @include('common.aside_navbar_perfil')
        </div>

        <div class="bg-white pb-6 rounded-sm shadow-sm col-span-5">
            <!-- Contenido -->
            <div class="w-full mx-auto pb-6 sm:px-6 lg:px-8">

                <h2 class="text-lg font-bold px-2 mt-3">Tus datos personales</h2>

                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        @livewire('profile.update-profile-information-form')

                        <x-jet-section-border />
                    @endif

                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.update-password-form')
                        </div>

                        <x-jet-section-border />
                    @endif

                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.two-factor-authentication-form')
                        </div>

                        <x-jet-section-border />
                    @endif

                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.logout-other-browser-sessions-form')
                    </div>



                    {{-- @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                        <x-jet-section-border />

                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.delete-user-form')
                        </div>
                    @endif --}}
            </div>
        </div>
    </div>
    @include('common.navbar_movil_perfil')

@endsection
