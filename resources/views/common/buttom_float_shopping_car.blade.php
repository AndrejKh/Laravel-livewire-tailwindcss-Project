<div class="fixed bottom-0 z-30">

    <div class="fixed mb-1 bottom-5 right-3 mr-2 z-30" id="compareFloatButton">
        <a class="flex h-11 w-11 self-center text-center bg-blue-600 rounded-full shadow-md items-center" href="{{ route('comparar') }}" aria-label="ir a comparar precios">
            <img class="mx-auto" src="{{ asset('compare.svg') }}" alt="icono de comparar precios">
        </a>
    </div>

    <div class="flex fixed bottom-5 right-4 h-14 w-14 self-center text-center bg-green-500 rounded-full z-30 shadow-md items-center cursor-pointer shoppingCarButtonOpenModal">
        <img class="mx-auto" src="{{ asset('shopping_car_white.svg') }}" alt="icono de carrito de compras">
        <span class="absolute -top-1 -right-2 bg-blue-700 w-7 h-7 rounded-full justify-center items-center hidden" id="spanQuantityFloatButtonShoppingCard">
            <span class="text-xs text-white"></span>
        </span>
    </div>

</div>
