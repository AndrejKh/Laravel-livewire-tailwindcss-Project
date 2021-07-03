<nav x-data="{ open: false }" class="bg-green-400 shadow">
    <!-- Primary Navigation Menu -->
    <div class="max-w-screen-2xl mx-auto px-4 md:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex w-10/12">
                <div class="flex w-full">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex sm:hidden items-center">
                        <a href="{{ route('home') }}" aria-label="ir al inicio de kabasto">
                            <img src=" {{ asset('logo_nav.svg') }} " alt="logo de Kabasto" width="22px" height="33px">
                        </a>
                    </div>
                    <div class="flex-shrink-0 hidden sm:flex items-center">
                        <a href="{{ route('home') }}" aria-label="ir al inicio de kabasto">
                            <x-jet-application-mark class="block h-9 w-auto" />
                        </a>
                    </div>

                    @include('common.search_input_nabvar')
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('products.show') }}" :active="request()->routeIs('products.show')">
                        Productos
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('brands.show') }}" :active="request()->routeIs('brands.show')">
                        Abastos
                    </x-jet-nav-link>
                </div>
            </div>

            <div class="hidden md:flex md:items-center md:ml-6">
                <div class="ml-3 relative">
                    <a class="shoppingCarButtonOpenModal" href="#" aria-label="mostrar carrito de compras">
                        <img src="{{ asset('shopping_car.svg') }}" alt="icono del carrito de compras" width="30px" height="25px">
                    </a>
                    <span class="w-2 h-2 absolute -top-1 -right-1 rounded-full bg-blue-600 hidden" id="badgeIconShoppingCarNavbar"></span>
                </div>

                <div class="ml-3 relative">
                    @auth
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Administrar cuenta') }}
                                </div>


                                <x-jet-dropdown-link href="{{ route('dashboard') }}">
                                    Resumen
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    Perfil
                                </x-jet-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                @endif

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    @else
                        <x-jet-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                            Ingresar
                        </x-jet-nav-link>
                        <x-jet-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                            Registrarse
                        </x-jet-nav-link>
                    @endauth
                </div>

            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-900 focus:outline-none focus:text-gray-800 transition duration-150 ease-in-out" aria-label="desplegar menu para celulares">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="bg-white md:hidden hidden absolute z-50 w-full">


        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @auth

                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="flex-shrink-0 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-600">{{ Auth::user()->email }}</div>
                    </div>

                @endauth
            </div>



            @auth
                    <div class="mt-3 space-y-1">

                        <!-- Account Management -->
                        <x-jet-responsive-nav-link class="text-center" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                            Resumen
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link class="text-center" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            Perfil
                        </x-jet-responsive-nav-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                {{ __('API Tokens') }}
                            </x-jet-responsive-nav-link>
                        @endif



                    </div>
            @else
            <div class="text-lg font-bold text-green-600 text-center">Inicia sesión para continuar</span>
                    <div class="mt-3 space-y-1 text-center">
                        <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                            Ingresar
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                            Registrarse
                        </x-jet-responsive-nav-link>
                    </div>
            @endauth

            <hr />

            <div class="pt-2 pb-3 space-y-1 text-center">
                <x-jet-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    Inicio
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('brands.show') }}" :active="request()->routeIs('brands.show')">
                    Abastos
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('products.show') }}" :active="request()->routeIs('products.show')">
                    Productos
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('categorias') }}" :active="request()->routeIs('categorias')">
                    Categorías
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('support.index') }}" :active="request()->routeIs('')">
                    Soporte
                </x-jet-responsive-nav-link>
                <hr />
                <!-- Authentication -->
                <form method="POST" class="text-center bg-gray-100" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Cerrrar sesión') }}
                    </x-jet-responsive-nav-link>
                </form>
                <hr />
            </div>
        </div>
    </div>
</nav>



