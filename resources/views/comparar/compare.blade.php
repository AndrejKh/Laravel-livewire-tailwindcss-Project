@extends('layouts.app')

    @section('title')
       Compara abastos y supermercados de tu ciudad - Kabasto
    @endsection

    @section('header')
        {{-- precargar imagenes --}}
        <link rel="preload" href="{{ asset('home.png') }}" as="image">

        <meta name="robots" content="index,follow"/>

        <!-- Primary Meta Tags -->
        <meta name="title" content="Compara todos los productos de tu carrito de compras en los abastos de tu ciudad - Kabasto.com">
        <meta name="description" content="Selecciona el supermercado que más te guste para realizar tus compras. Diviertete comparando en los diferentes abastos de tu ciudad - Kabasto.com">
        <meta name="keywords" content="compara precios en venezuela">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://kabasto.com/comparar">
        <meta property="og:title" content="Compara todos los productos de tu carrito de compras en los abastos de tu ciudad - Kabasto.com">
        <meta property="og:description" content="Selecciona el supermercado que más te guste para realizar tus compras. Diviertete comparando en los diferentes abastos de tu ciudad - Kabasto.com">
        <meta property="og:image" content="{{ asset('home.png') }}">

        {{-- url canonical --}}
        <link rel="canonical" href="https://kabasto.com/comparar" />
    @endsection

