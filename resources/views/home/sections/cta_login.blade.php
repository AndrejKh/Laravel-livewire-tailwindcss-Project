@auth
@else

    <div class="max-w-7xl bg-white py-7 px-2 lg:hidden mb-4">

        <span class="text-lg font-semibold text-gray-900 mb-4 text-left">Registrate gratis y compra</span>

        <a class="rounded-md shadow-md text-gray-800 bg-green-400 w-full py-2 block text-center mt-3 mb-1" href="{{ route('register') }}" aria-label="ir a registrarse gratuitamente">
            Registrarme
        </a>

        <a class="text-base py-4" href="{{ route('login') }}" aria-label="ir a iniciar sesión">Iniciar sesión</a>

    </div>
@endauth
