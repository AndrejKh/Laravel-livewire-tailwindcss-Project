@auth
@else

    <div class="max-w-7xl bg-white py-2 px-2 lg:hidden">

        <span class="text-xl font-semibold text-gray-900 mb-4 text-left">Inicia sesión para comprar en el supermercado que desees.</span>

        <a class="rounded-md shadow-md text-white bg-blue-600 w-full py-3 block text-center my-3" href="{{ route('login') }}">
            Iniciar sesión
        </a>

        <a class="" href="{{ route('register') }}">Crear cuenta</a>

    </div>
@endauth
