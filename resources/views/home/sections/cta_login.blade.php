@auth
@else

    <div class="max-w-7xl bg-white py-7 px-2 lg:hidden">

        <span class="text-lg font-semibold text-gray-900 mb-4 text-left">Registrate gratis y compra</span>

        <a class="rounded-md shadow-md text-white bg-green-500 w-full py-2 block text-center mt-3 mb-1" href="{{ route('register') }}" aria-label="ir a registrarse gratuitamente">
            Registrarme
        </a>

        <a class="" href="{{ route('login') }}" aria-label="ir a iniciar sesión">Iniciar sesión</a>

    </div>
@endauth
