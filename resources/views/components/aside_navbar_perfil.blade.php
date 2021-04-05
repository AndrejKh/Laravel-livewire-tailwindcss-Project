<div class="px-0 md:px-1 lg:px-4 py-6 w-48 h-screen shadow-r-md">
    <div class="flex">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <span class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </span>
            @else
                <span class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        {{ Auth::user()->name }}
                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                </span>
            @endif
        <span class="font-bold self-center ml-2">{{auth()->user()->name}}</span>
    </div>
    <hr>
    <ul class="mt-6">
        <li class=" mb-8">
            <a class="flex" href="{{ route('dashboard') }}">
                <div class="bg-white shadow-md p-2 rounded-lg mr-3 hover:bg-green-200">
                    <img class="" src="{{ asset('icons/perfil.svg') }}" alt="">
                </div>
                <span class="self-center">
                    Perfil
                </span>
            </a>
        </li>

        @can('perfil.usuarios')
            <li class=" mb-8">
                <a class="flex" href="{{ route('cms.usuarios') }}">
                    <div class="bg-white shadow-md p-2 rounded-lg mr-3 hover:bg-green-200">
                        <img src="{{ asset('icons/users.svg') }}" alt="">
                    </div>
                    <span class="self-center">
                        Usuarios
                    </span>
                </a>
            </li>
        @endcan
        @can('perfil.home')
            <li class=" mb-8">
                <a class="flex" href="{{ route('cms.home') }}">
                    <div class="bg-white shadow-md p-2 rounded-lg mr-3 hover:bg-green-200">
                        <img src="{{ asset('icons/home_page.svg') }}" alt="">
                    </div>
                    <span class="self-center">
                        Banners
                    </span>
                </a>
            </li>
        @endcan
        @can('perfil.categorias')
            <li class="mb-8">
                <a class="flex" href="{{ route('cms.categorias') }}">
                    <div class="bg-white shadow-md p-2 rounded-lg mr-3 hover:bg-green-200">
                        <img src="{{ asset('icons/categories.svg') }}" alt="">
                    </div>
                    <span class="self-center">
                        Categorías
                    </span>
                </a>
            </li>
        @endcan
        @can('perfil.productos')
            <li class="mb-8">
                <a class="flex" href="{{ route('cms.productos') }}">
                    <div class="bg-white shadow-md p-2 rounded-lg mr-3 hover:bg-green-200">
                        <img src="{{ asset('icons/productos.svg') }}" alt="">
                    </div>
                    <span class="self-center">
                        Productos
                    </span>
                </a>
            </li>
        @endcan
        @can('perfil.estados')
            <li class=" mb-8">
                <a class="flex" href="{{ route('cms.estados') }}">
                    <div class="bg-white shadow-md p-2 rounded-lg mr-3 hover:bg-green-200">
                        <img src="{{ asset('icons/estados.svg') }}" alt="">
                    </div>
                    <span class="self-center">
                        Estados
                    </span>
                </a>
            </li>
        @endcan
        @can('perfil.ciudades')
            <li class=" mb-8">
                <a class="flex" href="{{ route('cms.ciudades') }}">
                    <div class="bg-white shadow-md p-2 rounded-lg mr-3 hover:bg-green-200">
                        <img src="{{ asset('icons/ciudades.svg') }}" alt="">
                    </div>
                    <span class="self-center">
                        Ciudades
                    </span>
                </a>
            </li>
        @endcan
        @can('perfil.ventas')
            <li class="mb-8">
                <a class="flex" href="{{ route('cms.tiendas') }}">
                    <div class="bg-white shadow-md p-2 rounded-lg mr-3 hover:bg-green-200">
                        <img src="{{ asset('icons/items.svg') }}" alt="">
                    </div>
                    <span class="self-center">
                        Mi Tienda
                    </span>
                </a>
            </li>
        @endcan

        @can('perfil.items')
            <li class="mb-8">
                <a class="flex" href="{{ route('cms.items') }}">
                    <div class="bg-white shadow-md p-2 rounded-lg mr-3 hover:bg-green-200">
                        <img src="{{ asset('icons/productos.svg') }}" alt="">
                    </div>
                    <span class="self-center">
                        Mis Productos
                    </span>
                </a>
            </li>
        @endcan
        @can('perfil.ventas')
            <li class="mb-8">
                <a class="flex" href="{{ route('cms.ventas') }}">
                    <div class="bg-white shadow-md p-2 rounded-lg mr-3 hover:bg-green-200">
                        <img src="{{ asset('icons/ventas.svg') }}" alt="">
                    </div>
                    <span class="self-center">
                        Mis Ventas
                    </span>
                </a>
            </li>
        @endcan
        @can('perfil.blog')
            <li class="mb-8">
                <a class="flex" href="{{ route('cms.blog') }}">
                    <div class="bg-white shadow-md p-2 rounded-lg mr-3 hover:bg-green-200">
                        <img src="{{ asset('icons/blog.svg') }}" alt="">
                    </div>
                    <span class="self-center">
                        Blog
                    </span>
                </a>
            </li>
        @endcan
        @can('perfil.compras')
            <li class="mb-8">
                <a class="flex" href="{{ route('cms.compras') }}">
                    <div class="bg-white shadow-md p-2 rounded-lg mr-3 hover:bg-green-200">
                        <img src="{{ asset('icons/compras.svg') }}" alt="">
                    </div>
                    <span class="self-center">
                        Compras
                    </span>
                </a>
            </li>
        @endcan

        <li class=" mb-8">
            <a class="flex" href="{{ route('profile.show') }}">
                <div class="bg-white shadow-md p-2 rounded-lg mr-3 hover:bg-green-200">
                    <img src="{{ asset('icons/settings.svg') }}" alt="">
                </div>
                <span class="self-center">
                    Configuración
                </span>
            </a>
        </li>
    </ul>
</div>
