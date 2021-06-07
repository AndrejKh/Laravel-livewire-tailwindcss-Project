<footer class="bg-gray-900 w-full mx-auto px-4 md:px-6 lg:px-8 pt-10 pb-3">
    <div class="px-2 grid grid-cols-1 sm:grid-cols-3 md:grid-cols-9 gap-1 max-w-7xl mx-auto">

        <div class="col-span-1 sm:col-span-3 items-center md:text-left mb-8 md:mb-0">
            <img class="mx-auto md:mx-0" src="{{ asset('logo.svg') }}" alt="">
            <p class="mt-2 md:pr-10 text-white text-center md:text-left">
                La plataforma enfocada en cambiar la manera de hacer mercado en Venezuela.
            </p>
            <div class="mt-3 text-center md:text-left">
                <a href="">
                    <img class="inline" src="{{ asset('facebook.svg') }}" alt="imagen facebook de kabasto">
                </a>
                <a href="">
                    <img class="inline" src="{{ asset('instagram.svg') }}" alt="imagen instagram de kabasto">
                </a>
            </div>
        </div>

        <div class="sm:col-span-1 md:col-span-2 mb-5 sm:mb-0">
            <div class="text-green-500 text-center md:text-left text-lg mb-4">
                Enlaces de interés
            </div>
            <div class="text-gray-100 text-center md:text-left hover:text-gray-400">
                <a href="{{ route('home') }}">Inicio</a>
            </div>
            <div class="text-gray-100 text-center md:text-left hover:text-gray-400">
                <a href="{{ route('brands.show') }}">Abastos</a>
            </div>
            <div class="text-gray-100 text-center md:text-left hover:text-gray-400">
                <a href="{{ route('categorias') }}">Categorias</a>
            </div>
            <div class="text-gray-100 text-center md:text-left hover:text-gray-400">
                <a href="{{ route('products.show') }}">Productos</a>
            </div>
        </div>

        <div class="sm:col-span-1 md:col-span-2 mb-5 sm:mb-0">
            <div class="text-green-500 text-center md:text-left text-lg mb-4">
                Información general
            </div>
            <div class="text-gray-100 text-center md:text-left hover:text-gray-400">
                <a href="{{ route('politics.privacy') }}">Politicas de privacidad</a>
            </div>
            <div class="text-gray-100 text-center md:text-left hover:text-gray-400">
                <a href="">Ayuda y  soporte</a>
            </div>
        </div>

        <div class="sm:col-span-1 md:col-span-2">

            <div class="text-green-500 text-center md:text-left text-lg mb-5">
                Pronto también en celulares
            </div>
            <div>
                <img class="mx-auto md:mx-0" src="{{ asset('appstore.svg') }}" alt="imagen app store proximamente kabasto">
            </div>
            <div class="pt-3">
                <img class="mx-auto md:mx-0" src="{{ asset('googleplay.svg') }}" alt="imagen google play proximamente kabasto">
            </div>
        </div>

    </div>
    <div class="mt-4 text-center w-full text-gray-600 text-sm mx-auto">
        Kabasto, 2021.
    </div>
</footer>
