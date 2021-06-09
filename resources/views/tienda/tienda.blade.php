@extends('layouts.app')

    @section('title')
        {{ $tienda->brand }} - Kabasto
    @endsection

    @section('header')
        {{-- precargar imagenes --}}
        <link rel="preload" href="/storage/{{ $tienda->profile_photo_path_brand }}" as="image">

        <!-- Primary Meta Tags -->
        <meta name="title" content="Todos los productos de {{ $tienda->brand }} - Kabasto.com">
        <meta name="description" content="Haz tus compras en {{ $tienda->brand }} y recomiendalo a tu familia y amigos - Kabasto.com">
        <meta name="keywords" content="precio de productos de {{ $tienda->brand }} en venezuela">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://kabasto.com/supermercado/{{ $tienda->slug }}">
        <meta property="og:title" content="Todos los productos de {{ $tienda->brand }} - Kabasto.com">
        <meta property="og:description" content="Haz tus compras en {{ $tienda->brand }} y recomiendalo a tu familia y amigos - Kabasto.com">
        <meta property="og:image" content="/storage/{{ $tienda->profile_photo_path_brand }}">

        {{-- url canonical --}}
        <link rel="canonical" href="https://kabasto.com/supermercado/{{ $tienda->slug }}" />
    @endsection

@section('content')

    @include('tienda.card_tienda')

    @include('tienda.carousel_banners_tienda')

    @include('tienda.carousel_cards_deliveries')


    @if ( count($items) > 0 )

        <div class="flex justify-center mt-3">
            <div class="max-w-7xl w-full">
                <h4 class="font-bold text-xl text-gray-900 px-2 md:px-0">
                    ({{count($items)}}) Productos Disponibles
                </h4>
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

                        // El carrito tiene productos?
                        if( ProductsLocalStorage === null ){
                            quantity++;
                            quantityProductElement.textContent = quantity;

                            let newProduct = {
                                id: idProduct,
                                title: titleProduct,
                                quantity: quantity,
                                image: srcImageProduct
                            }

                            let ProductsLocalStorage = '['+JSON.stringify(newProduct)+']';

                            // Muestro el span que indica que hay producots en el carrito
                            updateTotalProductsShoppingCar(JSON.parse(ProductsLocalStorage));
                            shownHideCompareFloatButton(arrayProductsLocalStorage);
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
                                    quantityProductElement.textContent = quantity;
                                    product.quantity = quantity;
                                }
                            });

                            // El producto estaba en el carrito de compras?
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
                                    title: titleProduct,
                                    quantity: quantity,
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

                    });

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

                    });
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
                }
            }
        </script>

    @endif

@endsection
