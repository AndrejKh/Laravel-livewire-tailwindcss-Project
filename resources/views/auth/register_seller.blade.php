<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="Razón Social" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="doc" value="Documento de Identidad" />
                <div>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center">
                            <label for="type_identity" class="sr-only">Tipo de documento</label>
                            <select id="type_identity" name="type_identity" class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md" >
                                {{-- <option value="ci.">C.I.</option> --}}
                                <option value="rif">RIF</option>
                                {{-- <option value="passport">Pasaporte</option> --}}
                            </select>
                        </div>
                        <x-jet-input id="doc_identity" class="block mt-1 w-full pl-16 md:pl-20" type="text" name="doc_identity" :value="old('doc_identity')" required />

                    </div>
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="phone" value="Número telefonico" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" required placeholder="Ej. 0424-0000000" :value="old('phone')" />
            </div>

            <div class="mt-4">
                <x-jet-label for="state" value="Estado" />
                {{-- <label for="country" class="block text-sm font-medium text-gray-700">Country / Region</label> --}}
                <select id="state" name="state_id" autocomplete="state" onchange="select()" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach ($estados as $estado)
                        <option value="{{$estado->id}}"> {{$estado->state}} </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="Contraseña" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="Confirmar contraseña" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4" hidden>
                <x-jet-input id="seller" type="text" name="role" required value="seller" />
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
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        Crear cuenta normal
                    </a>
                @endif
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