@section('content')

    <div class="flex justify-center">
    <div class="max-w-7xl w-full px-2 pb-10">

        <h1 class="text-gray-900 font-bold text-lg lg:text-2xl mt-3">Comparar abastos y supermercados</h1>
        <h2 class="text-gray-600 mb-4 text-sm lg:text-base">Selecciona el que más se adapte a tí, y compra.</h2>

        <div class="p-3 rounded-md shadow-sm bg-white ">
            <div class="grid grid-cols-5 cursor-pointer getItemsShoppingCar">
                <div class="col-span-4">
                    <div class="text-gray-900 font-semibold text-md md:text-lg py-1 ">
                        <span id="quantityProducts"></span>
                        Productos selecionados
                    </div>
                </div>
                <div class="col-span-1 self-center ml-auto">
                    <div class="flex h-8 w-8 self-center text-center bg-white rounded-full shadow-sm lg:shadow-md items-center cursor-pointer">
                        <svg class="fill-current text-green-400 h-2 mx-auto return_rotate_select_icon svg_icon" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.29866 0.333143L7.50671 4.75228L12.7148 0.333143C13.2383 -0.111048 14.0839 -0.111048 14.6074 0.333143C15.1309 0.777335 15.1309 1.49487 14.6074 1.93907L8.44631 7.16686C7.92282 7.61105 7.07718 7.61105 6.55369 7.16686L0.392617 1.93907C-0.130872 1.49487 -0.130872 0.777335 0.392617 0.333143C0.916107 -0.0996583 1.77517 -0.111048 2.29866 0.333143Z" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Mostrar los productos del carrito --}}
            <div class="col-span-5 grid grid-cols-1 md:grid-cols-2 gap-2" id="containerItemsShoppingCar">
            </div>
            {{-- Card modelo de productos en carrito --}}
            <div class="hidden" id="cardModelItem">
                <div class="rounded-md shadow-md bg-white grid grid-cols-5 gap-2 py-2 my-1" >
                    <span class="col-span-1 self-center">
                        <img class="imgCard" src="" alt="">
                    </span>
                        <div class="col-span-4 text-gray-900 font-semibold text-md lg:text-xl flex flex-col justify-between">

                            <div class="flex">
                                (<span class="quantityCard"></span>)
                                <span class="titleCard"></span>
                            </div>
                            <div class="flex mb-2">
                                <div class="flex bg-gray-50 rounded-full">
                                    <span class="flex-shrink-0 self-center bg-green-400 rounded-full p-1 cursor-pointer substractProduct">
                                        <svg class="fill-current text-white h-5 md:h-7 lg:h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000000"><path d="M8.12 9.29L12 13.17l3.88-3.88c.39-.39 1.02-.39 1.41 0 .39.39.39 1.02 0 1.41l-4.59 4.59c-.39.39-1.02.39-1.41 0L6.7 10.7c-.39-.39-.39-1.02 0-1.41.39-.38 1.03-.39 1.42 0z"/></svg>
                                    </span>
                                    <span class="flex-shrink-0 self-center px-6 md:px-10 lg:px-8 text-semibold text-md quantityCardProduct">0</span>
                                    <span class="flex-shrink-0 self-center bg-green-400 rounded-full p-1 cursor-pointer addProduct">
                                        <svg class="fill-current text-white h-5 md:h-7 lg:h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000000"><path d="M8.12 14.71L12 10.83l3.88 3.88c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L12.7 8.71c-.39-.39-1.02-.39-1.41 0L6.7 13.3c-.39.39-.39 1.02 0 1.41.39.38 1.03.39 1.42 0z"/></svg>
                                    </span>
                                </div>
                            </div>

                            <span hidden class="idProduct"></span>

                        </div>
                </div>
            </div>
        </div>

        {{-- Seleccion de la ubicacion de las tiendas --}}
        <div class="grid grid-cols-2 gap-2 mt-3">
            <select class="col-span-1 rounded-lg shadow-sm bg-white border-0 py-2 text-sm font-semibold cursor-pointer" id="stateUbication">
            @foreach ($states as $state)
                <option value="{{ $state->id }}"> {{ $state->state }} </option>
            @endforeach
            </select>
            <select class="col-span-1 rounded-lg shadow-sm bg-white border-0 py-2 text-sm font-semibold cursor-pointer" id="cityUbication">
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}"> {{ $city->city }} </option>
                @endforeach
            </select>
        </div>

        <h2 class="text-gray-900 font-semibold text-md mt-8 mb-2">Selecciona el supermercado donde compraras</h2>
        {{-- Contenedor de todas las marcas --}}
        <div class="grid grid-cols-1 gap-2" id="containerBrands"></div>
        {{-- Card modelo de Supermercados --}}
        <div class="hidden" id="cardModelBrand">
            <div class="rounded-md shadow-sm bg-white grid grid-cols-12 gap-1 py-2 px-2">
                <div class="col-span-1 self-center text-center">
                    <input class="rounded-full h-5 w-5 inputCheckboxselectBrand" type="checkbox" name="brand">
                </div>
                <span class="col-span-2 text-center self-center">
                   <span class="totalPriceBrand font-bold text-xl text-gray-900"></span>
                   <strong class="text-xs block font-bold">$ USD</strong>
                </span>
                <span class="col-span-7 text-gray-900 text-sm self-center">
                    <div class="cursor-pointer titleBrand font-semibold seePriceItemsBrand"></div>
                    <div>
                        <svg class="inline h-4 w-4" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M10 15.27L16.18 19L14.54 11.97L20 7.24L12.81 6.63L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27Z" fill="#34BA00"/></svg>
                        <svg class="inline h-4 w-4" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M10 15.27L16.18 19L14.54 11.97L20 7.24L12.81 6.63L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27Z" fill="#34BA00"/></svg>
                        <svg class="inline h-4 w-4" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M10 15.27L16.18 19L14.54 11.97L20 7.24L12.81 6.63L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27Z" fill="#34BA00"/></svg>
                        <svg class="inline h-4 w-4" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M20 7.24L12.81 6.62L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27L16.18 19L14.55 11.97L20 7.24ZM10 13.4V4.1L11.71 8.14L16.09 8.52L12.77 11.4L13.77 15.68L10 13.4Z" fill="#34BA00"/></svg>
                        <svg class="inline h-4 w-4" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M20 7.24L12.81 6.62L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27L16.18 19L14.55 11.97L20 7.24ZM10 13.4L6.24 15.67L7.24 11.39L3.92 8.51L8.3 8.13L10 4.1L11.71 8.14L16.09 8.52L12.77 11.4L13.77 15.68L10 13.4Z" fill="#34BA00"/></svg>
                    </div>
                    {{-- <div class="deliveryFree text-green-500">
                        <svg class="mx-auto w-5 h-5 inline" viewBox="0 0 31 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.6585 5.07317C21.0537 5.07317 22.1951 3.93171 22.1951 2.53659C22.1951 1.14146 21.0537 0 19.6585 0C18.2634 0 17.122 1.14146 17.122 2.53659C17.122 3.93171 18.2634 5.07317 19.6585 5.07317ZM6.34146 13.3171C2.79024 13.3171 0 16.1073 0 19.6585C0 23.2098 2.79024 26 6.34146 26C9.89268 26 12.6829 23.2098 12.6829 19.6585C12.6829 16.1073 9.89268 13.3171 6.34146 13.3171ZM6.34146 24.0976C3.93171 24.0976 1.90244 22.0683 1.90244 19.6585C1.90244 17.2488 3.93171 15.2195 6.34146 15.2195C8.75122 15.2195 10.7805 17.2488 10.7805 19.6585C10.7805 22.0683 8.75122 24.0976 6.34146 24.0976ZM13.6976 11.4146L16.7415 8.37073L17.7561 9.38536C19.0878 10.7171 20.6859 11.6429 22.6517 11.9473C23.4127 12.0615 24.0976 11.4527 24.0976 10.679C24.0976 10.0576 23.641 9.53756 23.0195 9.4361C21.6498 9.2078 20.5717 8.53561 19.6585 7.62244L17.2488 5.21268C16.6146 4.69268 15.9805 4.43902 15.2195 4.43902C14.4585 4.43902 14.193 4.36768 13.8125 4.875C13.8125 4.875 11.375 2.4375 10.5625 2.4375C9.75 2.4375 6.5 6.5 7.3125 7.3125C8.125 8.125 9.89268 8.75122 9.89268 8.75122C9.38537 9.25854 9.13171 9.89268 9.13171 10.5268C9.13171 11.2878 9.38537 11.922 9.89268 12.3024L13.9512 15.8537V20.9268C13.9512 21.6244 14.522 22.1951 15.2195 22.1951C15.9171 22.1951 16.4878 21.6244 16.4878 20.9268V15.3463C16.4878 14.6868 16.2341 14.0654 15.7902 13.5961L13.6976 11.4146ZM24.0976 13.3171C20.5463 13.3171 17.7561 16.1073 17.7561 19.6585C17.7561 23.2098 20.5463 26 24.0976 26C27.6488 26 30.439 23.2098 30.439 19.6585C30.439 16.1073 27.6488 13.3171 24.0976 13.3171ZM24.0976 24.0976C21.6878 24.0976 19.6585 22.0683 19.6585 19.6585C19.6585 17.2488 21.6878 15.2195 24.0976 15.2195C26.5073 15.2195 28.5366 17.2488 28.5366 19.6585C28.5366 22.0683 26.5073 24.0976 24.0976 24.0976Z" fill="#42D697"/>
                        </svg>
                        <span class="inline text-sm">
                            Gratis
                        </span>
                    </div> --}}
                </span>
                <div class="col-span-2 self-center">
                    <div class="flex h-8 w-8 self-center text-center bg-gry-100 rounded-full shadow-md items-center cursor-pointer bg-white ml-auto seePriceItemsBrand">
                        <svg class="fill-current text-green-400 h-2 mx-auto return_rotate_select_icon svgIconSelect" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.29866 0.333143L7.50671 4.75228L12.7148 0.333143C13.2383 -0.111048 14.0839 -0.111048 14.6074 0.333143C15.1309 0.777335 15.1309 1.49487 14.6074 1.93907L8.44631 7.16686C7.92282 7.61105 7.07718 7.61105 6.55369 7.16686L0.392617 1.93907C-0.130872 1.49487 -0.130872 0.777335 0.392617 0.333143C0.916107 -0.0996583 1.77517 -0.111048 2.29866 0.333143Z" />
                        </svg>
                    </div>
                </div>
                <div class="col-span-12 grid grid-cols-1 md:grid-cols-2 gap-2 containerItemsBrand"></div>
                <span class="idBrand" hidden></span>
            </div>
        </div>
        {{-- Card modelo para los items de Supermercados --}}
        <div class="hidden" id="cardModelItemsBrand">
            <div class="rounded-md shadow-sm bg-white grid grid-cols-5 gap-2 py-2" >
                <span class="col-span-1 text-center self-center">
                    <img class="imgCardItem" src="" alt="">
                </span>
                <span class="col-span-4 text-gray-900 font-semibold text-sm self-center">
                    <div class="flex flex-col">
                        <span class="lg:text-lg titleItemBrand"></span>
                        <div class="productNotAble text-red-500 mt-1"></div>
                        <div class="mt-1 text-gray-600 text-xs font-light containerPrices">
                            <span class="totalPriceItemBrand font-bold text-lg text-gray-900"></span>
                            <span class="quantityItemBrandUnidad"></span> x
                            <span class="priceItemBrandUnidad"></span> $ ud.
                            <span hidden class="productId"></span>
                        </div>
                    </div>
                </span>
            </div>
        </div>

        {{-- botones --}}
        @role('seller')
            <div class="flex mt-3">
                <div class="text-xl text-red-700 font-semibold">
                    No puedes comprar, debes tener una cuenta normal.
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-2 mt-3">
                <div class="hidden lg:block lg:col-span-2 w-full">
                    <a class="rounded-md shadow-sm py-2 w-full block text-center bg-white text-red-600 border-red-600" href="{{ route('home') }}">
                        Cancelar
                    </a>
                </div>
                <div class="col-span-1 lg:col-span-3 w-full">
                    <button class="rounded-md shadow-sm py-2 w-full block text-center bg-gray-300 text-white" id="finalizarCompra" aria-label="finalizar la comprar">
                        Finalizar compra
                    </button>
                </div>
                <div class="col-span-1 lg:hidden w-full">
                    <a class="rounded-md shadow-sm py-2 w-full block text-center bg-white text-red-600 border-red-600" href="{{ route('home') }}">
                        Cancelar
                    </a>
                </div>
            </div>
            <span class="text-sm text-gray-600 mt-2">*Debes seleccionar un supermercado para poder continuar con tu compra</span>
        @endrole
        </div>
    </div>

    {{-- Script al momento de cargar la pagina --}}
    <script>
        // Para cargar los productos
        window.onload = function() {
            /********************
            Muestro la cantidad de productos que se tienen en el carrito
            **********************/
            const quantityProducts = document.getElementById('quantityProducts');
            // Obtengo los productos del local storage
            ProductsLocalStorage = localStorage.getItem('productsShoppingCar');

            if (ProductsLocalStorage !== null) {

                arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

                let quantity = 0;

                // Recorro el carrito para obtener la cantidad total de productos en el
                arrayProductsLocalStorage.forEach(product => {
                    quantity += product.quantity;
                });

                // Asigno la cantidad total de productos en el carrito
                quantityProducts.textContent = quantity;

            }

            getBrands();

            // Obtengo la marca del Local Storage
            const brandSelectedToBuy = localStorage.getItem('brandSelectedToBuy');
            if( brandSelectedToBuy !== null ){
                // habilito el boton de finalizar compra
                document.getElementById('finalizarCompra').classList.replace("bg-gray-300", "bg-green-500");
            }
        }
    </script>

    {{-- Script para mostrar en el DOM los productos del carrito --}}
    <script>
        // Obtengo los productos del carrito y los muestro en pantalla
        const getItemsShoppingCar = document.querySelectorAll('.getItemsShoppingCar');
        getItemsShoppingCar.forEach(item => {
            item.addEventListener('click', event => {

                if( item.contains(event.target) ){
                    var svgIconSelect = item.querySelector('.svg_icon');
                }
                // Obtengo los productos del local storage
                ProductsLocalStorage = localStorage.getItem('productsShoppingCar');

                const containerItemsShoppingCar = document.getElementById('containerItemsShoppingCar');
                if( containerItemsShoppingCar.childElementCount > 0 ){
                    containerItemsShoppingCar.innerHTML = '';
                    // Girar icono de select
                    svgIconSelect.classList.replace("rotate_select_icon", "return_rotate_select_icon");
                }else{
                    // Girar icono de select
                    svgIconSelect.classList.replace("return_rotate_select_icon", "rotate_select_icon");
                    // Obtengo el componente card de ejemplo
                    const modelItem = document.getElementById('cardModelItem');

                    arrayProductsLocalStorage.forEach(product => {
                        // creo un clon del card de ejemplo
                        newCardProductShoppingCar = modelItem.firstElementChild.cloneNode(true);
                        // Obtengo los campos del card  clonado
                        let newTitle = newCardProductShoppingCar.querySelector('.titleCard');
                        let quantityTitle = newCardProductShoppingCar.querySelector('.quantityCard');
                        let newImage = newCardProductShoppingCar.querySelector('.imgCard');
                        let newIdProduct = newCardProductShoppingCar.querySelector('.idProduct');
                        let quantityCardProduct = newCardProductShoppingCar.querySelector('.quantityCardProduct');
                        // Asigno los valores del local storage a los campos html
                        newTitle.textContent = product.title;
                        quantityTitle.textContent = product.quantity;
                        newImage.src = product.image;
                        quantityCardProduct.textContent = product.quantity;
                        newIdProduct.textContent = product.id;
                        // Inserto el card en el modal
                        containerItemsShoppingCar.appendChild(newCardProductShoppingCar);

                        // Ahora agrego los eventos para incrementar o reducir la cantidad
                        // Se reduce la cantidad
                        const substractProduct = newCardProductShoppingCar.querySelector('.substractProduct');
                        substractProduct.addEventListener('click', event => {

                            setProductsFromCompareView( product, event, 'substract');

                        }, {passive: true});

                        // Se incrementa la cantidad
                        const addProduct = newCardProductShoppingCar.querySelector('.addProduct');
                        addProduct.addEventListener('click', event => {

                            setProductsFromCompareView( product, event, 'add');

                        }, {passive: true});

                    });

                }

            }, {passive: true});
        });

        // Funcion que incrementar o reducir la cantidad de los productos
        function setProductsFromCompareView( product, event, typeSet ){
            // Obtengo los productos del local storage
            ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
            arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

            // En que elemento se dio click? en el spna, en el svg o en el path?
            if ( event.target.nodeName == 'SPAN' ){
                var rootContainer = event.target.parentNode.parentNode.parentNode.parentNode;
            }else if( event.target.nodeName == 'svg' ){
                var rootContainer = event.target.parentNode.parentNode.parentNode.parentNode.parentNode;
            }else {
                var rootContainer = event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
            }

            const idProduct = rootContainer.querySelector('.idProduct').textContent;
            let quantityProductCard = rootContainer.querySelector('.quantityCardProduct');

            let quantity = parseInt( quantityProductCard.textContent.trim() );

            if( ( quantity > 0 && typeSet == 'substract' ) || typeSet == 'add'){

                arrayProductsLocalStorage.forEach(product => {
                    if (idProduct == product.id ){
                        if( typeSet == 'add' ){
                            product.quantity = ++quantity;
                        }else{
                            product.quantity = --quantity;
                        }
                    }
                });

                // Agrego las cantidades al DOM
                let quantityTotalProducts = document.getElementById('quantityProducts');
                let quantityProducts = parseInt( quantityTotalProducts.textContent.trim() );
                if( typeSet == 'add' ){
                    quantityTotalProducts.textContent = ++quantityProducts;
                }else{
                    quantityTotalProducts.textContent = --quantityProducts;
                }

                let quantityTitle = rootContainer.querySelector('.quantityCard');
                quantityTitle.textContent = quantity;
                quantityProductCard.textContent = quantity;

                // Almaceno el producot en el localStorage
                localStorage.setItem('productsShoppingCar',JSON.stringify(arrayProductsLocalStorage));

                // Cargo de nuevo todas las tiendas
                getBrands();
            }

        }
    </script>

    {{-- Script para obtener las tiendas dependiendo del estado y ciudad --}}
    <script>
        const stateUbication = document.getElementById('stateUbication');
        const cityUbication = document.getElementById('cityUbication');

        // Al cambiar el select de estados
        stateUbication.addEventListener('change', event => {
            let state_id = event.target.value;
            let state = event.target.selectedOptions.item(0).textContent.trim();
            // Obtengo loa ubicacion del local storage
            ubicationLocalStorage = localStorage.getItem('ubication');

            const ubication = JSON.parse(ubicationLocalStorage);

            newUbicationLocalStorage = {
                state_id: state_id,
                state: state,
                city_id: '',
                city: ''
            };

            // Almaceno la ubicacion en el localStorage
            localStorage.setItem('ubication',JSON.stringify(newUbicationLocalStorage));

            // vacio el select de ciudades
            cityUbication.innerHTML = ''
            let option = document.createElement("option");
            cityUbication.add(option);

            // Obtengo las ciudades del estado actual
            axios.get('/get/cities-state/'+state_id).then( function(response){

                let cities = response.data;
                cities.forEach(city => {
                    let option = document.createElement("option");
                    option.text = city.city;
                    option.value = city.id;
                    cityUbication.add(option);
                });

            });

            /********************
             Ahora busco los supermercados con el id del estado, y agrego los resultados en el DOM. via api
             **********************/
             setBrandsByLocation(state_id, 'state')

        }, {passive: true})

        // Al cambiar el select de ciudades
        cityUbication.addEventListener('change', event => {
            let city_id = event.target.value;
            let city = event.target.selectedOptions.item(0).textContent.trim();

            let state_id = stateUbication.value;
            let state = stateUbication.selectedOptions.item(0).textContent.trim();
            // // Obtengo loa ubicacion del local storage
            ubicationLocalStorage = localStorage.getItem('ubication');

            const ubication = JSON.parse(ubicationLocalStorage);

            newUbicationLocalStorage = {
                state_id: state_id,
                state: state,
                city_id: city_id,
                city: city
            };

            // Almaceno el producot en el localStorage
            localStorage.setItem('ubication',JSON.stringify(newUbicationLocalStorage));

            /********************
             Ahora busco los supermercados con el id del estado, y agrego los resultados en el DOM. via api
             **********************/
             setBrandsByLocation(city_id, 'city')

        }, {passive: true})
    </script>

    <script>

        // Funcion para carga de tiendas, carga inicial de todas las tiendas
        function getBrands(){
            /********************
            Inicializo el estado y ciudad, tomados del local Storage
            **********************/
            // Obtengo los select de estado y ciudad
            const stateUbication = document.getElementById('stateUbication');
            const cityUbication = document.getElementById('cityUbication');
            let option = document.createElement("option");
            cityUbication.add(option);
            cityUbication.innerHTML = ''

            // Obtengo loa ubicacion del local storage
            ubicationLocalStorage = localStorage.getItem('ubication');

            const ubication = JSON.parse(ubicationLocalStorage);

            state_id = ubication.state_id;
            city_id = ubication.city_id;

            if(ubication !== null){
                // REcorro los options del seclect estados y activo el que esta en localstorage
                for (var i = 0; i < stateUbication.length; i++) {
                    if ( stateUbication[i].value == state_id){
                        stateUbication[i].selected = 'true';
                    }
                }

                // Obtengo las ciudades del estado actual
                axios.get('/get/cities-state/'+state_id).then( function(response){

                    let cities = response.data;
                    cities.forEach(city => {
                        let option = document.createElement("option");
                        option.text = city.city;
                        option.value = city.id;
                        cityUbication.add(option);
                    });

                    // Ahora 'activo' a la ciudad que esta en el local storage
                    let cityUbicationNew = document.getElementById('cityUbication');

                    for (var i = 0; i < cityUbicationNew.length; i++) {
                        if ( cityUbicationNew[i].value == city_id){
                            cityUbicationNew[i].selected = 'true';
                        }
                    }
                });

            }

            /********************
            Ahora cargo los supermercados e items de cada supermercado
            **********************/
            setBrandsByLocation(state_id, 'state')
        }

        // Funcion que busca e imprime en el DOM, los supermercados, buscados por el id de una ciudad o estado, via api
        function setBrandsByLocation(ubication_id, ubication){
            if( ubication == "state"){
                var urlAjax = '/get/brand-state/'+ubication_id;
            }else{
                var urlAjax = '/get/brand-city/'+ubication_id;
            }


            // Obtengo los productos del local storage
            const ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
            const brandSelectedToBuy = localStorage.getItem('brandSelectedToBuy');

            // Obtengo el array de los id de los productos del carrito de compras
            if (ProductsLocalStorage !== null) {
                // Paso a formato JSON el string que obtuve del local Storage
                const arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);
                // Creo un array de los id de los productos, esto para enviar a la api
                const array_products_id_shoppping_car = [];
                arrayProductsLocalStorage.forEach(product => {
                    array_products_id_shoppping_car.push( product.id );
                });
                // El contendor de los supermercados
                const containerBrands = document.getElementById('containerBrands');
                // Obtengo el componente card de ejemplo de cada supermercado
                const modelCardBrand = document.getElementById('cardModelBrand');

                // Obtengo las marcas del estado, via api
                axios.get(urlAjax).then( function(response){
                    // verifico que no haya tiendas en el DOM, para el primer valor
                    // Luego vacio el contendor de los supermercados
                    document.getElementById('containerBrands').innerHTML = '';
                    let brands = response.data;
                    // Hay supermercados haciendo delivery en este estado?
                    if (brands.length > 0) {

                        brands.forEach(brand => {
                            let brand_id = brand.id;
                            // creo un clon del card de ejemplo
                            newCardBrand = modelCardBrand.firstElementChild.cloneNode(true);

                            let title = newCardBrand.querySelector('.titleBrand');
                            let totalPriceElement = newCardBrand.querySelector('.totalPriceBrand');
                            let id_brand = newCardBrand.querySelector('.idBrand');

                            // Asigno los valores del local storage a los campos html
                            id_brand.textContent = brand_id;
                            title.textContent = brand.brand;

                            if( brandSelectedToBuy !== null ){
                                // verifico si la marca del localstorage es la misma que voy a agregar al DOM, de ser asi debo seleccionarla
                                const brandInLocalStorage = JSON.parse(brandSelectedToBuy);
                                const brandIdLocalStorage = brandInLocalStorage.id;
                                if( brandIdLocalStorage == brand_id ){
                                    newCardBrand.classList.replace('bg-white', 'bg-green-200');
                                    newCardBrand.querySelector('.inputCheckboxselectBrand').checked = true;
                                }
                            }

                            setBrandInDOM(containerBrands, newCardBrand, brand_id, totalPriceElement, array_products_id_shoppping_car, arrayProductsLocalStorage);

                        });


                    // NO Hay supermercados haciendo delivery en este estado
                    }else{
                        noBradsInThisLocation(containerBrands);
                    }

                });
            }
        }


        function setBrandInLocalStorage(brand_id){
            // Obtengo la marca del local storage
            brandSelectedToBuy = localStorage.getItem('brandSelectedToBuy');

            const siteUrl = document.getElementById('siteUrl').textContent.trim();

            axios.get('/get/brand/'+brand_id).then( function(respuesta){
                let brand = respuesta.data;

                var newBrandSelectedToBuy = {
                    id: brand_id,
                    title: brand.brand,
                    image: `url('storage/${brand.profile_photo_path_brand}')`,
                    address: brand.brand,
                    href: `${siteUrl}/supermercado/${brand.slug}`
                }

                localStorage.setItem('brandSelectedToBuy',JSON.stringify(newBrandSelectedToBuy));
            });

            setPricesInLocalStorage(brand_id);

        }

        // Setear el monto total en el LocalStorage
        function setAmountInLocalStorage(amount){

            let amountTotal = {
                amount: amount
            };

            // Almaceno el preico total en el local storage
            localStorage.setItem('amount',JSON.stringify(amountTotal));
        }

        // Colocar los precios da cada producto de la marca
        function setBrandInDOM(containerBrands, newCardBrand, brand_id, totalPriceElement, array_products_id_shoppping_car, arrayProductsLocalStorage){

            var precioTotal = 0;
            // Creo el card para el supermercado en el html
            axios.get('/get/items-price/'+brand_id+'/'+array_products_id_shoppping_car).then( function(respuesta){
                let items = respuesta.data;

                items.forEach(item => {

                    arrayProductsLocalStorage.forEach(productShoppingCar => {

                        if( productShoppingCar.id == item.product_id ){
                            precioTotal += productShoppingCar.quantity*item.price
                            return
                        }

                    });

                });

                // Asigno el precio total del supermercado
                totalPriceElement.textContent = precioTotal.toFixed(2);

                // si el monto total es mayor que cero, muestro la marca
                if( precioTotal > 0 ){
                    // antes de agregar la nueva marca, veo si ya esta en el DOM, en caso de SI, reemplazarla
                    const brandsInDOM = containerBrands.childNodes;

                    if( brandsInDOM.length > 0 ){

                        let brandInDOM = false;

                        brandsInDOM.forEach(element => {
                            let brandIdInDOM = element.querySelector('.idBrand');

                            if( brand_id == brandIdInDOM.textContent ){
                                brandInDOM = true;
                                // reemplazo el elemento
                                containerBrands.replaceChild( newCardBrand , element );
                            }

                        });

                        if( !brandInDOM ){
                            containerBrands.appendChild(newCardBrand);
                        }

                    }else{
                        containerBrands.appendChild(newCardBrand);
                    }

                    // Obtengo el componente card de ejemplo para los items de cada supermercado
                    const cardModelItemsBrand = document.getElementById('cardModelItemsBrand');

                    // Agrego un listener para buscar los precios de los productos
                    let seePriceItemsBrand = newCardBrand.querySelectorAll('.seePriceItemsBrand');
                    // Al darle click para ver los productos de la marca
                    seePriceItemsBrand.forEach(item => {
                        item.addEventListener('click', event => {

                            // En que elemento se dio click? en el span, en el svg o en el path? obtengo el nodo principal
                            if ( event.target.nodeName == 'DIV' ){
                                var rootContainer = event.target.parentNode.parentNode;
                            }else if( event.target.nodeName == 'svg' ){
                                var rootContainer = event.target.parentNode.parentNode.parentNode;
                            }else if( event.target.nodeName == 'SPAN'){
                                var rootContainer = event.target.parentNode;
                            }else {
                                var rootContainer = event.target.parentNode.parentNode.parentNode.parentNode;
                            }

                            let brand_id = rootContainer.lastElementChild.textContent;
                            let brand = rootContainer.querySelector('.titleBrand').textContent;
                            // // Obtengo el contenedor donde iran los items de cada supermercado
                            let containerItemsBrand = rootContainer.querySelector('.containerItemsBrand');
                            let svgIconSelect = rootContainer.querySelector('.svgIconSelect');

                            if( containerItemsBrand.childElementCount > 0 ){
                                containerItemsBrand.innerHTML = '';
                                // Girar icono de select
                                svgIconSelect.classList.replace("rotate_select_icon", "return_rotate_select_icon");
                            }else{
                                // Girar icono de select
                                svgIconSelect.classList.replace("return_rotate_select_icon", "rotate_select_icon");

                                axios.get('/get/items-brand/'+brand_id+'/'+array_products_id_shoppping_car).then( function(respuesta){
                                    let items = respuesta.data;

                                    arrayProductsLocalStorage.forEach(productShoppingCar => {

                                        // creo un clon del card de ejemplo
                                        newCardItemsBrand = cardModelItemsBrand.firstElementChild.cloneNode(true);
                                        let productIdItem = newCardItemsBrand.querySelector('.productId');
                                        let titleItem = newCardItemsBrand.querySelector('.titleItemBrand');
                                        let imgCardItem = newCardItemsBrand.querySelector('.imgCardItem');
                                        let priceItem = newCardItemsBrand.querySelector('.priceItemBrandUnidad');
                                        let quantityItem = newCardItemsBrand.querySelector('.quantityItemBrandUnidad');
                                        let totalPriceItemBrand = newCardItemsBrand.querySelector('.totalPriceItemBrand');
                                        let quantityShoppingCar = productShoppingCar.quantity;
                                        // Asigno los valores del local storage a los campos html

                                        titleItem.textContent = `(${ quantityShoppingCar }) ${ productShoppingCar.title }`;
                                        imgCardItem.src = productShoppingCar.image;

                                        let itemInShoppingCar = false;

                                        items.forEach(item => {

                                            if ( productShoppingCar.id == item.product_id) {
                                                productIdItem.textContent = item.product_id;
                                                quantityItem.textContent = quantityShoppingCar;
                                                priceItem.textContent = `${ item.price.toFixed(2) }`;
                                                totalPriceItemBrand.textContent = `${ (item.price*quantityShoppingCar).toFixed(2) }$`;
                                                itemInShoppingCar = true;
                                                return
                                            }

                                        });
                                        if (!itemInShoppingCar) {
                                            let containerPrices = newCardItemsBrand.querySelector('.containerPrices').style.display = 'none';
                                            let productNotAble = newCardItemsBrand.querySelector('.productNotAble');
                                            productNotAble.textContent = `Producto no disponible`
                                        }

                                        // Agrego el card del item
                                        containerItemsBrand.appendChild(newCardItemsBrand);
                                    });
                                    // Agrego el boton para seleccionar el supermercado
                                    let buttonSelectBrand = document.createElement("div");
                                    buttonSelectBrand.textContent = 'Seleccionar supermercado';
                                    buttonSelectBrand.classList.add("btn-primary-sm", "col-span-1", "md:col-span-2");
                                    // Agrego el card del item
                                    containerItemsBrand.appendChild(buttonSelectBrand);


                                    // Agrego un listener de click al boton de seleccionar supermercado
                                    buttonSelectBrand.addEventListener('click', buttonSelect => {

                                        // activo o descativo el input checbox
                                        let inputCheckboxselectBrand = containerItemsBrand.parentNode.querySelector('.inputCheckboxselectBrand');

                                        // cambio el color de los cards de todas las tiendas
                                        let brandsTest = containerBrands.children;
                                        for (let item of brandsTest) {
                                            item.classList.replace("bg-green-200", "bg-white");
                                            item.querySelector('.inputCheckboxselectBrand').checked = false;
                                        }

                                        let buttonComprar = document.getElementById('finalizarCompra');
                                        // Obtengo la marca del local storage
                                        brandSelectedToBuy = localStorage.getItem('brandSelectedToBuy');
                                        if( brandSelectedToBuy !== null ){
                                            brandInLocalStorage = JSON.parse(brandSelectedToBuy);
                                            // verifico si ya se habia seleccionado otro supermercado
                                            if(brand_id == brandInLocalStorage.id ){
                                                rootContainer.classList.replace("bg-green-200", "bg-white");
                                                // elimino la marca del localstorage
                                                localStorage.removeItem('brandSelectedToBuy');
                                                // deshabilito el boton de comprar
                                                buttonComprar.classList.replace("bg-green-500", "bg-gray-300");
                                                inputCheckboxselectBrand.checked = false;
                                            }else{
                                                rootContainer.classList.replace("bg-white", "bg-green-200");
                                                buttonComprar.classList.replace("bg-gray-300", "bg-green-500");
                                                // Seteo el supermercado en el local storage
                                                setBrandInLocalStorage(brand_id);

                                                inputCheckboxselectBrand.checked = true;
                                            }

                                        }else{
                                            rootContainer.classList.replace("bg-white", "bg-green-200");
                                            buttonComprar.classList.replace("bg-gray-300", "bg-green-500");
                                            // Seteo el supermercado en el local storage
                                            setBrandInLocalStorage(brand_id);

                                            inputCheckboxselectBrand.checked = true;
                                        }

                                        // busco el precio total de la marca
                                        let amount = containerItemsBrand.parentNode.querySelector('.totalPriceBrand').textContent;
                                        // seteo el monto total en el local storage
                                        setAmountInLocalStorage(amount);

                                    }, {passive: true})
                                });
                            }
                        }, {passive: true});
                    });

                }


                // Agrego el evento clck a los input checkbox de seleccionar marca
                const inputCheckboxselectBrand = newCardBrand.querySelectorAll('.inputCheckboxselectBrand')
                inputCheckboxselectBrand.forEach(item => {
                    item.addEventListener('click', event => {

                        if( event.target.checked == true ){
                            // desactivo todas las demas marcas
                            let brandsTest = containerBrands.children;
                            for (let item of brandsTest) {
                                item.classList.replace("bg-green-200", "bg-white");
                                item.querySelector('.inputCheckboxselectBrand').checked = false;
                            }
                            event.target.checked = true;

                            newCardBrand.classList.replace('bg-white', 'bg-green-200');
                            let brand_id = newCardBrand.querySelector('.idBrand').textContent;
                            let siteUrl = document.getElementById('siteUrl').textContent.trim();
                            // obtengo la marca
                            axios.get('/get/brand/'+brand_id).then( function(respuesta){
                                let brand = respuesta.data;
                                let titleBrand = brand.brand;
                                let imageBrand = brand.profile_photo_path_brand;
                                let slugBrand = brand.slug;
                                let addressBrand = 'state, city';
                                // guardo esta marca en el localstorage
                                newBrand = {
                                    id: brand_id,
                                    title: titleBrand,
                                    image: `url('${imageBrand}')`,
                                    address: addressBrand,
                                    href: `${siteUrl}/supermercado/${slugBrand}`
                                }
                                localStorage.setItem('brandSelectedToBuy',JSON.stringify(newBrand));

                            })
                            // actualizo el precio de los productos en el local storage
                            setPricesInLocalStorage(brand_id);

                            // busco el precio total de la marca
                            let amount = newCardBrand.querySelector('.totalPriceBrand').textContent;
                            // seteo el monto total en el local storage
                            setAmountInLocalStorage(amount);

                            // activo el boton de comprar
                            document.getElementById('finalizarCompra').classList.replace("bg-gray-300", "bg-green-500");

                        }else{
                            newCardBrand.classList.replace('bg-green-200', 'bg-white');
                            // elimino esta marca en el localstorage
                            localStorage.removeItem('brandSelectedToBuy');
                            // desactivo el boton de comprar
                            document.getElementById('finalizarCompra').classList.replace("bg-green-500", "bg-gray-300");
                        }
                    }, {passive: true})
                })

            });


        }

        // Funcion q actualiza el precio de cada producto dependiendo de la marca elegida
        function setPricesInLocalStorage(brand_id){

            const ProductsLocalStorage = localStorage.getItem('productsShoppingCar');

            // Obtengo el array de los id de los productos del carrito de compras
            if (ProductsLocalStorage !== null) {
                // Paso a formato JSON el string que obtuve del local Storage
                const arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);
                // Creo un array de los id de los productos, esto para enviar a la api
                const array_products_id_shoppping_car = [];
                arrayProductsLocalStorage.forEach(product => {
                    array_products_id_shoppping_car.push( product.id );
                });

                arrayProductsLocalStorage.forEach(product => {
                    const product_id = product.id;

                    axios.get('/get/items-price/'+brand_id+'/'+array_products_id_shoppping_car).then( function(respuesta){
                        let items = respuesta.data;

                        items.forEach(item => {

                            arrayProductsLocalStorage.forEach(productShoppingCar => {

                                if( productShoppingCar.id == item.product_id ){
                                    // actualizo el valor del local storage
                                    productShoppingCar.price = item.price;

                                }

                            });

                        });

                        localStorage.setItem('productsShoppingCar',JSON.stringify(arrayProductsLocalStorage));

                    });

                });
            }

        }

        function noBradsInThisLocation(containerBrands){
            let spanNoBrands = document.createElement("span");
            spanNoBrands.textContent = 'No se encontraron supermercados en este lugar.';
            spanNoBrands.classList.add("text-gray-600","font-light","px-2","py-4", "border-b-2", "border-gray-600","bg-red-50","text-sm");
            containerBrands.appendChild(spanNoBrands);
        }

    </script>

    {{-- Script para finalizar la compra --}}
    <script>
        // Finalizar compra, al dar click en el boton comprar
        const finalizarCompra = document.getElementById('finalizarCompra');
        finalizarCompra.addEventListener('click', event => {

            // Hay una tienda seleccionada --- en caso de si, se esta agregando los productos de esta tienda
            const brandSelectedToBuy = localStorage.getItem('brandSelectedToBuy');
            const brand = JSON.parse(brandSelectedToBuy);

            if (brandSelectedToBuy !== null && finalizarCompra.classList.contains('bg-green-500')) {

                // Obtengo los productos del local storage
                const ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
                const products = JSON.parse(ProductsLocalStorage);
                const amountSelected = localStorage.getItem('amount');
                const amount = JSON.parse(amountSelected);

                const csrf_token = document.getElementById('csrf_token').textContent;

                const data = {
                    products: products,
                    brand: brand,
                    amount: amount,
                }


                axios({
                    method  : 'POST',
                    url     : '/post/create-order',
                    data    : data,
                    headers : {
                        'content-type': 'application/json',
                        'X-CSRF-Token': csrf_token
                        }
                })
                .then((res)=>{
                    if(res.data === 0){
                        // El usuario no esta logeado, lo redirijo a la vista de login
                        window.location.href = "/login?r=1";
                    }else{
                        // elimino los datos del local storage
                        localStorage.removeItem('amount');
                        localStorage.removeItem('brandSelectedToBuy');
                        localStorage.removeItem('productsShoppingCar');
                        // redirecciono a la vista compras
                        window.location.href = "/cms/compras";
                    }

                })
                .catch((err) => {console.log(err)});

            }

        }, {passive: true})
    </script>

@endsection



