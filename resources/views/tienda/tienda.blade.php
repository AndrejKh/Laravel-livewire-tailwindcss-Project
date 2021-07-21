@extends('layouts.app')

    @section('title')
        {{ $tienda->brand }} - Kabasto
    @endsection

    @section('header')
        {{-- precargar imagenes --}}
        <link rel="preload" href="https://kabasto.com/storage/{{ $tienda->profile_photo_path_brand }}" as="image">
        {{-- url canonical --}}
        <link rel="canonical" href="https://kabasto.com/supermercado/{{ $tienda->slug }}" />
        <meta name="robots" content="index,follow"/>

        <!-- Primary Meta Tags -->
        <meta name="title" content="Todos los productos de {{ $tienda->brand }} - Kabasto.com">
        <meta name="description" content="Haz tus compras en {{ $tienda->brand }} y recomiendalo a tu familia y amigos - Kabasto.com">
        <meta name="keywords" content="precio de productos de {{ $tienda->brand }} en venezuela">

        <!-- MAacado Schema.org para Google+ -->
        <meta itemprop="name" content="Todos los productos de {{ $tienda->brand }} - Kabasto.com">
        <meta itemprop="description" content="Haz tus compras en {{ $tienda->brand }} y recomiendalo a tu familia y amigos - Kabasto.com">
        <meta itemprop="image" content="{{ asset( 'home.png' ) }}">

        <!-- Open Graph para Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:title" content="Todos los productos de {{ $tienda->brand }} - Kabasto.com"/>
        <meta property="og:url" content="https://kabasto.com/supermercado/{{ $tienda->slug }}" />
        <meta property="og:image" content="{{ asset( 'home.png' ) }}" />
        <meta property="og:description" content="Haz tus compras en {{ $tienda->brand }} y recomiendalo a tu familia y amigos - Kabasto.com" />
        <meta property="og:site_name" content="Kabasto" />

        <!-- Twitter Card -->
        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@kabasto_ve">
        <meta name="twitter:title" content="Todos los productos de {{ $tienda->brand }} - Kabasto.com">
        <meta name="twitter:description" content="Haz tus compras en {{ $tienda->brand }} y recomiendalo a tu familia y amigos - Kabasto.com">
        <meta name="twitter:image:src" content="{{ asset( 'home.png' ) }}">
        <meta name="twitter:creator" content="@kabasto_ve">

        <!-- Styles Carousel Lybrary -->
        <link rel="stylesheet" href="{{ asset('vendor/carouseljs/owl.carousel.min.css') }}">
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}" ></script>
        <script src="{{ asset('vendor/carouseljs/owl.carousel.min.js') }}" ></script>
    @endsection

