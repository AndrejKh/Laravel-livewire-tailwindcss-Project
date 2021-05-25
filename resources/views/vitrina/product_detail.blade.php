<x-app-layout>
    <span class="hidden" id="idproduct">{{$product->id}}</span>

    <div class="flex justify-center mt-3">
        <div class="max-w-7xl w-full px-2">
            <div class="grid grid-cols-1 md:grid-cols-6 gap-3">
                <div class="block md:hidden max-w-7xl col-span-1">
                    <h1 class=" text-2xl text-gray-900 font-bold mb-1 md:mb-5 lg:mb-6" id="titleProduct">
                        {{ $product->title }}
                    </h1>
                    <span class="text-md text-gray-900">
                        Categoría:
                    </span>
                    <a class="text-gray-400" href="{{route('products.category.show', $product->category->slug)}}">
                        {{ $product->category->category }}
                    </a>
                </div>
                <div class="max-w-7xl col-span-3 rounded-xl shadow-md overflow-hidden relative">
                    <img class="w-full" src="/storage/{{ $product->photo_main_product }}" alt="{{ $product->title }}" id="srcImageProduct">
                    <span class="absolute top-7 right-7 z-20 cursor-pointer" id="openShareModal">
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

                    <div class="flex justify-center md:justify-start my-2 md:my-6">
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
                        <p class="hidden md:block text-gray-500 mt-4 md:mt-4 text-base md:text-lg">
                            @php echo nl2br($product->description); @endphp
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-4">
        <div class="max-w-7xl w-full px-2 mx-auto mb-1">
            <h3 class="text-xl text-gray-900 font-semibold">
                Los precios de los supermercados y abastos
            </h3>
        </div>
        <div class="max-w-7xl w-full px-2 mx-auto">
            <span class="text-gray-400 text-sm">Podrás comparar tu carrito de compras al final</span>
        </div>
    </div>
    {{-- Listado de supermercados --}}
    <div class="flex justify-center mt-3">
        <div class="max-w-7xl w-full px-2">
            @foreach ($items as $item)
                @include('components.card_tienda_precio_product')
            @endforeach
        </div>
    </div>

    {{-- Boton volver - seguir comprando --}}
    <div class="flex justify-center my-4">
        <a class="bg-green-500 text-white py-2 px-4 rounded-md shadow-md" href="{{ url()->previous() }}">Seguir comprando</a>
    </div>

    <div class="block md:hidden max-w-7xl w-full px-2 mx-auto mb-1 mt-3">
        <h3 class="text-xl text-gray-900 font-semibold">
            Descripción
        </h3>
        <p class="text-gray-500 mt-4 md:mt-6 lg:mt-10 text-base md:text-lg">
            @php echo nl2br($product->description); @endphp
        </p>
    </div>

    {{-- Categorias cads con detalle --}}
    @include('home.sections.carousel_categories_card_details')

    {{-- Modal para compartir --}}
    <div class="fixed z-40 inset-0 overflow-y-auto ease-out duration-400" style="display:none;" id="shareModal" >

        <div class="block md:items-end justify-center min-h-screen md:pt-4 md:px-4 pb-20 text-center sm:p-0">

            <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <span class="inline-block align-middle h-screen"></span>​

            <div class="max-w-md w-full lg:max-w-xl inline-block rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 align-middle bg-gray-100" role="dialog" aria-modal="true" aria-labelledby="modal-headline" id="contentModalShare">

                <div class="grid grid-cols-5 px-5 pt-5 pb-2 shareModal">
                    <h5 class="col-span-4 text-xl font-bold text-gray-900">
                        Compartir en redes sociales
                    </h5>
                    <span class="justify-self-end">
                        <svg class="cursor-pointer" width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg" id="closeShareModal">
                            <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" fill="black"/>
                        </svg>
                    </span>
                </div>

                <div class="flex justify-center py-5 shareModal">
                    <div class="flex px-1 ">
                        <a class="flex px-2 md:px-1 lg:px-2" href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" id="facebook" target="_blank">
                            <svg class="inline" version="1.1" width="16px" heigth="16px" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 155.139 155.139" style="enable-background:new 0 0 155.139 155.139;" xml:space="preserve">
                            <g>
                                <path id="f_1_" style="fill:#026ae3;" d="M89.584,155.139V84.378h23.742l3.562-27.585H89.584V39.184
                                    c0-7.984,2.208-13.425,13.67-13.425l14.595-0.006V1.08C115.325,0.752,106.661,0,96.577,0C75.52,0,61.104,12.853,61.104,36.452
                                    v20.341H37.29v27.585h23.814v70.761H89.584z"/>
                            </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                            <span class="self-center ml-2">Facebook</span>
                        </a>
                    </div>
                    <div class="flex px-1 ">
                        <a class="px-2 md:px-1 lg:px-2" href="https://web.whatsapp.com/send?text={{ Request::url() }}" id="whastapp" target="_blank">
                            <svg class="inline" width="16px" heigth="16px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <g>	<g>
                                    <path fill="#06d755" d="M440.164,71.836C393.84,25.511,332.249,0,266.737,0S139.633,25.511,93.308,71.836S21.473,179.751,21.473,245.263
                                        c0,41.499,10.505,82.279,30.445,118.402L0,512l148.333-51.917c36.124,19.938,76.904,30.444,118.403,30.444
                                        c65.512,0,127.104-25.512,173.427-71.836C486.488,372.367,512,310.776,512,245.263S486.488,118.16,440.164,71.836z
                                        M266.737,460.495c-38.497,0-76.282-10.296-109.267-29.776l-6.009-3.549L48.952,463.047l35.878-102.508l-3.549-6.009
                                        c-19.479-32.985-29.775-70.769-29.775-109.266c0-118.679,96.553-215.231,215.231-215.231s215.231,96.553,215.231,215.231
                                        C481.968,363.943,385.415,460.495,266.737,460.495z"/>
                                </g></g><g>	<g>
                                    <path fill="#06d755" d="M398.601,304.521l-35.392-35.393c-11.709-11.71-30.762-11.71-42.473,0l-13.538,13.538
                                        c-32.877-17.834-60.031-44.988-77.866-77.865l13.538-13.539c5.673-5.672,8.796-13.214,8.796-21.236
                                        c0-8.022-3.124-15.564-8.796-21.236l-35.393-35.393c-5.672-5.672-13.214-8.796-21.236-8.796c-8.023,0-15.564,3.124-21.236,8.796
                                        l-28.314,28.314c-15.98,15.98-16.732,43.563-2.117,77.664c12.768,29.791,36.145,62.543,65.825,92.223
                                        c29.68,29.68,62.432,53.057,92.223,65.825c16.254,6.965,31.022,10.44,43.763,10.44c13.992,0,25.538-4.193,33.901-12.557
                                        l28.314-28.314c5.673-5.672,8.796-13.214,8.796-21.236S404.273,310.193,398.601,304.521z M349.052,354.072
                                        c-6.321,6.32-23.827,4.651-44.599-4.252c-26.362-11.298-55.775-32.414-82.818-59.457c-27.043-27.043-48.158-56.455-59.457-82.818
                                        c-8.903-20.772-10.571-38.278-4.252-44.599l28.315-28.314l35.393,35.393l-28.719,28.719l4.53,9.563
                                        c22.022,46.49,59.753,84.221,106.244,106.244l9.563,4.53l28.719-28.719l35.393,35.393L349.052,354.072z"/>
                                </g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                            <span class="self-center ml-2">Whatsapp</span>
                        </a>
                    </div>
                    <div class="flex px-1">
                        <a class="px-2 md:px-1 lg:px-2" href="https://twitter.com/intent/tweet?text={{ $product->title }}&url={{ Request::url() }}" id="twitter" target="_blank">
                            <svg class="inline" version="1.1" width="16px" heigth="16px" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <path style="fill:#03A9F4;" d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016
                                c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992
                                c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056
                                c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152
                                c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792
                                c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44
                                C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568
                                C480.224,136.96,497.728,118.496,512,97.248z"/>
                            <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                            <span class="self-center ml-2">Twitter</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>


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

    {{-- Modal de compartir --}}
    <script>
        const shareModal = document.getElementById('shareModal');
        const contentModalShare = document.getElementById('contentModalShare');
        const openShareModal = document.getElementById('openShareModal');
        const closeShareModal = document.getElementById('closeShareModal');

        openShareModal.addEventListener('click', event => {
            // alert("sdf")
            shareModal.style.display = 'block';
        });

        closeShareModal.addEventListener('click', event => {
            shareModal.style.display = 'none';
        });

         // Oculto el modal al dar click afuera de el
         $(document).on("click",function(e) {
            // Verifico si el elemento al q se le dio click esta fuera del modal
            // Debe ser distinto ademas del boton q hace mostrar el modal
            if( !contentModalShare.contains(e.target) && !openShareModal.contains(e.target) ){
                shareModal.style.display = 'none';
            }
        })

    </script>

</x-app-layout>
