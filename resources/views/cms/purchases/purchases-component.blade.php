<div>
    @php
        // $id_order_crated = session('order');
        // session()->forget('order');
    @endphp
    <div class="grid grid-cols-3 gap-1 mt-3 mb-4">
        <span class="col-span-2 self-center">Todas tus compras</span>
        <select class="col-span-1 select_filter_cms" wire:model="status">
            <option value="">Todas</option>
            <option value="active">Activas</option>
            <option value="completed">Completadas</option>
            <option value="cancelled">Canceladas</option>
        </select>
    </div>

    <div class="grid grid-cols-1 gap-2">

        @foreach ($orders as $order)

            @include('cms.purchases.card_compra')

        @endforeach

    </div>

    {{-- Modal detalles de compra --}}
    @if ($modalDetailPurchase)
        <x-jet-dialog-modal wire:model="modalDetailPurchase">
            <x-slot name="title">
                <div class="flex items-center justify-between py-2">
                    <span class="text-sm text-gray-600 font-light">
                        @php
                            $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                            $fecha = $purchase->created_at;
                            echo $diassemana[$fecha->format('w')]." ".$fecha->format('d')." de ".$meses[$fecha->format('n')-1]. " del ".$fecha->format('Y');
                        @endphp
                    </span>
                    <span  wire:click="cancel()" class="justify-self-end">
                        <svg class="cursor-pointer" width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" fill="black"/>
                        </svg>
                    </span>
                </div>
            </x-slot>

            <x-slot name="content">
                <div class="flex items-center justify-between">
                    <h5 class="col-span-4 text-lg font-bold text-gray-900">Detalles de la compra</h5>
                    @switch($purchase->status)

                        @case('active')
                            <span class="text-xs font-light md:tracking-widest text-white bg-blue-450 px-4 py-1 rounded-full shadow-sm"> Activa </span>
                            @break
                        @case('delivered')
                            <span class="text-xs font-light md:tracking-widest text-white bg-blue-450 px-4 py-1 rounded-full shadow-sm"> Activa </span>
                            @break
                        @case('received')
                            <span class="text-xs font-light md:tracking-widest text-white bg-yellow-500 px-4 py-1 rounded-full shadow-sm"> Recibida </span>
                            @break
                        @case('completed')
                            <span class="text-xs font-light md:tracking-widest text-white bg-green-450 px-4 py-1 rounded-full shadow-sm"> Completada </span>
                            @break
                        @case('cancelled')
                            <span class="text-xs font-light md:tracking-widest text-white bg-red-450 px-4 py-1 rounded-full shadow-sm"> Cancelada </span>
                            @break
                        @default

                    @endswitch
                </div>

                {{-- Brand card --}}
                <div class="grid grid-cols-5 gap-1 my-3 shadow rounded-lg py-2 bg-white">
                    <div class="col-span-1 self-center">
                        <div class="bg-no-repeat bg-cover bg-center w-12 h-12 md:w-16 md:h-16 overflow-hidden rounded-full mx-auto" style="background-image: url('/storage/{{ $brand->profile_photo_path_brand }}');"></div>
                    </div>
                    <div class="col-span-4 flex flex-col">
                        <a class="text-md text-gray-900 font-semibold" href="{{route('brands.details.show', [$brand->slug])}}"> {{ $brand->brand }}</a>
                        <div class="text-xs text-gray-700 font-light">{{ $brand->brand }}</div>
                        <div class="flex">
                            <svg class="inline h-4 w-4" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M10 15.27L16.18 19L14.54 11.97L20 7.24L12.81 6.63L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27Z" fill="#34BA00"/></svg>
                            <svg class="inline h-4 w-4" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M10 15.27L16.18 19L14.54 11.97L20 7.24L12.81 6.63L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27Z" fill="#34BA00"/></svg>
                            <svg class="inline h-4 w-4" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M10 15.27L16.18 19L14.54 11.97L20 7.24L12.81 6.63L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27Z" fill="#34BA00"/></svg>
                            <svg class="inline h-4 w-4" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M20 7.24L12.81 6.62L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27L16.18 19L14.55 11.97L20 7.24ZM10 13.4V4.1L11.71 8.14L16.09 8.52L12.77 11.4L13.77 15.68L10 13.4Z" fill="#34BA00"/></svg>
                            <svg class="inline h-4 w-4" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M20 7.24L12.81 6.62L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27L16.18 19L14.55 11.97L20 7.24ZM10 13.4L6.24 15.67L7.24 11.39L3.92 8.51L8.3 8.13L10 4.1L11.71 8.14L16.09 8.52L12.77 11.4L13.77 15.68L10 13.4Z" fill="#34BA00"/></svg>
                        </div>
                    </div>
                </div>

                {{-- Productos --}}
                <div class="flex font-bold text-gray-900 text-md mb-3 px-3">Listado de productos</div>

                <div class="">
                    @foreach ($products as $product)
                        <div class="grid grid-cols-5 gap-1 px-2 py-2 rounded-md shadow bg-white">
                            <div class="col-span-1 self-center">
                                <img src="/storage/{{ $product->product->photo_main_product }}" alt="">
                            </div>
                            <div class="col-span-4 flex flex-col self-center ml-2">
                                <div class="text-lg text-gray-900 font-semibold md:mb-3"> {{ $product->product->title }} </div>
                                <div class="text-xs text-gray-600"> IVA Incluido </div>

                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-semibold text-gray-900">
                                        {{ $product->quantity }} x {{ number_format($product->price, 2, '.', ',' ) }} $
                                    </span>
                                    <span class="font-bold text-gray-900 text-xl">
                                        @php
                                            $totalItem = $product->quantity*$product->price;
                                            $price = number_format($totalItem, 2, '.', ',');
                                        @endphp
                                        {{ $price }} $
                                    </span>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>

            </x-slot>
            <x-slot name="footer">
                <div class="flex justify-between items-center">
                    <strong class="text-gray-900 text-lg">
                        TOTAL
                    </strong>
                    <strong class="text-lg text-gray-900">
                        {{ number_format($purchase->amount, 2, '.', ',' ) }} $USD
                    </strong>
                </div>
                @if ($purchase->buyer_status == 'cancelled')
                    <small class="text-xs text-red-800 font-semibold mt-1">Cancelaste la venta.</small>
                @elseif($purchase->seller_status == 'cancelled')
                    <small class="text-xs text-red-800 font-semibold mt-1">El vendedor cancelo la venta.</small>
                @endif

                @if ($purchase->buyer_status == 'active' && $purchase->status != 'cancelled')
                    <div class="mt-4">
                        <button class="w-full rounded-md shadow py-2 text-md bg-green-500 text-white" wire:click="setConfirmPurchase( {{ $purchase }} )">Ya recibí los productos</button>
                    </div>
                    @if ($purchase->seller_status == 'delivered' || $purchase->seller_status == 'qualify')
                        <small class="text-xs text-gray-600 font-semibold mt-1">El vendedor dice que ya entrego los productos</small>
                    @endif
                @elseif($purchase->buyer_status == 'received')
                    <div class="mt-4">
                        <button class="w-full rounded-md shadow py-2 text-md bg-yellow-500 text-white" wire:click="setRatingPurchase( {{ $purchase }} )" onclick="resetRatingStorage()">Calificar al vendedor</button>
                    </div>
                    @if ($purchase->seller_status == 'qualify')
                        <small class="text-xs text-gray-600 font-semibold mt-1">El vendedor ya te calificó</small>
                    @endif
                @elseif ( $purchase->buyer_status == 'qualify' )
                    <div class="mt-4">
                        <button class="w-full rounded-md shadow py-2 text-md bg-blue-500 text-white" wire:click="$set('modalCalificaciones', 'true')">Ver calificación</button>
                    </div>
                    @if ($purchase->seller_status == 'delivered')
                        <small class="text-xs text-gray-600 font-semibold mt-1">El vendedor no te ha calificado aún.</small>
                    @endif
                @endif

            </x-slot>
        </x-jet-dialog-modal>
    @endif

    @if ($modalCancelPurchase)
        <x-jet-dialog-modal wire:model="modalCancelPurchase">
            <x-slot name="title">

                <div class="grid grid-cols-5 py-3">
                    <h5 class="col-span-4 text-xl font-bold text-red-600">Cancelar compra</h5>
                    <span class="justify-self-end">
                        <svg class="cursor-pointer" width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg" wire:click="cancel">
                            <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" fill="black"/>
                        </svg>
                    </span>
                </div>

            </x-slot>

            <x-slot name="content">

                <div class="flex py-1">
                    <h6 class="text-lg font-semibold text-gray-700">¿Seguro que deseas cancelar la compra?</h6>
                </div>

            </x-slot>
            <x-slot name="footer">

                <div class="grid grid-cols-5 gap-1 mt-8">
                    <span class="col-span-2 rounded-md py-1 cursor-pointer text-center"  wire:click="cancel()">
                        Volver
                    </span>
                    <button type="submit" class="col-span-3 bg-red-500 text-white rounded-md py-1" wire:click="cancelledOrder({{ $purchase }})">
                        Confirmar
                    </button>
                </div>

            </x-slot>
        </x-jet-dialog-modal>
    @endif

    @if ($modalConfirmPurchase)
        <div class="fixed z-40 inset-0 overflow-y-auto ease-out duration-400">

            <div class="flex md:items-end justify-center md:pt-4 md:px-4 pb-20 text-center sm:block sm:p-0">

            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

            <div class="max-w-7xl w-full lg:max-w-4xl inline-block align-bottom md:rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle bg-gray-100" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                <div class="grid grid-cols-5 px-3 py-5">
                    <h5 class="col-span-4 text-xl font-bold text-gray-900">Confirmar venta</h5>
                    <span class="justify-self-end">
                        <svg class="cursor-pointer" width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg" wire:click="cancel()">
                            <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" fill="black"/>
                        </svg>
                    </span>
                </div>

                <div class="flex px-4 py-3">
                    <input class="self-center mr-3 h-6 w-6 cursor-pointer" type="checkbox" name="" id="confirmPurchase">
                    <label class="cursor-pointer" for="confirmPurchase">Afirmo haber recibido los productos de esta compra</label>
                </div>

                <div class="mt-4 px-4 mb-6">
                    <button class="w-full rounded-md shadow py-2 text-md bg-gray-300 text-black block" id="disabledButtonConfirmPurchase">Cancelar</button>
                    <button class="w-full rounded-md shadow py-2 text-md bg-green-500 text-white hidden" id="ableButtonConfirmPurchase" wire:click="confirmPurchase()" onclick="resetRatingStorage()">Confirmar</button>
                </div>

            </div>
            </div>
        </div>

        {{-- script para ocultar o mostrar el boton de confirmar entrega de productos --}}
        <script>
            const confirmPurchase = document.getElementById('confirmPurchase');
            const disabledButtonConfirmPurchase = document.getElementById('disabledButtonConfirmPurchase');
            const ableButtonConfirmPurchase = document.getElementById('ableButtonConfirmPurchase');


            confirmPurchase.addEventListener('change', event => {
                if(event.target.checked){
                    disabledButtonConfirmPurchase.classList.replace("block","hidden");
                    ableButtonConfirmPurchase.classList.replace("hidden","block");
                } else{
                    disabledButtonConfirmPurchase.classList.replace("hidden","block");
                    ableButtonConfirmPurchase.classList.replace("block","hidden");
                }
            })
        </script>
    @endif

    @if ($modalRating)
        <div class="fixed z-40 inset-0 overflow-y-auto ease-out duration-400">

            <div class="flex md:items-end justify-center md:pt-4 md:px-4 pb-20 text-center sm:block sm:p-0">

                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

                <div class="max-w-7xl w-full lg:max-w-4xl inline-block align-bottom md:rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle bg-gray-100" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                    <div class="grid grid-cols-5 px-3 py-5">
                        <h5 class="col-span-4 text-xl font-bold text-gray-900">Calificar al vendedor</h5>
                        <span class="justify-self-end">
                            <svg class="cursor-pointer" width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg" wire:click="cancel()" id="closeButtonModalRating">
                                <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" fill="black"/>
                            </svg>
                        </span>
                    </div>

                    <div class="px-4 py-3">
                        <div class="text-lg font-semibold text-gray-900">
                            ¿Como calificarías tu experiencia con esta tienda?
                        </div>
                        <div class="block text-center w-full mt-3" id="rootContainerStars">
                            <svg class="inline h-10 w-10 cursor-pointer star" id="star1" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                            <svg class="inline h-10 w-10 cursor-pointer star" id="star2" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                            <svg class="inline h-10 w-10 cursor-pointer star" id="star3" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                            <svg class="inline h-10 w-10 cursor-pointer star" id="star4" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                            <svg class="inline h-10 w-10 cursor-pointer star" id="star5" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                        </div>
                    </div>

                    <span hidden>
                        <svg class="inline h-10 w-10 fill-current text-gray-700 cursor-pointer star" id="star_empty" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg" fill="#faf"><path d="M20 7.24L12.81 6.62L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27L16.18 19L14.55 11.97L20 7.24ZM10 13.4L6.24 15.67L7.24 11.39L3.92 8.51L8.3 8.13L10 4.1L11.71 8.14L16.09 8.52L12.77 11.4L13.77 15.68L10 13.4Z"/></svg>
                    </span>
                    <span hidden>
                        <svg class="inline h-10 w-10 fill-current text-green-450 cursor-pointer star_full" id="star_full" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M10 15.27L16.18 19L14.54 11.97L20 7.24L12.81 6.63L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27Z"/></svg>
                    </span>


                    <div class="px-4 py-3">
                        <div class="text-md text-gray-900">
                            Cuéntanos más sobre la tienda
                        </div>
                        <div class="block text-center w-full mt-3">
                            <textarea class="w-full rounded-md shadow text-sm text-gray-800" rows="5" maxlength="255" id="comment"></textarea>
                        </div>
                        <span hidden id="csrf_token">{{ csrf_token() }}</span>
                        <span hidden id="brand_id">{{ $purchaseToRating->brand_id }}</span>
                        <span hidden id="user_id">{{ $purchaseToRating->user_id }}</span>
                        <span hidden id="order_id">{{ $purchaseToRating->id }}</span>
                    </div>

                    <div class="mt-4 px-4 mb-6">
                        <button class="w-full rounded-md shadow py-2 mb-3 text-md bg-green-500 text-white" id="confirmarRating">Confirmar</button>
                        <button class="w-full rounded-md shadow py-2 text-md bg-white text-red-600" wire:click="cancel()">Calificar más tarde</button>
                    </div>

                </div>
            </div>
                {{-- Script para seleccionar las estrella de la calificacion --}}
                <script>

                    const stars = document.querySelectorAll('.star');

                    // Se rellena de Verde la estrella al hacer hover sobre ella
                    stars.forEach(star => {
                        star.addEventListener('mouseover', event => {
                            const item = event.target;
                            if ( event.target.nodeName == 'path' ){
                                var svgStar = item.parentNode;
                            }else{
                                var svgStar = item;
                            }

                            // debo rellenar de verde todas las estrellas anteriores a la actual
                            const rootContainer = svgStar.parentNode;

                            const svgChildren = rootContainer.querySelectorAll('svg');

                            for (let index = 0; index < svgChildren.length; index++) {
                                if (svgChildren.item(index) == svgStar) {
                                    svgChildren.item(index).children.item(0).setAttribute("fill", "#2BCB00");
                                    svgChildren.item(index).children.item(1).setAttribute("fill", "#2BCB00");
                                    break;
                                }else{
                                    svgChildren.item(index).children.item(0).setAttribute("fill", "#2BCB00");
                                    svgChildren.item(index).children.item(1).setAttribute("fill", "#2BCB00");
                                }

                            }

                        })
                    })

                    // Se quita el relleno de Verde de la estrella al dejar de hacer hover sobre ella
                    stars.forEach(star => {
                        star.addEventListener('mouseout', event => {
                            const item = event.target;
                            if ( event.target.nodeName == 'path' ){
                                var svgStar = item.parentNode;
                            }else{
                                var svgStar = item;
                            }

                            //obtengo la estrella seleccionada
                            let starSelected = localStorage.getItem('starSelected');
                            // Veo si ya se selecciono una estrella via local storage
                            // en caso de no ser asi, regreso todas las estrellas a sus colores normales
                            if (starSelected !== null) {
                                // Paso a formato JSON el string que obtuve del local Storage
                                const jsonStarSelected = JSON.parse(starSelected);

                                // Ahora Dejo visibles solo las estrellas que se selccionaron

                                const containerStars = document.getElementById('rootContainerStars');
                                const svgChildren = containerStars.querySelectorAll('svg');

                                let band = 0;

                                for (let index = 0; index < svgChildren.length; index++) {

                                    if( band == 1 ){

                                        svgChildren.item(index).children.item(0).setAttribute("fill", "#fff");
                                        svgChildren.item(index).children.item(1).setAttribute("fill", "#6B7280");

                                    }

                                    if (svgChildren.item(index).id == jsonStarSelected.star) {
                                        band = 1;
                                    }

                                }

                            }else{

                                // Oculto todas las estrellas
                                // debo rellenar de verde todas las estrellas anteriores a la actual
                                const rootContainer = svgStar.parentNode;

                                const svgChildren = rootContainer.querySelectorAll('svg');

                                for (let index = 0; index < svgChildren.length; index++) {
                                        svgChildren.item(index).children.item(0).setAttribute("fill", "#fff");
                                        svgChildren.item(index).children.item(1).setAttribute("fill", "#6B7280");

                                }

                            }

                        })
                    })

                    // Guardo en Local Storage la estrella seleccionada
                    stars.forEach(star => {
                        star.addEventListener('click', event => {
                            const item = event.target;
                            if ( event.target.nodeName == 'path' ){
                                var svgStar = item.parentNode;
                            }else{
                                var svgStar = item;
                            }

                            let starSelected = {
                                star: svgStar.id
                            };
                            // Almaceno el producto en el localStorage
                            localStorage.setItem('starSelected',JSON.stringify(starSelected));

                        })
                    })

                </script>
                {{-- Script para enviar la calificacion --}}
                <script>
                    const confirmarRating = document.getElementById('confirmarRating');
                    confirmarRating.addEventListener('click', event => {
                        const csrf_token = document.getElementById('csrf_token').textContent;
                        // //obtengo la estrella seleccionada
                        const starSelected = localStorage.getItem('starSelected');
                        // Paso a formato JSON el string que obtuve del local Storage
                        const jsonStarSelected = JSON.parse(starSelected);

                        const star = jsonStarSelected.star;

                        const rating = star.charAt(star.length - 1);

                        const comment = document.getElementById('comment').value;

                        const brand_id = document.getElementById('brand_id').textContent;
                        const user_id = document.getElementById('user_id').textContent;
                        const order_id = document.getElementById('order_id').textContent;

                        const data = {
                                rating: rating,
                                comment: comment,
                                brand_id: brand_id,
                                user_id: user_id,
                                order_id: order_id
                            };

                        axios({
                                method  : 'post',
                                url : '/post/rating-buyer',
                                data : data,
                                headers: {
                                    'content-type': 'text/json',
                                    'X-CSRF-Token': csrf_token
                                    }
                            })
                            .then((res)=>{
                                if(res.data === 'success'){
                                    localStorage.removeItem('starSelected');
                                    const closeButtonModalRating = document.getElementById('closeButtonModalRating');
                                    let click_event = new CustomEvent('click');
                                    closeButtonModalRating.dispatchEvent(click_event);

                                    // Alert de notificacion
                                    const notificationAlert = document.getElementById('notificationAlert');
                                    notificationAlert.style.display = 'block';
                                    setTimeout(function(){
                                        notificationAlert.style.display = 'none';
                                    }, 5000);
                                }
                            })
                            .catch((err) => {console.log(err)});

                    })

                </script>
        </div>
    @endif

    @if ($modalCalificaciones)
        <x-jet-dialog-modal wire:model="modalCalificaciones">
            <x-slot name="title">

                <div class="grid grid-cols-5 py-3">
                    <h5 class="col-span-4 text-xl font-bold text-gray-900">Detalles de la calificación</h5>
                    <span class="justify-self-end">
                        <svg class="cursor-pointer" width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg" wire:click="$set('modalCalificaciones', false)">
                            <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" fill="black"/>
                        </svg>
                    </span>
                </div>

            </x-slot>

            <x-slot name="content">

                <div class="rounded-md shadow bg-gray-100 p-3">

                    <span class="font-semibold text-lg text-gray-900">
                        Tu calificación
                    </span>
                    <div class="my-3 text-center">
                        @switch($purchase->ratingBuyer->rating)
                            @case(1)
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>

                                @break
                            @case(2)
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>

                                @break
                            @case(3)
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                                @break
                            @case(4)
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                                @break
                            @default
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>

                        @endswitch
                    </div>
                    <div class="text-gray-700 text-md text-center">
                        {{ $purchase->ratingBuyer->comment }}
                    </div>

                    <div class="text-gray-600 text-xs text-right mt-3">
                        {{ $purchase->ratingBuyer->created_at->diffForHumans() }}
                    </div>

                </div>

                @if ($purchase->ratingSeller)

                    <div class="rounded-md shadow bg-gray-100 p-4 mt-4">
                        <span class="font-semibold text-lg text-gray-900">
                            La calificación del vendedor
                        </span>
                        <div class="text-center font-bold text-lg">
                            {{ $purchase->ratingSeller->brand->brand }}
                        </div>
                        <div class="my-3 text-center">
                            @switch($purchase->ratingSeller->rating)
                                @case(1)
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                                </svg>
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                                </svg>
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                                </svg>
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                                </svg>

                                    @break
                                @case(2)
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                                </svg>
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                                </svg>
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                                </svg>

                                    @break
                                @case(3)
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                                </svg>
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                                </svg>
                                    @break
                                @case(4)
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                                </svg>
                                    @break
                                @default
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>

                            @endswitch
                        </div>
                        <div class="text-gray-700 text-md text-center">
                            {{ $purchase->ratingSeller->comment }}
                        </div>
                        <div class="text-gray-600 text-xs text-right mt-3">
                            {{ $purchase->created_at->diffForHumans() }}
                        </div>

                    </div>

                @else
                    <div class="text-center text-lg font-bold mt-4">
                        El vendedor aun no te ha calificado.
                    </div>
                @endif


            </x-slot>
            <x-slot name="footer">

                <div class="grid grid-cols-1 gap-1 mt-8">
                    <button type="submit" class="col-span-1 bg-green-500 text-white rounded-md py-2" wire:click="$set('modalCalificaciones', false)">
                        Listo
                    </button>
                </div>

            </x-slot>
        </x-jet-dialog-modal>
    @endif

    <script>
        function resetRatingStorage(){
            localStorage.removeItem('starSelected');
        }
    </script>


    {{-- Modal de compra exitosa --}}
    @isset ( $new_order )
        <div class="fixed z-40 inset-0 overflow-y-auto ease-out duration-400"  id="modalSuccessPurchase">

            <div class="flex md:items-end justify-center md:pt-4 md:px-4 pb-20 text-center sm:block sm:p-0">

            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

            <div class="max-w-7xl w-full lg:max-w-4xl inline-block align-bottom md:rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle bg-gray-100" role="dialog" aria-modal="true" aria-labelledby="modal-headline" id="contentModalSuccessPurchase">

                <div class="grid grid-cols-5 px-3 py-5">
                    <h5 class="col-span-4 text-xl font-bold text-gray-900"></h5>
                    <span class="justify-self-end">
                        <svg class="cursor-pointer" width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg" id="closeModalSuccessPurchase">
                            <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" fill="black"/>
                        </svg>
                    </span>
                </div>


                    <div class="bg-gray-100 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                        <div class="text-center" id="sinProdcutos">
                            <span class="text-xl font-semibold">¡Haz realizado una compra exitosamente!</span>
                            <div class="text-center">
                                <img class="mx-auto" width="50%" src="{{ asset('purchase_success.svg') }}" alt="carrito vacio">
                            </div>
                            {{-- Finalizar compra en WS --}}
                            <div class="mt-3 mb-5">
                                <a class="py-2 bg-green-500 text-white px-4 md:px-10 rounded-full shadow-md" href="https://api.whatsapp.com/send?phone={{ $new_order->brand->user->phone }}&text=Compra realizada en *Kabasto.com*%0A%0A*{{ $new_order->user->name }}*%0A%0A*{{ $new_order->user->email }}*" target="_blank" aria-label="compartir en whatsapp">
                                    <svg class="inline" width="20px" heigth="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                    <g>	<g>
                                            <path fill="#fff" d="M440.164,71.836C393.84,25.511,332.249,0,266.737,0S139.633,25.511,93.308,71.836S21.473,179.751,21.473,245.263
                                                c0,41.499,10.505,82.279,30.445,118.402L0,512l148.333-51.917c36.124,19.938,76.904,30.444,118.403,30.444
                                                c65.512,0,127.104-25.512,173.427-71.836C486.488,372.367,512,310.776,512,245.263S486.488,118.16,440.164,71.836z
                                                M266.737,460.495c-38.497,0-76.282-10.296-109.267-29.776l-6.009-3.549L48.952,463.047l35.878-102.508l-3.549-6.009
                                                c-19.479-32.985-29.775-70.769-29.775-109.266c0-118.679,96.553-215.231,215.231-215.231s215.231,96.553,215.231,215.231
                                                C481.968,363.943,385.415,460.495,266.737,460.495z"/>
                                        </g></g><g>	<g>
                                            <path fill="#fff" d="M398.601,304.521l-35.392-35.393c-11.709-11.71-30.762-11.71-42.473,0l-13.538,13.538
                                                c-32.877-17.834-60.031-44.988-77.866-77.865l13.538-13.539c5.673-5.672,8.796-13.214,8.796-21.236
                                                c0-8.022-3.124-15.564-8.796-21.236l-35.393-35.393c-5.672-5.672-13.214-8.796-21.236-8.796c-8.023,0-15.564,3.124-21.236,8.796
                                                l-28.314,28.314c-15.98,15.98-16.732,43.563-2.117,77.664c12.768,29.791,36.145,62.543,65.825,92.223
                                                c29.68,29.68,62.432,53.057,92.223,65.825c16.254,6.965,31.022,10.44,43.763,10.44c13.992,0,25.538-4.193,33.901-12.557
                                                l28.314-28.314c5.673-5.672,8.796-13.214,8.796-21.236S404.273,310.193,398.601,304.521z M349.052,354.072
                                                c-6.321,6.32-23.827,4.651-44.599-4.252c-26.362-11.298-55.775-32.414-82.818-59.457c-27.043-27.043-48.158-56.455-59.457-82.818
                                                c-8.903-20.772-10.571-38.278-4.252-44.599l28.315-28.314l35.393,35.393l-28.719,28.719l4.53,9.563
                                                c22.022,46.49,59.753,84.221,106.244,106.244l9.563,4.53l28.719-28.719l35.393,35.393L349.052,354.072z"/>
                                        </g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                                    <span class="self-center ml-2 md:text-lg">Finalizar compra en Whatsapp</span>
                                </a>
                            </div>
                            {{-- Detalles de la compra --}}
                            <div class="mt-2 mb-5">
                                <button class="py-2 text-green-600 px-10 rounded-full shadow-md" {{-- wire:click="seeDetailsPurchase({{ $new_order->id }})" --}}>
                                    Ver detalles de la compra
                                </button>
                            </div>
                        </div>

                    </div>

            </div>
            </div>
        </div>
        {{-- Ocultar el modal de compra exitosta --}}
        <script>
            const modalSuccessPurchase = document.getElementById('modalSuccessPurchase');
            const closeModalSuccessPurchase = document.getElementById('closeModalSuccessPurchase');

            closeModalSuccessPurchase.addEventListener('click', event => {

                modalSuccessPurchase.style.display = 'none';

            })
            // al dar click fuera del modal
            window.addEventListener("DOMContentLoaded", () => {

                window.addEventListener("click", (e) => {
                    const contentModalSuccessPurchase = document.getElementById('contentModalSuccessPurchase');
                    if(!contentModalSuccessPurchase.contains(e.target)){
                        modalSuccessPurchase.style.display = "none";
                    }
                });

            });

        </script>
    @endisset



    @include('common.alert')
</div>