@section('content')
    <span hidden id="brandIdCurrent">{{ $tienda->id }}</span>

    @include('tienda.card_tienda')

    @include('tienda.carousel_banners_tienda')

    @include('tienda.carousel_cards_deliveries')


    @if ( count($items) > 0 )

        <div class="flex justify-center mt-3">
            <div class="max-w-7xl w-full">
                <h2 class="font-bold text-xl text-gray-900 px-2 md:px-0">
                    ({{count($items)}}) Productos Disponibles
                </h2>
            </div>
        </div>

        <div class="flex justify-center mt-3">
            <div class="max-w-7xl w-full px-2">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3">
                    @foreach ($items as $item)

                        <div>
                            @include('tienda.card_item_seller_product_detail')
                        </div>

                    @endforeach
                </div>
                <div class="flex justify-center my-4" id="pagination_nav">
                    {!! $items->links() !!}
                </div>
            </div>
        </div>

        {{-- Al cargar la pagina --}}
        <script>
            $(window).on('load', function () {
                // Actualizo las cantidades de los productos en el DOM al cargar la pagina

                // Confirmo que estoy en la vista de la tienda que he elegido, y donde estoy comprando
                // Obtengo la tienda del local storage
                const brandSelectedToBuy = localStorage.getItem('brandSelectedToBuy');

                if(brandSelectedToBuy !== null){
                    brandSelected = JSON.parse(brandSelectedToBuy);
                    const brandIdCurrent = document.getElementById('brandIdCurrent').textContent;

                    if( brandSelected.id == brandIdCurrent ){

                        // Obtengo los productos del local storage
                        ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
                        // Transformo el string a array
                        arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

                        let idProductInLocalStorage = new Array();
                        let quantityProductInLocalStorage = new Array();

                        arrayProductsLocalStorage.forEach(product => {
                            idProductInLocalStorage.push(product.id);
                            quantityProductInLocalStorage.push(product.quantity);
                        })

                        // obtngo todos los cards de productos del DOm
                        const productsId = document.querySelectorAll('.idProductBrand');
                        // Recorro todos los cards del DOM
                        productsId.forEach(product => {

                            product_id = product.textContent;

                            // Verifico si el producto esta agregado al carrito de compras
                            if( idProductInLocalStorage.includes( product_id ) ){
                                key = idProductInLocalStorage.indexOf(product_id);

                                // En caso de si, actualizo la cantidad en el DOM
                                product.parentElement.querySelector('.quantityProductDetail').textContent = quantityProductInLocalStorage[key]
                            }
                        });

                    }
                }

            });
        </script>

        <script>
            /* Agregar Productos al carrito desde la vista de detalles del producto */

            // Boton para agregar elementos al local Storage
            const addProduct = document.querySelectorAll('.addProduct');
            const subtractProduct = document.querySelectorAll('.subtractProduct');
            // const idBrandCurrent = document.getElementById('idBrandCurrent');

            if ( addProduct !== null ) {
                // Agregar producto
                addProduct.forEach(item => {

                    item.addEventListener('click', function(event){
                        // Actualizo la tienda en el local Storage
                        setBrandInLocalStorage();

                        let tagName = event.target.tagName;
                        if( tagName == 'SPAN' ){
                            var rootCardProduct = event.target.parentElement.parentElement.parentElement;
                        }else if( tagName == 'svg' ){
                            var rootCardProduct = event.target.parentElement.parentElement.parentElement.parentElement;
                        }else{
                            var rootCardProduct = event.target.parentElement.parentElement.parentElement.parentElement.parentElement;
                        }

                        // Obtengo los productos del local storage
                        ProductsLocalStorage = localStorage.getItem('productsShoppingCar');

                        // Tomo los valores del producto para agregarlo al carrito
                        const quantityProductElement = rootCardProduct.querySelector('.quantityProductDetail');
                        let quantity = parseInt(quantityProductElement.textContent);
                        const idProduct = rootCardProduct.querySelector('.idProductBrand').textContent;
                        const titleProduct = rootCardProduct.querySelector('.titleProductBrand').textContent;
                        const srcImageProduct = rootCardProduct.querySelector('.srcImageProductBrand').src;
                        const priceItem = rootCardProduct.querySelector('.priceItem').textContent;
                        const quantityAvailable = parseInt(rootCardProduct.querySelector('.quantityAvailable').textContent);

                        // El carrito tiene productos?
                        if( ProductsLocalStorage === null ){
                            quantity++;
                            quantityProductElement.textContent = quantity;

                            let newProduct = {
                                id: idProduct,
                                title: titleProduct.trim(),
                                quantity: quantity,
                                price: priceItem,
                                image: srcImageProduct
                            }

                            let ProductsLocalStorage = '['+JSON.stringify(newProduct)+']';

                            // Muestro el span que indica que hay producots en el carrito
                            updateTotalProductsShoppingCar(JSON.parse(ProductsLocalStorage));
                            shownHideCompareFloatButton(JSON.parse(ProductsLocalStorage));
                            // Almaceno el producot en el localStorage
                            localStorage.setItem('productsShoppingCar',ProductsLocalStorage);

                        // El carrito tiene productos
                        }else{
                            arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

                            let productInShppingCar = false;
                            // Recorro el array de prodcutos a ver si el producto ya se encuentra en el carrito
                            arrayProductsLocalStorage.forEach(product => {
                                if (idProduct == product.id ){
                                    productInShppingCar = true;
                                    quantity++;
                                    product.quantity = quantity;
                                }
                            });

                            // El producto estaba en el carrito de compras?
                            if( quantityAvailable >= quantity ){
                                quantityProductElement.textContent = quantity;
                                if (productInShppingCar){

                                    // Muestro el span que indica que hay producots en el carrito
                                    updateTotalProductsShoppingCar(arrayProductsLocalStorage);
                                    shownHideCompareFloatButton(arrayProductsLocalStorage);
                                    // Almaceno en local storage
                                    localStorage.setItem('productsShoppingCar', JSON.stringify(arrayProductsLocalStorage));

                                    // El producto no estaba en el carrito de compras, es nuevo!
                                }else{

                                    quantity++;
                                    quantityProductElement.textContent = quantity;

                                    let newProduct = {
                                        id: idProduct,
                                        title: titleProduct.trim(),
                                        quantity: quantity,
                                        price: priceItem,
                                        image: srcImageProduct
                                    }

                                    arrayProductsLocalStorage.push(newProduct);
                                    // Muestro el span que indica que hay producots en el carrito
                                    updateTotalProductsShoppingCar(arrayProductsLocalStorage);
                                    shownHideCompareFloatButton(arrayProductsLocalStorage);
                                    // Almaceno el producot en el localStorage
                                    localStorage.setItem('productsShoppingCar',JSON.stringify(arrayProductsLocalStorage));

                                }
                            }

                        }

                    }, {passive: true});

                });
            }

            if (subtractProduct !== null ){
                // Substraer producto
                subtractProduct.forEach(item => {
                    item.addEventListener('click', function(event){

                        let tagName = event.target.tagName;
                        if( tagName == 'SPAN' ){
                            var rootCardProduct = event.target.parentElement.parentElement.parentElement;
                        }else if( tagName == 'svg' ){
                            var rootCardProduct = event.target.parentElement.parentElement.parentElement.parentElement;
                        }else{
                            var rootCardProduct = event.target.parentElement.parentElement.parentElement.parentElement.parentElement;
                        }

                        // Obtengo los productos del local storage
                        ProductsLocalStorage = localStorage.getItem('productsShoppingCar');

                        // Tomo los valores del producto para agregarlo al carrito
                        const quantityProductElement = rootCardProduct.querySelector('.quantityProductDetail');
                        let quantity = parseInt(quantityProductElement.textContent);
                        const idProduct = rootCardProduct.querySelector('.idProductBrand').textContent;
                        const titleProduct = rootCardProduct.querySelector('.titleProductBrand').textContent;
                        const srcImageProduct = rootCardProduct.querySelector('.srcImageProductBrand').src;
                        // La cantidad es mayor que cero?
                        if( quantity > 0 ){

                            // El carrito tiene productos?
                            if( ProductsLocalStorage !== null ){
                                arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

                                let productInShppingCar = false;
                                let keyArray = 0;
                                // Recorro el array de prodcutos a ver si el producto ya se encuentra en el carrito
                                arrayProductsLocalStorage.forEach(product => {
                                    if (idProduct == product.id ){
                                        productInShppingCar = true;
                                        quantity--;
                                        quantityProductElement.textContent = quantity;
                                        product.quantity = quantity;
                                    }
                                    if (!productInShppingCar){
                                        keyArray++;
                                    }
                                });

                                // La cantidad del producto es cero? -
                                if (quantity == 0) {
                                    // Se elimina el producto del carrito de compras
                                    arrayProductsLocalStorage.splice(keyArray, 1);
                                }

                                // Muestro el span que indica que hay producots en el carrito
                                updateTotalProductsShoppingCar(arrayProductsLocalStorage);
                                shownHideCompareFloatButton(arrayProductsLocalStorage);

                                // Guardo en localstorage
                                localStorage.setItem('productsShoppingCar', JSON.stringify(arrayProductsLocalStorage));

                            }
                        }

                    }, {passive: true});
                })
            }

            // Funcion para actualizar productos en el boton flotante
            function updateTotalProductsShoppingCar(arrayProductsLocalStorage){
                const spanQuantityFloatButtonShoppingCard = document.getElementById('spanQuantityFloatButtonShoppingCard');
                const badgeIconShoppingCarNavbar = document.getElementById('badgeIconShoppingCarNavbar');
                let quantityTotal = 0;

                if( spanQuantityFloatButtonShoppingCard !== null ){

                    if( arrayProductsLocalStorage !== null ){

                        if(arrayProductsLocalStorage.length == 0 ){

                            spanQuantityFloatButtonShoppingCard.style.display = 'none';
                            badgeIconShoppingCarNavbar.style.display = 'none';

                        }else{
                            arrayProductsLocalStorage.forEach(product => {
                                quantityTotal += product.quantity;
                            });

                            spanQuantityFloatButtonShoppingCard.style.display = 'flex';
                            spanQuantityFloatButtonShoppingCard.lastElementChild.textContent = quantityTotal;
                            badgeIconShoppingCarNavbar.style.display = 'block';
                        }

                    }

                }

            }

            function shownHideCompareFloatButton(arrayProductsLocalStorage){
                let compareFloatButton = document.getElementById('compareFloatButton');

                // Hay elementos en el carrito de compras?
                if(arrayProductsLocalStorage == 0) {
                    compareFloatButton.classList.add("hiddeButton");
                    compareFloatButton.classList.remove("shownButton");
                }else{
                    compareFloatButton.classList.remove("hiddeButton");
                    compareFloatButton.classList.add("shownButton");
                    // setBrandInLocalStorage();
                }
            }

            function setBrandInLocalStorage(){
                // Obtengo la marca del local storage
                brandSelectedToBuy = localStorage.getItem('brandSelectedToBuy');

                const brandIdCurrent = document.getElementById('brandIdCurrent').textContent;
                const titleBrand = document.getElementById('titleBrand').textContent.trim();
                const imageBrand = document.getElementById('imageBrand').style.backgroundImage.slice(5, -2);
                const addressBrand = document.getElementById('addressBrand').textContent.trim();
                const slugBrand = document.getElementById('hrefBrand').textContent;

                const siteUrl = document.getElementById('siteUrl').textContent.trim();

                newBrand = {
                    id: brandIdCurrent,
                    title: titleBrand,
                    image: `url('${imageBrand}')`,
                    address: addressBrand,
                    href: `${siteUrl}/supermercado/${slugBrand}`
                }

                if( brandSelectedToBuy === null ){
                    // como se esta agregando una tienda desde cero, debo eliminar todos los productos antes agregados
                    localStorage.removeItem('productsShoppingCar');

                    localStorage.setItem('brandSelectedToBuy',JSON.stringify(newBrand));

                    // Muestro los precios de los productos
                    // Oculto los precios de cada producto en el modal de carrito de compras
                    const productInShoppingCarDOM = document.querySelectorAll('.priceItemInShoppingCar');
                    productInShoppingCarDOM.forEach(product => {
                        product.style.display = 'block';
                    });
                }else{
                    let brand = JSON.parse(brandSelectedToBuy);
                    if( brand.id != brandIdCurrent ){
                        // como se esta agregando un0 nueva tienda, debo eliminar todos los productos antes agregados
                        localStorage.removeItem('productsShoppingCar');
                        // alert('estas agregando un porducto de otra tienda')
                        localStorage.setItem('brandSelectedToBuy',JSON.stringify(newBrand));
                    }
                }

            }
        </script>

    @else
        <div class="w-full text-center mt-6">
            <h4 class="text-lg font-semibold"> {{ $tienda->brand }} aún no tiene productos en su tienda </h4>
            <img class="mx-auto mb-8 w-full md:w-1/2 lg:w-1/3 px-4" src="{{ asset('no_products_brand.svg') }}" alt="sin productos en la tienda">
            <a class="block md:inline mx-2 md:mx-0 rounded-lg text-white bg-green-500 shadow-md py-3 px-10" href="{{ route('brands.show') }}" aria-label="ir a listado de abastos y supermercados">Continuar con otros abastos</a>
        </div>
    @endif

@endsection
