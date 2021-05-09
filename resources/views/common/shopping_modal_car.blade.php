<div class="fixed z-40 inset-0 overflow-y-auto ease-out duration-400" style="display:none;" id="modalShoppingCar">

    <div class="flex md:items-end justify-center min-h-screen md:pt-4 md:px-4 pb-20 text-center sm:block sm:p-0">

      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>


      <!-- This element is to trick the browser into centering the modal contents. -->

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

      <div class="max-w-7xl w-full lg:max-w-4xl inline-block align-bottom md:rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle bg-gray-100" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

        <div class="grid grid-cols-5 px-3 py-5">
            <h5 class="col-span-4 text-xl font-bold text-gray-900">Carrito de compras</h5>
            <span class="justify-self-end">
                <svg class="cursor-pointer" width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg" id="shoppingCarButtonModalClose">
                    <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" fill="black"/>
                </svg>
            </span>
        </div>

        <div class="flex px-3 py-1">
            <h6 class="text-lg font-semibold text-gray-700 hidden" id="conProdcutos">Tus productos</h6>
            <h6 class="text-lg font-semibold text-gray-700" id="sinProdcutos">No tienes productos en el carrito!</h6>
        </div>

        <form>
            <div class="bg-gray-100 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                {{-- Card de Ejemplo para los productos--- NO Eleiminar FUNDAMENTAL para el Carrito de compras --}}
                <div hidden id="cardProductShoppingCar">
                    <div class="max-w-7xl w-full rounded-xl shadow-md relative bg-white mb-2">
                        <span class="w-6 h-6 absolute -top-2 -right-2 rounded-full bg-gray-600 text-white flex items-center justify-center cursor-pointer removeProductModalShoppingCar">x</span>
                        <div class="grid grid-cols-3 px-2">
                            <div class="col-span-1">
                                <img class="w-full self-center imgCardProductShoppingCar" src="" alt="imagen de banner">
                            </div>
                            <div class="col-span-2 flex flex-col justify-between py-3 sm:py-1 md:py-2 lg:py-4 xl:py-1">
                                <h6 class="titleCardProductShoppingCar text-lg md:text-lg sm:mt-3 md:mt-2 xl:mt-4"></h6>
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
            </div>

            <div class="bg-gray-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <span class="hidden" id="compararButton">
                <a class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:blue-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 items-center" href="{{ route('comparar') }}">
                    <svg class="fill-current text-white mr-2" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M6.14 11.86l-2.78 2.79c-.19.2-.19.51 0 .71l2.78 2.79c.31.32.85.09.85-.35V16H13c.55 0 1-.45 1-1s-.45-1-1-1H6.99v-1.79c0-.45-.54-.67-.85-.35zm14.51-3.21l-2.78-2.79c-.31-.32-.85-.09-.85.35V8H11c-.55 0-1 .45-1 1s.45 1 1 1h6.01v1.79c0 .45.54.67.85.35l2.78-2.79c.2-.19.2-.51.01-.7z"/></svg>
                    Comparar precios
                </a>
            </span>
            </div>
        </form>
      </div>
    </div>
  </div>
