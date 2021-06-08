<nav x-data="{ open: false }" class="bg-green-400 shadow">
    <!-- Primary Navigation Menu -->
    <div class="max-w-screen-2xl mx-auto px-4 md:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex w-10/12">
                <div class="flex w-full">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex sm:hidden items-center">
                        <a href="{{ route('home') }}">
                            <svg width="22" height="33" viewBox="0 0 22 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.71873 8.53125C10.425 10.2375 10.425 13.0125 8.71873 14.7188C7.86248 15.575 6.74373 16 5.62498 16C4.50623 16 3.38748 15.575 2.53123 14.7188C0.356225 12.5438 -2.47955e-05 6 -2.47955e-05 6C-2.47955e-05 6 6.54373 6.35625 8.71873 8.53125ZM3.41248 13.8375C4.00623 14.425 4.78748 14.75 5.62498 14.75C6.18123 14.75 7.03125 14.2688 7.5 14C6.925 12.2 5.53748 10.9438 4.12498 9.75C5.76873 10.6 7.04375 11.9125 8 13.5C8.925 12.275 8.94998 10.5312 7.83123 9.4125C6.74373 8.325 3.72498 7.65625 1.37498 7.375C1.65623 9.725 2.32498 12.7438 3.41248 13.8375Z" fill="black"/>
                                <path d="M20.752 22.848C20.96 23.04 21.064 23.24 21.064 23.448C21.064 23.624 21 23.784 20.872 23.928C20.744 24.056 20.592 24.12 20.416 24.12C20.256 24.12 20.088 24.048 19.912 23.904L13.384 18.336V23.376C13.384 23.616 13.312 23.8 13.168 23.928C13.04 24.056 12.872 24.12 12.664 24.12C12.44 24.12 12.256 24.056 12.112 23.928C11.984 23.8 11.92 23.616 11.92 23.376V7.704C11.92 7.464 11.984 7.28 12.112 7.152C12.256 7.024 12.44 6.96 12.664 6.96C12.872 6.96 13.04 7.024 13.168 7.152C13.312 7.28 13.384 7.464 13.384 7.704V17.736L19.36 12.36C19.536 12.216 19.704 12.144 19.864 12.144C20.056 12.144 20.216 12.216 20.344 12.36C20.488 12.488 20.56 12.648 20.56 12.84C20.56 13.08 20.464 13.272 20.272 13.416L15.088 18L20.752 22.848Z" fill="black"/>
                            </svg>
                        </a>
                    </div>
                    <div class="flex-shrink-0 hidden sm:flex items-center">
                        <a href="{{ route('home') }}">

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
                    <a class="shoppingCarButtonOpenModal" href="#">
                        <svg class="fill-current text-gray-900" width="25" height="20" viewBox="0 0 202 185" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M146.686 110C154.183 110 160.78 105.9 164.179 99.7L199.966 34.8C203.664 28.2 198.866 20 191.269 20L43.324 20L33.9275 0L0 8.39138L21.2322 20L57.2188 95.9L43.7239 120.3C36.4266 133.7 46.023 150 61.2174 150L180.468 139.49L181.229 139.55L61.2174 130L72.2133 110H146.686ZM52.8205 40L174.275 40L146.686 90H76.5117L52.8205 40ZM61.2174 160C50.2214 160 41.3247 169 41.3247 180C41.3247 191 50.2214 180 61.2174 180C72.2133 180 81.2099 191 81.2099 180C81.2099 169 72.2133 160 61.2174 160ZM161.18 160C150.184 160 141.288 169 141.288 180C141.288 191 150.184 180 161.18 180C172.176 180 181.173 191 181.173 180C181.173 169 172.176 160 161.18 160Z" />
                        </svg>
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
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-900 focus:outline-none focus:text-gray-800 transition duration-150 ease-in-out">
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

                        <!-- Authentication -->
                        <form method="POST" class="text-center" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Cerrrar sesión') }}
                            </x-jet-responsive-nav-link>
                        </form>

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
            </div>
        </div>
    </div>
</nav>



