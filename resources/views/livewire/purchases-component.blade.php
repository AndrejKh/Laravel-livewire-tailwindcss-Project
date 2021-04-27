<div>
        <div class="grid grid-cols-3 gap-1 mt-3 mb-4">
            <span class="col-span-2 self-center">Todas tus compras</span>
            <select class="col-span-1 text-xs md:text-sm bg-white rounded-md shadow-md border-0 py-auto w-full" wire:model="status">
                <option value="">Todas</option>
                <option value="active">Activas</option>
                <option value="cancelled">Canceladas</option>
            </select>
        </div>

    <div class="grid grid-cols-1 gap-2 px-2">

        @foreach ($orders as $order)

            @include('compras.card_compra')

        @endforeach

    </div>

    {{-- Modal detalles de compra --}}
    @if ($modalDetailPurchase)
        <x-jet-dialog-modal wire:model="modalDetailPurchase">
            <x-slot name="title">
                <div class="flex items-center justify-between py-2">
                    <span class="text-sm text-gray-600 font-light">{{ $order->created_at->format("F j, Y, g:i a") }}</span>
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
                    @switch($order->status)

                        @case('active')
                            <span class="text-xs font-light text-white bg-green-450 px-3 py-1 rounded-full shadow-sm"> Activa </span>
                            @break
                        @case('cancelled')
                            <span class="text-xs font-light text-white bg-red-450 px-3 py-1 rounded-full shadow-sm"> Cancelada </span>
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
                        <a class="text-md text-gray-900 font-semibold" href="{{route('tiendas.details.show', [$brand->slug, $brand->user_id])}}"> {{ $brand->brand }}</a>
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
                        {{ number_format($order->amount, 2, '.', ',' ) }} $USD
                    </strong>

                </div>

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
                    <button type="submit" class="col-span-3 bg-red-500 text-white rounded-md py-1" wire:click="cancelledOrder({{ $order }})">
                        Confirmar
                    </button>
                </div>

            </x-slot>
        </x-jet-dialog-modal>
    @endif
    @include('common.alert')
</div>
