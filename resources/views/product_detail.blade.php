<x-app-layout>
    <span class="hidden" id="idproduct">{{$product->id}}</span>

    <div class="flex justify-center mt-3">
        <div class="max-w-7xl w-full px-2">
            <div class="grid grid-cols-1 md:grid-cols-6 gap-3">
                <div class="block md:hidden max-w-7xl col-span-1">
                    <h1 class=" text-2xl text-gray-900 font-bold mb-1 md:mb-5 lg:mb-6" id="titleProduct">{{ $product->title }}</h1>
                    <span class="text-md text-gray-900">
                        Categoría:
                    </span>
                    <a class="text-gray-400" href="{{route('products.category.show', $product->category->slug)}}">
                        {{ $product->category->category }}
                    </a>
                </div>
                <div class="max-w-7xl col-span-3 rounded-xl shadow-md overflow-hidden relative">
                    <img class="w-full" src="/storage/{{ $product->photo_main_product }}" alt="{{ $product->title }}" id="srcImageProduct">
                    <span class="absolute top-7 right-7 z-20 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z"/></svg>
                    </span>
                </div>

                <div class="max-w-7xl col-span-3 relative px-3 mt-4">
                    <div class="hidden md:block text-right">
                        @if ( count($items) > 0 )
                        <span class="bg-blue-500 text-white font-semibold rounded-sm shadow px-3 py-2">
                            <svg class="inline fill-current text-white mr-1" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><path d="M12,2L4,5v6.09c0,5.05,3.41,9.76,8,10.91c4.59-1.15,8-5.86,8-10.91V5L12,2z M18,11.09c0,4-2.55,7.7-6,8.83 c-3.45-1.13-6-4.82-6-8.83V6.31l6-2.12l6,2.12V11.09z M8.82,10.59L7.4,12l3.54,3.54l5.66-5.66l-1.41-1.41l-4.24,4.24L8.82,10.59z"/></g></svg>
                            Producto Disponible
                        </span>
                        @endif
                        <h1 class="text-left text-4xl text-gray-900 font-semibold mb-3 md:mb-4 mt-4">{{ $product->title }}</h1>
                        <div class="text-left">
                            <a class="text-md text-gray-900" href="{{route('products.category.show', $product->category->slug)}}">
                                Categoría: <span class="text-gray-400">{{ $product->category->category }}</span>
                            </a>
                        </div>
                    </div>

                    <div class="flex justify-center md:justify-start my-6">
                        <div class="flex bg-white rounded-full">
                            <span class="flex-shrink-0 self-center bg-green-400 rounded-full p-2 cursor-pointer" id="subtractProduct">
                                <svg class="fill-current text-white h-7 w-7 lg:h-10 lg:w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 5v11.17l-4.88-4.88c-.39-.39-1.03-.39-1.42 0-.39.39-.39 1.02 0 1.41l6.59 6.59c.39.39 1.02.39 1.41 0l6.59-6.59c.39-.39.39-1.02 0-1.41-.39-.39-1.02-.39-1.41 0L13 16.17V5c0-.55-.45-1-1-1s-1 .45-1 1z"/></svg>
                            </span>
                            <span class="flex-shrink-0 self-center px-14 lg:px-24 text-semibold text-xl" id="quantityProductDetail">0</span>
                            <span class="flex-shrink-0 self-center bg-green-400 rounded-full p-2 cursor-pointer" id="addProduct">
                                <svg class="fill-current text-white h-7 w-7 lg:h-10 lg:w-10" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M13 19V7.83l4.88 4.88c.39.39 1.03.39 1.42 0 .39-.39.39-1.02 0-1.41l-6.59-6.59c-.39-.39-1.02-.39-1.41 0l-6.6 6.58c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0L11 7.83V19c0 .55.45 1 1 1s1-.45 1-1z"/></svg>
                            </span>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <h4 class="text-xl font-semibold md:mt-10">Descripción</h4>
                        <p class="hidden md:block text-gray-500 mt-4 md:mt-4 text-base md:text-lg">{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-4">
        <div class="max-w-7xl w-full px-2 mx-auto mb-1">
            <h3 class="text-xl text-gray-900 font-semibold">
                Los precios de los supermercados
            </h3>
        </div>
        <div class="max-w-7xl w-full px-2 mx-auto">
            <span class="text-gray-400 text-sm">Podrás comparar tu carrito de compras al final</span>
        </div>
    </div>
    <div class="flex justify-center mt-3">
        <div class="max-w-7xl w-full px-2">
            @foreach ($items as $item)
                @include('components.card_tienda_precio_product')
            @endforeach
        </div>
    </div>

    <div class="block md:hidden max-w-7xl w-full px-2 mx-auto mb-1 mt-3">
        <h3 class="text-xl text-gray-900 font-semibold">
            Descripción
        </h3>
        <p class="text-gray-500 mt-4 md:mt-6 lg:mt-10 text-base md:text-lg">{{ $product->description }}</p>
    </div>

    @include('home.carousel_categories_card_details')


    {{-- Actualizar la cantidad del producto en carrito de compras, con local storage --}}
    <script>
        const idProduct = document.getElementById('idproduct').textContent;
        const quantityProductDetail = document.getElementById('quantityProductDetail');
        // Obtengo los productos del local storage
        ProductsLocalStorage = localStorage.getItem('productsShoppingCar');

        if (ProductsLocalStorage !== null) {

            arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

            let productInShppingCar = false;
            // Recorro el array de prodcutos a ver si el producto ya se encuentra en el carrito
            arrayProductsLocalStorage.forEach(product => {
                if (idProduct == product.id ){
                    productInShppingCar = true;
                    quantityProductDetail.textContent = product.quantity;
                }
            });

        }
    </script>


<script>

</script>


</x-app-layout>
