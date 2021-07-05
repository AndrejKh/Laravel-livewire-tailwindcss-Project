<div class="fixed inset-0 overflow-y-auto ease-out duration-400" style="display:none;z-index: 2100000000 !important;" id="modalShoppingCar">

    <div class="flex md:items-end justify-center min-h-screen md:pt-4 md:px-4 pb-20 text-center sm:block sm:p-0">

      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

      <div class="max-w-7xl w-full lg:max-w-4xl inline-block align-bottom md:rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle bg-gray-100" role="dialog" aria-modal="true" aria-labelledby="modal-headline" id="contentModalShopinngCar">

        <div class="grid grid-cols-5 px-3 py-5">
            <h5 class="col-span-4 text-xl font-bold text-gray-900">Carrito de compras</h5>
            <span class="justify-self-end">
                <img class="h-6 cursor-pointer" src="{{ asset('close_icon_dark.svg') }}" alt="icono para cerrar modal de carrito de compras" width="24px" height="23px" id="shoppingCarButtonModalClose">
            </span>
        </div>

        <div class="px-3" hidden id="brandInShoppingCar">
            <h4>Estas comprando en <strong id="titleBrandInShoppingCar"></strong> </h4>

            <div class="mt-2" id="containerBrandShoppingCar">
            </div>

        </div>

        <div class="flex px-3 py-1">
            <h6 class="text-lg font-semibold text-gray-700 hidden" id="conProdcutos">Tus productos</h6>
        </div>

        <form>

            <div class="bg-gray-100 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                {{-- Card de Ejemplo para la tienda seleccionada--- NO Eleiminar FUNDAMENTAL para el Carrito de compras --}}
                <div hidden id="cardBrandShoppingCar">
                    <article class="grid grid-cols-5 md:grid-cols-5 lg:grid-cols-6 p-2 md:p-3 lg:p-4 shadow-md bg-white rounded-lg relative">
                        <span class="w-6 h-6 md:w-7 md:h-7 absolute -top-2 -right-2 rounded-full bg-gray-600 text-white flex items-center justify-center cursor-pointer" id="deleteBrandDetailInShoppingCar">
                            <img class="h-2 cursor-pointer" src="{{ asset('close_icon.svg') }}" alt="icono para cerrar modal de carrito de compras" width="24px" height="23px">
                        </span>
                        <div class="col-span-1 self-center">
                            <div class="bg-no-repeat bg-cover bg-center h-12 w-12 md:w-16 md:h-16 overflow-hidden rounded-full mx-auto" id="imgCardBrandShoppingCar"></div>
                        </div>
                        <div class="col-span-4 lg:col-span-5">
                            <a class="font-semibold text-lg inline" id="titleCardBrandShoppingCar" href="#"></a>
                            <div class="flex self-center text-xs md:text-sm text-gray-600">
                                <img class="inline h-4 md:h-5" src="{{ asset('address.svg') }}" alt="icono de la ubicacion del abasto o supermercado" width="24px" height="24px">
                                <h2 class="inline font-semibold" id="addressCardBrandShoppingCar"></h2>
                            </div>
                        </div>
                    </article>

                </div>
                {{-- Card de Ejemplo para los productos--- NO Eleiminar FUNDAMENTAL para el Carrito de compras --}}
                <div hidden id="cardProductShoppingCar">
                    <div class="max-w-7xl w-full rounded-xl shadow-md relative bg-white mb-2">
                        <span class="w-7 h-7 absolute -top-2 -right-2 rounded-full bg-gray-600 text-white flex items-center justify-center cursor-pointer removeProductModalShoppingCar">
                            <img class="h-3 cursor-pointer" src="{{ asset('close_icon.svg') }}" alt="icono para cerrar modal de carrito de compras" width="24px" height="23px">
                        </span>
                        <div class="grid grid-cols-3 px-2">
                            <div class="col-span-1">
                                <img class="w-full self-center imgCardProductShoppingCar" src="" alt="imagen de banner" width="250px" height="250px">
                            </div>
                            <div class="col-span-2 flex flex-col justify-between py-3 sm:py-1 md:py-2 lg:py-4 xl:py-1">
                                <h6 class="titleCardProductShoppingCar text-lg md:text-lg sm:mt-3 md:mt-2 xl:mt-4"></h6>
                                <div class="text-base font-semibold">
                                    <span class="priceItemInShoppingCar">
                                    </span>
                                </div>
                                <div class="flex justify-between mb-2">
                                    <div class="flex bg-gray-50 rounded-full">
                                        <span class="flex-shrink-0 self-center bg-green-400 rounded-full p-1 cursor-pointer substractProductModalShoppingCard">
                                            <svg class="fill-current text-white h-5 md:h-7 lg:h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000000"><path d="M8.12 9.29L12 13.17l3.88-3.88c.39-.39 1.02-.39 1.41 0 .39.39.39 1.02 0 1.41l-4.59 4.59c-.39.39-1.02.39-1.41 0L6.7 10.7c-.39-.39-.39-1.02 0-1.41.39-.38 1.03-.39 1.42 0z"/></svg>
                                        </span>
                                        <span class="flex-shrink-0 self-center px-6 md:px-10 lg:px-8 text-semibold text-md quantityCardProductShoppingCar">0</span>
                                        <span class="flex-shrink-0 self-center bg-green-400 rounded-full p-1 cursor-pointer addProductModalShoppingCard">
                                            <svg class="fill-current text-white h-5 md:h-7 lg:h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000000"><path d="M8.12 14.71L12 10.83l3.88 3.88c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L12.7 8.71c-.39-.39-1.02-.39-1.41 0L6.7 13.3c-.39.39-.39 1.02 0 1.41.39.38 1.03.39 1.42 0z"/></svg>
                                        </span>
                                    </div>
                                    {{-- <span class="text-sm text-gray-600 font-light self-center">Cantidad</span> --}}
                                </div>
                            </div>
                        </div>
                        <span hidden class="idProductCardModalShoppingCar"></span>
                    </div>
                </div>

                {{-- Contenedor donde iran los productos --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-3 md:gap-3 lg:gap-5" id="containerProductsShoppingCar">
                </div>

                <div class="text-center" id="sinProdcutos">
                    <strong class="text-lg">No tienes productos en el carrito de compras</strong>
                    <div class="text-center">
                        <img class="mx-auto" width="50%" src="{{ asset('empty_car.svg') }}" alt="carrito vacio">
                    </div>
                    <div class="mt-3" id="enlaceNoBrand">
                        <a class="py-2 bg-green-500 text-white px-5 rounded-full shadow-md" href="{{ route('products.show') }}" aria-label="ir a todos los productos del sitio">Buscar productos</a>
                    </div>
                    <div class="mt-3" id="enlaceConBrand" style="display:none;">
                        <a class="py-2 bg-green-500 text-white px-5 rounded-full shadow-md" href="#" aria-label="ir a todos los productos del supermercado">Buscar productos</a>
                    </div>
                </div>


            </div>

            <div style="display: none;" id="amountContainerShoppingCar">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-2 text-xl font-semibold text-gray-900 bg-gray-100 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="md:col-start-3 col-span-1">
                        TOTAL
                    </div>
                    <div class="md:col-start-4 col-span-1 text-right" id="amountShoppingCar"></div>
                </div>
            </div>

            <div class="bg-gray-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <span class="mr-0" id="finalizarCompraButton" style="display:none;">
                    <div class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:blue-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 items-center cursor-pointer" aria-label="ir a comparar precios" id="finalizarCompra">
                        <img class="mr-2" src="{{ asset('arrow_finally.svg') }}" alt="icono de flecha para finalizar compra en kabasto" width="24px" height="24px">
                        Finalizar compra
                    </div>
                </span>
                <span class="hidden lg:mr-2 mt-3 md:mt-0" id="compararButton">
                    <a class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 hover:bg-blue-500 text-base leading-6 font-medium text-white shadow-sm focus:outline-none focus:blue-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 items-center" href="{{ route('comparar') }}" aria-label="ir a comparar precios">
                        <img src="{{ asset('compare.svg') }}" alt="icono de comparar precios de supermercados y abastos" width="28px" height="28px">
                        Comparar precios
                    </a>
                </span>
                <span class="hidden lg:mr-2 mt-3 md:mt-0" id="compararButtonOutline">
                    <a class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-white hover:bg-gray-200 text-base leading-6 font-medium text-blue-600 shadow-sm focus:outline-none focus:blue-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 items-center" href="{{ route('comparar') }}" aria-label="ir a comparar precios">
                        <img class="mr-2" src="{{ asset('compare_blue.svg') }}" alt="icono de comparar precios de supermercados y abastos" width="28px" height="28px">
                        Comparar precios
                    </a>
                </span>
            </div>
        </form>
      </div>
    </div>
  </div>
