    {{-- Modal detalles de venta --}}
    @if ($modalDetailSales)
        <x-jet-dialog-modal wire:model="modalDetailSales">
            <x-slot name="title">
                <div class="flex items-center justify-between py-2">
                    <span class="text-sm text-gray-600 font-light">
                        {{ ucwords($sale->created_at->format('l')) }}
                        {{ $sale->created_at->format("j \d\\e") }}
                        {{ ucwords($sale->created_at->format('F,')) }}
                        {{ $sale->created_at->format("Y. g:i a") }}
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
                    @switch($sale->status)

                        @case('active')
                            <span class="text-xs font-light text-white bg-blue-450 px-4 py-1 rounded-full shadow-sm"> Activa </span>
                            @break
                        @case('received')
                            <span class="text-xs font-light text-white bg-blue-450 px-4 py-1 rounded-full shadow-sm"> Activa </span>
                            @break
                        @case('delivered')
                            <span class="text-xs font-light text-white bg-yellow-500 px-4 py-1 rounded-full shadow-sm"> Entregada </span>
                            @break
                        @case('completed')
                            <span class="text-xs font-light text-white bg-green-450 px-4 py-1 rounded-full shadow-sm"> Confirmada </span>
                            @break
                        @case('cancelled')
                            <span class="text-xs font-light text-white bg-red-450 px-4 py-1 rounded-full shadow-sm"> Cancelada </span>
                            @break
                        @default

                    @endswitch
                </div>

                {{-- Brand card --}}
                <div class="grid grid-cols-5 gap-1 my-3 shadow rounded-lg py-2 bg-white">
                    <div class="col-span-1 self-center mx-auto">
                        @if ( $order->user->profile_photo_path_brand )
                            <div class="bg-no-repeat bg-cover bg-center w-12 h-12 md:w-16 md:h-16 overflow-hidden rounded-full mx-auto" style="background-image: url('/storage/{{ $order->user->profile_photo_path_brand }}');"></div>
                        @else
                        <svg class="fill-current text-gray-600 h-12 w-12 md:w-16 md:h-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg>
                        @endif
                    </div>
                    <div class="col-span-4 flex flex-col">
                        <span class="text-md text-gray-900 font-semibold"> {{ $sale->user->name }}</span>
                        <div class="text-sm text-gray-700 font-light">{{ $sale->user->name }}</div>
                        <span class="text-xs font-light text-gray-900"> {{ $sale->user->email }} / {{ $sale->user->phone }} </span>
                        {{-- <div class="flex">
                            <svg class="inline h-4 w-4" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M10 15.27L16.18 19L14.54 11.97L20 7.24L12.81 6.63L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27Z" fill="#34BA00"/></svg>
                            <svg class="inline h-4 w-4" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M10 15.27L16.18 19L14.54 11.97L20 7.24L12.81 6.63L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27Z" fill="#34BA00"/></svg>
                            <svg class="inline h-4 w-4" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M10 15.27L16.18 19L14.54 11.97L20 7.24L12.81 6.63L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27Z" fill="#34BA00"/></svg>
                            <svg class="inline h-4 w-4" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M20 7.24L12.81 6.62L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27L16.18 19L14.55 11.97L20 7.24ZM10 13.4V4.1L11.71 8.14L16.09 8.52L12.77 11.4L13.77 15.68L10 13.4Z" fill="#34BA00"/></svg>
                            <svg class="inline h-4 w-4" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M20 7.24L12.81 6.62L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27L16.18 19L14.55 11.97L20 7.24ZM10 13.4L6.24 15.67L7.24 11.39L3.92 8.51L8.3 8.13L10 4.1L11.71 8.14L16.09 8.52L12.77 11.4L13.77 15.68L10 13.4Z" fill="#34BA00"/></svg>
                        </div> --}}
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
                            <div class="col-span-4 flex flex-col">
                                <div class="text-lg text-gray-900 font-semibold"> {{ $product->product->title }} </div>
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
                        {{ number_format($sale->amount, 2, '.', ',' ) }} $USD
                    </strong>
                </div>
                @if ($sale->seller_status == 'cancelled')
                    <small class="text-xs text-red-800 font-semibold mt-1">Cancelaste la venta.</small>
                @elseif($sale->buyer_status == 'cancelled')
                    <small class="text-xs text-red-800 font-semibold mt-1">El comprador cancelo la venta.</small>
                @endif

                @if ($sale->seller_status == 'active' )
                    <div class="mt-4">
                        <button class="w-full rounded-md shadow py-2 text-md bg-green-500 text-white" wire:click="setConfirmSale( {{ $sale }} )">Ya entregue los productos</button>
                    </div>
                    @if ($sale->buyer_status == 'received' || $sale->buyer_status == 'qualify')
                        <small class="text-xs text-gray-600 font-semibold mt-1">El comprador dice que ya recibio los productos.</small>
                    @endif
                @elseif($sale->seller_status == 'delivered')
                    <div class="mt-4">
                        <button class="w-full rounded-md shadow py-2 text-md bg-yellow-500 text-white" wire:click="setRatingSale( {{ $sale }} )" onclick="resetRatingStorage()">Calificar al cliente</button>
                    </div>
                    @if ($sale->buyer_status == 'qualify')
                        <small class="text-xs text-gray-600 font-semibold mt-1">El comprador ya te calificó.</small>
                    @endif
                @elseif($sale->seller_status == 'qualify')
                    <div class="mt-4">
                        <button class="w-full rounded-md shadow py-2 text-md bg-blue-500 text-white" wire:click="$set('modalCalificaciones', true)">Ver calificación</button>
                    </div>
                    @if ($sale->buyer_status == 'received')
                        <small class="text-xs text-gray-600 font-semibold mt-1">El comprador no te ha calificado aún.</small>
                    @endif
                @endif

            </x-slot>
        </x-jet-dialog-modal>
    @endif

    {{-- Modal para cancelar la venta --}}
    @if ($modalCancelSales)
        <x-jet-dialog-modal wire:model="modalCancelSales">
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
                    <button type="submit" class="col-span-3 bg-red-500 text-white rounded-md py-1" wire:click="cancelledOrder({{ $order }})">
                        Confirmar
                    </button>
                </div>

            </x-slot>
        </x-jet-dialog-modal>
    @endif

    {{-- Modal Para confirmar recepcion de los productos --}}
    @if ($modalConfirmSale)
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
                    <input class="self-center mr-3 h-6 w-6 cursor-pointer" type="checkbox" name="" id="confirmSale">
                    <label class="cursor-pointer" for="confirmSale">Afirmo haber entregado los productos de esta venta</label>
                </div>

                <div class="mt-4 px-4 mb-6">
                    <button class="w-full rounded-md shadow py-2 text-md bg-gray-300 text-black block" id="disabledButtonConfirmSale">Cancelar</button>
                    <button class="w-full rounded-md shadow py-2 text-md bg-green-500 text-white hidden" id="ableButtonConfirmSale" wire:click="confirmSale()" onclick="resetRatingStorage()">Confirmar</button>
                </div>

            </div>
            </div>
        </div>

        {{-- script para ocultar o mostrar el boton de confirmar entrega de productos --}}
        <script>
            const confirmSale = document.getElementById('confirmSale');
            const disabledButtonConfirmSale = document.getElementById('disabledButtonConfirmSale');
            const ableButtonConfirmSale = document.getElementById('ableButtonConfirmSale');


            confirmSale.addEventListener('change', event => {
                if(event.target.checked){
                    disabledButtonConfirmSale.classList.replace("block","hidden");
                    ableButtonConfirmSale.classList.replace("hidden","block");
                } else{
                    disabledButtonConfirmSale.classList.replace("hidden","block");
                    ableButtonConfirmSale.classList.replace("block","hidden");
                }
            })
        </script>
    @endif

    {{-- Modal para calificar la venta --}}
    @if ($modalRating)
        <div class="fixed z-40 inset-0 overflow-y-auto ease-out duration-400">

            <div class="flex md:items-end justify-center md:pt-4 md:px-4 pb-20 text-center sm:block sm:p-0">

            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

            <div class="max-w-7xl w-full lg:max-w-4xl inline-block align-bottom md:rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle bg-gray-100" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                <div class="grid grid-cols-5 px-3 py-5">
                    <h5 class="col-span-4 text-xl font-bold text-gray-900">Calificar al cliente</h5>
                    <span class="justify-self-end">
                        <svg class="cursor-pointer" width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg" wire:click="cancel()" id="closeButtonModalRating">
                            <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" fill="black"/>
                        </svg>
                    </span>
                </div>

                <div class="px-4 py-3">
                    <div class="text-lg font-semibold text-gray-900">
                        ¿Como calificarías tu experiencia con este cliente?
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
                        Cuéntanos más sobre el cliente
                    </div>
                    <div class="block text-center w-full mt-3">
                        <textarea class="w-full rounded-md shadow text-sm text-gray-800" rows="5" maxlength="255" id="comment"></textarea>
                    </div>
                    <span hidden id="csrf_token">{{ csrf_token() }}</span>
                    <span hidden id="brand_id">{{ $saleToRating->brand_id }}</span>
                    <span hidden id="user_id">{{ $saleToRating->user_id }}</span>
                    <span hidden id="order_id">{{ $saleToRating->id }}</span>
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
                        url : '/post/rating-seller/',
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

    {{-- Modal para ver las calificaciones de la venta --}}
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
                        @switch($sale->ratingSeller->rating)
                            @case(1)
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>

                                @break
                            @case(2)
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>

                                @break
                            @case(3)
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                                @break
                            @case(4)
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                            </svg>
                                @break
                            @default
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>
                            <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                            </svg>

                        @endswitch
                    </div>
                    <div class="text-gray-700 text-md text-center">
                        {{ $sale->ratingSeller->comment }}
                    </div>

                </div>

                @if ($sale->ratingBuyer)

                    <div class="rounded-md shadow bg-gray-100 p-4 mt-4">
                        <span class="font-semibold text-lg text-gray-900">
                            La calificación de tu cliente
                        </span>
                        <div class="text-center font-bold text-lg">
                            {{ $sale->ratingBuyer->user->name }}
                        </div>
                        <div class="my-3 text-center">
                            @switch($sale->ratingBuyer->rating)
                                @case(1)
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                                </svg>
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                                </svg>
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                                </svg>
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                                </svg>

                                    @break
                                @case(2)
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                                </svg>
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                                </svg>
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                                </svg>

                                    @break
                                @case(3)
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                                </svg>
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                                </svg>
                                    @break
                                @case(4)
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#fff"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#6B7280"/>
                                </svg>
                                    @break
                                @default
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>
                                <svg class="inline h-8 w-8 cursor-pointer star" viewBox="0 0 50 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 21.8611L32.7495 21.2446L29.227 20.9511L27.8474 17.6928L25 11L22.1526 17.6928L20.773 20.9511L17.2505 21.2446L10 21.8611L15.5186 26.6458L18.1898 28.9648L17.3973 32.3992L15.7241 39.5029L21.9765 35.7456L25 33.8963L28.0235 35.7456L34.2759 39.5029L32.6027 32.3992L31.8102 28.9648L34.4814 26.6458L40 21.8611Z" fill="#2BCB00"/>
                                    <path d="M50 18.1L32.025 16.575L25 0L17.975 16.575L0 18.1L13.65 29.925L9.55 47.5L25 38.175L40.45 47.5L36.35 29.925L50 18.1ZM31.475 31.05L32.875 37.075L27.575 33.875L25 32.325L22.425 33.875L17.125 37.075L18.525 31.05L19.2 28.1L16.925 26.125L12.225 22.05L18.4 21.525L21.4 21.275L22.575 18.5L25 12.825L27.425 18.55L28.6 21.325L31.6 21.575L37.775 22.1L33.075 26.175L30.8 28.15L31.475 31.05V31.05Z" fill="#2BCB00"/>
                                </svg>

                            @endswitch
                        </div>
                        <div class="text-gray-700 text-md text-center">
                            {{ $sale->ratingBuyer->comment }}
                        </div>

                    </div>

                @else
                    <div class="text-center text-lg font-bold mt-4">
                        El cliente aun no te ha calificado.
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


