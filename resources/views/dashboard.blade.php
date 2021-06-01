<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-6">
        <div class="hidden md:block bg-gray-100 px-0 md:px-1 lg:px-4 py-6 rounded-sm shadow-sm col-span-1">
          <!-- Aside Navbar -->
          @include('common.aside_navbar_perfil')
        </div>

        <div class="bg-white p-2 lg:p-6 rounded-sm shadow-sm col-span-5 pb-10">
            <!-- Contenido -->
            <div class="w-full pb-10">
                <div>
                    <h3 class="text-lg text-green-600 mt-3">Bienvenido a Kabasto!</h3>
                    @role('buyer')
                    <span class="text-sm text-gray-600">Aquí encontrarás las mejores opciones para la compra de tu mercado </span>
                    @endrole
                    @role('seller')
                    <span class="text-sm text-gray-600">La mejor plataforma para mostrar y vender tus productos </span>
                    @endrole
                </div>
                @role('seller')

                    @if( count(auth()->user()->brands) == 0 )

                        <div class="flex justify-center mt-10">
                            <span class="text-md bg-white px-3 md:px-8 py-4 rounded-md shadow">
                                Para poder empezar a vender tus productos con nosotros, debes primero
                                <a class="text-blue-700" href="{{ route('cms.tiendas') }}">crear una marca</a>
                            </span>
                        </div>

                    @endif
                @endrole
                {{-- Productos en el carrito --}}
                <div class="mt-3 hidden" id="shoppingCarPending">
                    <div class="grid grid-cols-2 gap-2 ">
                        <div class="col-span-2">Tienes productos en el carrito.</div>
                        <div class="col-span-1">
                            <a class="text-sm text-blue-900 rounded-md shadow-sm block py-2 text-center" href="{{ route('home') }}">Seguir comprando</a>
                        </div>
                        <div class="col-span-1">
                            <a class="text-sm bg-green-400 text-white rounded-md shadow-sm block py-2 text-center" href="{{ route('comparar') }}">Comparar precios</a>
                        </div>
                    </div>
                </div>
                <hr class="my-3">
                {{-- Productos en el carrito y supermercado seleccionado --}}
                <div class="mt-3" style="display: none;" id="orderPendingContainer">
                    <div class="grid grid-cols-2 gap-2 ">
                        <div class="col-span-2 text-green-600">Tienes una compra pendiente.</div>
                        {{-- Productos seleccionados en el carrito --}}
                        <div class="col-span-2 bg-white grid grid-cols-5 mb-3">
                            <div class="col-span-4">
                                <div class="text-gray-900 font-light text-md py-1">
                                    <span id="quantityProducts"></span>
                                    Productos selecionados
                                </div>
                                <span class="text-gray-900 font-bold text-xl">
                                    <span id="brandSelected"></span>
                                </span>
                            </div>
                            <div class="col-span-1 self-center ml-auto">
                                <div class="flex h-8 w-8 self-center text-center bg-white rounded-full shadow-sm items-center cursor-pointer" id="getItemsShoppingCar">
                                    <svg class="fill-current text-green-400 h-2 mx-auto return_rotate_select_icon" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.29866 0.333143L7.50671 4.75228L12.7148 0.333143C13.2383 -0.111048 14.0839 -0.111048 14.6074 0.333143C15.1309 0.777335 15.1309 1.49487 14.6074 1.93907L8.44631 7.16686C7.92282 7.61105 7.07718 7.61105 6.55369 7.16686L0.392617 1.93907C-0.130872 1.49487 -0.130872 0.777335 0.392617 0.333143C0.916107 -0.0996583 1.77517 -0.111048 2.29866 0.333143Z" />
                                    </svg>
                                </div>
                            </div>

                            {{-- Mostrar los productos del carrito --}}
                            <div class="col-span-5 grid grid-cols-1 gap-2" id="containerItemsShoppingCar">
                            </div>
                            {{-- Card modelo de productos en carrito --}}
                            <div class="hidden" id="cardModelItem">
                                <div class="rounded-md shadow-md bg-white grid grid-cols-5 gap-2 py-2 my-1" >
                                    <span class="col-span-1">
                                        <img class="imgCard" src="" alt="">
                                    </span>
                                    <span class="col-span-4 text-gray-900 font-semibold text-md py-2">
                                        (<span class="quantityCard"></span>)
                                        <span class="titleCard"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <a class="text-sm text-blue-900 rounded-md shadow-sm block py-2 text-center" href="{{ route('comparar') }}">Comparar precios</a>
                        </div>
                        <button class="col-span-1 text-sm bg-green-400 text-white rounded-md shadow-sm block py-2 text-center" id="comprar">Finalizar compra</button>
                        <span hidden id="csrf_token">{{ csrf_token() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('common.navbar_movil_perfil')

    <script>
        // Verifico si hay productos en el carrito de compras, y si ya se selecciono un abasto
        window.onload = function() {
            let orderPendingContainer = document.getElementById('orderPendingContainer');
            // Obtengo los productos del local storage
            const ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
            console.log('here')

            if (ProductsLocalStorage !== null) {
                console.log('Hay productos en el carrito de compras')
                const products = JSON.parse(ProductsLocalStorage);
                console.log(products)
                console.log(products.length)
                // Obtengo el supermercado selecionado, local storage
                const brandSelectedToBuy = localStorage.getItem('brandSelectedToBuy');
                // if (products.length > 0) {
                //     console.log('Hay mas de cero productos')
                //     if (brandSelectedToBuy !== null) {
                //         console.log('Se seleccciono un abasto')
                //         /********************
                //         Muestro la cantidad de productos que se tienen en el carrito
                //         **********************/
                //         const quantityProducts = document.getElementById('quantityProducts');

                //         let quantity = 0;
                //         // Recorro el carrito para obtener la cantidad total de productos en el
                //         products.forEach(product => {
                //             quantity += product.quantity;
                //         });
                //         console.log(quantityProducts)

                //         // Asigno la cantidad total de productos en el carrito
                //         quantityProducts.textContent = quantity;


                //         const brand = JSON.parse(brandSelectedToBuy);

                //         let brandSelected = document.getElementById('brandSelected');
                //         brandSelected.textContent = brand.brand;

                //         const totalAmount = localStorage.getItem('amount');
                //         const amount = JSON.parse(totalAmount);

                //         // muestro el div de los datos
                //         orderPendingContainer.style.display = 'block';


                //     }else{
                //         const shoppingCarPending = document.getElementById('shoppingCarPending');
                //         shoppingCarPending.style.display = 'block';
                //     }
                // }

            }
        }
    </script>

    <script>
        // Obtengo los productos del carrito y los muestro en pantalla
        // const getItemsShoppingCar = document.getElementById('getItemsShoppingCar');
        // getItemsShoppingCar.addEventListener('click', event => {
        //     // Obtengo los productos del local storage
        //     ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
        //     // En que elemento se dio click? en el span, en el svg o en el path? obtengo el nodo principal
        //     if ( event.target.nodeName == 'DIV' ){
        //         var svgIconSelect = event.target.firstElementChild;
        //     }else if( event.target.nodeName == 'svg' ){
        //         var svgIconSelect = event.target;
        //     }else {
        //         var svgIconSelect = event.target.parentNode;
        //     }

        //     const containerItemsShoppingCar = document.getElementById('containerItemsShoppingCar');
        //     if( containerItemsShoppingCar.childElementCount > 0 ){
        //         containerItemsShoppingCar.innerHTML = '';
        //         // Girar icono de select
        //         svgIconSelect.classList.replace("rotate_select_icon", "return_rotate_select_icon");
        //     }else{
        //         // Girar icono de select
        //         svgIconSelect.classList.replace("return_rotate_select_icon", "rotate_select_icon");
        //         // Obtengo el componente card de ejemplo
        //         const modelItem = document.getElementById('cardModelItem');

        //         arrayProductsLocalStorage.forEach(product => {
        //             // creo un clon del card de ejemplo
        //             newCardProductShoppingCar = modelItem.firstElementChild.cloneNode(true);
        //             // Obtengo los campos del card  clonado
        //             let newTitle = newCardProductShoppingCar.querySelector('.titleCard');
        //             let newQuantity = newCardProductShoppingCar.querySelector('.quantityCard');
        //             let newImage = newCardProductShoppingCar.querySelector('.imgCard');
        //             // Asigno los valores del local storage a los campos html
        //             newTitle.textContent = product.title;
        //             newQuantity.textContent = product.quantity;
        //             newImage.src = product.image;
        //             // Inserto el card en el modal
        //             containerItemsShoppingCar.appendChild(newCardProductShoppingCar);
        //         });

        //     }

        // });
    </script>

    <script>
        // Finalizar compra, al dar click en el boton  'Finalizar comprar'
        const comprar = document.getElementById('comprar');
        comprar.addEventListener('click', event => {
            // Obtengo los productos del local storage
            const ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
            const products = JSON.parse(ProductsLocalStorage);

            // // Obtengo loa ubicacion del local storage
            const ubicationLocalStorage = localStorage.getItem('ubication');
            const ubication = JSON.parse(ubicationLocalStorage);

            const brandSelectedToBuy = localStorage.getItem('brandSelectedToBuy');
            const brand = JSON.parse(brandSelectedToBuy);

            const amountSelected = localStorage.getItem('amount');
            const amount = JSON.parse(amountSelected);

            const itemsSelected = localStorage.getItem('itemsSelected');
            const items = JSON.parse(itemsSelected);

            const csrf_token = document.getElementById('csrf_token').textContent;

            const data = {
                products: products,
                ubication: ubication,
                brand: brand,
                amount: amount,
                items: items
            }

            axios({
                method  : 'post',
                url : '/post/create-order/',
                data : data,
                headers: {
                    'content-type': 'text/json',
                    'X-CSRF-Token': csrf_token
                    }
            })
            .then((res)=>{
                if(res.data === 0){
                    // El usuario no esta logeado, lo redirijo a la vista de login
                    window.location.href = "/login?r=1";
                }else{
                    // elimino los datos del local storage
                    localStorage.removeItem('itemsSelected');
                    localStorage.removeItem('amount');
                    localStorage.removeItem('brandSelectedToBuy');
                    localStorage.removeItem('ubication');
                    localStorage.removeItem('productsShoppingCar');
                    // redirecciono a la vista compras
                    window.location.href = "/compras";
                }
            })
            .catch((err) => {console.log(err)});

        })
    </script>

</x-app-layout>

