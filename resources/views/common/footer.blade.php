<footer class="bg-gray-900 max-w-screen-2xl mx-auto px-4 md:px-6 lg:px-8 pt-10 pb-3">
    <div class="px-2 grid grid-cols-4 md:grid-cols-6 gap-1">
        <div class="col-span-4 md:col-span-2 items-center md:text-left mb-8 md:mb-0">
            <img class="mx-auto md:mx-0" src="{{ asset('logo.svg') }}" alt="">
            <p class="mt-2 md:pr-10 text-white text-center md:text-left">
                La plataforma enfocada en cambiar la manera de hacer mercado en Venezuela.
            </p>
            <div class="mt-3 text-center md:text-left">
                <span>
                    <img class="inline" src="{{ asset('facebook.svg') }}" alt="imagen facebook de kabasto">
                </span>
                <span>
                    <img class="inline" src="{{ asset('instagram.svg') }}" alt="imagen instagram de kabasto">
                </span>
            </div>
        </div>
        <div class="col-span-4 sm:col-span-2 mb-5 sm:mb-0">
            <div class="text-green-500 text-center md:text-left text-lg mb-4">
                Sitemap
            </div>
            <div class="text-gray-100 text-center md:text-left hover:text-gray-400">
                <a href="{{ route('home') }}">Inicio</a>
            </div>
            <div class="text-gray-100 text-center md:text-left hover:text-gray-400">
                <a href="{{ route('brands.show') }}">Supermercados y abastos</a>
            </div>
            <div class="text-gray-100 text-center md:text-left hover:text-gray-400">
                <a href="{{ route('categorias') }}">Categorias</a>
            </div>
            <div class="text-gray-100 text-center md:text-left hover:text-gray-400">
                <a href="{{ route('products.show') }}">Productos</a>
            </div>
        </div>
        <div class="col-span-4 sm:col-span-2">

            <div class="text-green-500 text-center md:text-left text-lg mb-5">
                Pronto también en celulares
            </div>
            <div class="">
                <img class="mx-auto md:mx-0" src="{{ asset('appstore.svg') }}" alt="imagen app store proximamente kabasto">

            </div>
            <div class="pt-3">
                <img class="mx-auto md:mx-0" src="{{ asset('googleplay.svg') }}" alt="imagen google play proximamente kabasto">
            </div>
        </div>

    </div>
    <div class="mt-4 text-center w-full text-gray-600 text-sm">
        Kabasto, 2021.
    </div>
</footer>
