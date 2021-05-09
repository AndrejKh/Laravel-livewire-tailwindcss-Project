<div class=" w-full mt-3 lg:mt-5">
    @if ( $brand )
    <div class="w-full shadow-md rounded-lg p-2 md:p-3 lg:p-6 bg-white">
        <div class="flex mb-2 align-self justify-between">
            <h2 class="font-bold text-lg">
                <svg class="inline w-7 h-7" viewBox="0 0 31 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.6585 5.07317C21.0537 5.07317 22.1951 3.93171 22.1951 2.53659C22.1951 1.14146 21.0537 0 19.6585 0C18.2634 0 17.122 1.14146 17.122 2.53659C17.122 3.93171 18.2634 5.07317 19.6585 5.07317ZM6.34146 13.3171C2.79024 13.3171 0 16.1073 0 19.6585C0 23.2098 2.79024 26 6.34146 26C9.89268 26 12.6829 23.2098 12.6829 19.6585C12.6829 16.1073 9.89268 13.3171 6.34146 13.3171ZM6.34146 24.0976C3.93171 24.0976 1.90244 22.0683 1.90244 19.6585C1.90244 17.2488 3.93171 15.2195 6.34146 15.2195C8.75122 15.2195 10.7805 17.2488 10.7805 19.6585C10.7805 22.0683 8.75122 24.0976 6.34146 24.0976ZM13.6976 11.4146L16.7415 8.37073L17.7561 9.38536C19.0878 10.7171 20.6859 11.6429 22.6517 11.9473C23.4127 12.0615 24.0976 11.4527 24.0976 10.679C24.0976 10.0576 23.641 9.53756 23.0195 9.4361C21.6498 9.2078 20.5717 8.53561 19.6585 7.62244L17.2488 5.21268C16.6146 4.69268 15.9805 4.43902 15.2195 4.43902C14.4585 4.43902 14.193 4.36768 13.8125 4.875C13.8125 4.875 11.375 2.4375 10.5625 2.4375C9.75 2.4375 6.5 6.5 7.3125 7.3125C8.125 8.125 9.89268 8.75122 9.89268 8.75122C9.38537 9.25854 9.13171 9.89268 9.13171 10.5268C9.13171 11.2878 9.38537 11.922 9.89268 12.3024L13.9512 15.8537V20.9268C13.9512 21.6244 14.522 22.1951 15.2195 22.1951C15.9171 22.1951 16.4878 21.6244 16.4878 20.9268V15.3463C16.4878 14.6868 16.2341 14.0654 15.7902 13.5961L13.6976 11.4146ZM24.0976 13.3171C20.5463 13.3171 17.7561 16.1073 17.7561 19.6585C17.7561 23.2098 20.5463 26 24.0976 26C27.6488 26 30.439 23.2098 30.439 19.6585C30.439 16.1073 27.6488 13.3171 24.0976 13.3171ZM24.0976 24.0976C21.6878 24.0976 19.6585 22.0683 19.6585 19.6585C19.6585 17.2488 21.6878 15.2195 24.0976 15.2195C26.5073 15.2195 28.5366 17.2488 28.5366 19.6585C28.5366 22.0683 26.5073 24.0976 24.0976 24.0976Z" fill="#42D697"/>
                </svg>
                Zonas de delivery
            </h2>
            @if ( $brand )
                <x-jet-button wire:loading.attr="disabled" wire:click="$set( 'openModal' , true )">
                    Agregar
                </x-jet-button>
            @endif
        </div>
        <hr>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 px-0 py-2 lg:p-2 max-w-7xl">
            @if ( $deliveries && count($deliveries) > 0)
                @foreach ($deliveries as $delivery)
                <div class="col-span-1 shadow-md rounded-xl p-2 md:p-3 bg-gray-50">
                    <div class="grid grid-cols-6">
                        <div class="col-span-4">
                            <div class="text-md md:text-xl">
                                {{$delivery->delivery_zone}}
                            </div>
                            <div class="text-md font-semibold text-gray-500">
                                {{$delivery->state->state}}, {{$delivery->city->city}}
                            </div>
                        </div>
                        <div class="col-span-2 text-right">
                            @if ($delivery->delivery_free == 1)
                                <div class="inline bg-green-450 text-white text-xs md:text-sm rounded-full shadow-sm px-3 py-1">
                                    Delivery gratis
                                </div>
                            @else
                                <div class="inline bg-red-600 text-white text-xs md:text-sm rounded-full shadow-sm px-3 py-1">
                                    X Delivery gratis
                                </div>
                            @endif
                            <div class="text-sm md:text-md flex align-self justify-end my-3" title="Tiempo de delivery">
                                <img class="mr-2" src="{{ asset('/icons/time.svg') }}" alt="">
                                {{$delivery->delivery_time}} Hrs.
                            </div>
                            <div class="text-md md:text-lg font-bold" title="Monto minimo para delivery">
                                {{$delivery->min_amount_purchase}} $USD
                            </div>
                        </div>
                        <div class="col-span-6 flex justify-between mt-2">
                            <div class="text-blue-800 text-sm md:text-md" title="Días que haces delivery">
                                @php
                                    $days = explode(',',$delivery->days);
                                    $array_days = array();
                                    foreach ($days as $day) {
                                        switch ($day) {
                                            case 'lunes':
                                                $array_days[0] = 'Lun';
                                                break;
                                            case 'martes':
                                                $array_days[1] = 'Mar';
                                                break;
                                            case 'miercoles':
                                                $array_days[2] = 'Mie';
                                                break;
                                            case 'jueves':
                                                $array_days[3] = 'Jue';
                                                break;
                                            case 'viernes':
                                                $array_days[4] = 'Vie';
                                                break;
                                            case 'sabado':
                                                $array_days[5] = 'Sab';
                                                break;
                                            default:
                                                array_push($array_days,'Dom');
                                                break;
                                        }
                                    }
                                    ksort($array_days) ;
                                    $days = implode(', ',$array_days);
                                    echo $days;
                                @endphp
                            </div>
                            <div>
                                <button class="inline" wire:loading.attr="disabled" wire:click="buttonActualizarDelivery({{$delivery->id}})">
                                    <img src="{{ asset('/icons/edit.svg') }}" alt="">
                                </button>
                                <button class="inline" wire:loading.attr="disabled" wire:click="destroy({{$delivery}})">
                                    <img src="{{ asset('/icons/delete.svg') }}" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <span class="col-span-2 text-sm text-gray-700">¡Coloca un monto mínimo y ofrece envíos gratis a tus clientes!</span>
            @endif
        </div>
    </div>

    {{--  Modal de agreggar zoande de delivery --}}
    <x-jet-dialog-modal wire:model="openModal">
        <x-slot name="title">
            Agrega una zona de delivery
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-6 gap-4">

                <div class="col-span-2">
                    <x-jet-label class="font-bold" for="state" value="Estado" />
                    <select wire:model="state_id" wire:click="changeState" id="state" autocomplete="state" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm">
                        @foreach ($estados as $estado)
                            <option value="{{$estado->id}}" > {{$estado->state}} </option>
                        @endforeach
                    </select>
                    @error('state_id')
                        <small class="text-red-400 italic">{{$message}}</small>
                    @enderror
                </div>

                <div class="col-span-2">
                    <x-jet-label class="font-bold" for="city" value="Municipio" />
                    <select wire:model="city_id" id="city" autocomplete="city" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm">
                        <option selected>Selecciona el municipio</option>
                        @foreach ($cities as $city)
                            <option value="{{$city->id}}"> {{$city->city}} </option>
                        @endforeach
                    </select>
                    @error('city_id')
                        <small class="text-red-400 italic">{{$message}}</small>
                    @enderror
                </div>

                <div class="col-span-2">
                    <x-jet-label class="font-bold" for="delivery_free" value="¿Haces delivery gratis?" />
                    <select wire:model="delivery_free" id="delivery_free" autocomplete="delivery_free" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm">
                        <option value="">Seleccionar respuesta</option>
                        <option class="text-gray-800" value="0"> No </option>
                        <option class="text-green-500" value="1"> Si </option>
                    </select>
                    @error('delivery_free')
                        <small class="text-red-400 italic">{{$message}}</small>
                    @enderror
                </div>

                <div class="col-span-2 md:col-span-6">
                    <div class="w-full">
                        <x-jet-label class="font-bold" for="delivery_zone" value="Zona de delivery" />
                        <input wire:model.defer="delivery_zone" autocomplete="delivery_zone" type="text" class="flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300" placeholder="Escribe la zona a donde ofreces delivery" required>
                        @error('delivery_zone')
                            <small class="text-red-400 italic">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-span-2 md:col-span-6 mb-0 md:mb-2">
                        <x-jet-label class="font-bold mb-2" value="Selecciona los días en que haces delivery" />
                        @foreach ($days_week as $day)
                            <input class="cursor-pointer" type="checkbox" wire:model="days" value="{{$day->day}}" id="{{$day->day}}">
                            <label class="cursor-pointer mr-1" for="{{ $day->day }}">{{ ucfirst($day->day) }}</label>
                        @endforeach
                        @error('days')
                            <small class="text-red-400 italic">{{$message}}</small>
                        @enderror
                </div>

                <div class="col-span-2 sm:col-span-3">
                    <x-jet-label class="font-bold" for="delivery_time" value="¿En cuanto tiempo haces el delivery?" />
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input wire:model.defer="delivery_time" autocomplete="delivery_time" class="flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300" type="text" placeholder="ej. 48-72" required>
                        <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-red-500 text-sm font-bold" title="Horas">
                            Hrs.
                        </span>
                    </div>
                    @error('delivery_time')
                        <small class="text-red-400 italic">{{$message}}</small>
                    @enderror
                </div>

                <div class="col-span-2 md:col-span-3">
                    <x-jet-label class="font-bold" for="min_amount_purchase" value="¿Cúal es el monto minimo para hacer delivery?" />
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input wire:model.defer="min_amount_purchase" autocomplete="min_amount_purchase" type="number" class="flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300" placeholder="ej. 35" required>
                        <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-green-500 text-sm font-bold" title="Dólares">
                            $USD
                        </span>
                    </div>
                    @error('min_amount_purchase')
                        <small class="text-red-400 italic">{{$message}}</small>
                    @enderror
                </div>

            </div>

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:loading.attr="disabled" wire:click="$set( 'openModal' , false )">
                Cancelar
            </x-jet-button>
            <x-jet-button wire:loading.attr="disabled" wire:click="agregar">
                Agregar nueva zona
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    {{-- Modal de actualizar zona de delivery --}}
    <x-jet-dialog-modal wire:model="openModalActualizar">
        <x-slot name="title">
            Actuzalizar zona de delivery
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-6 gap-4">

                <div class="col-span-2">
                    <x-jet-label class="font-bold" for="state" value="Estado" />
                    <select wire:model="state_id" wire:click="changeState" id="state" autocomplete="state" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm">
                        @foreach ($estados as $estado)
                            <option value="{{$estado->id}}" > {{$estado->state}} </option>
                        @endforeach
                    </select>
                    @error('state_id')
                        <small class="text-red-400 italic">{{$message}}</small>
                    @enderror
                </div>

                <div class="col-span-2">
                    <x-jet-label class="font-bold" for="city" value="Municipio" />
                    <select wire:model="city_id" id="city" autocomplete="city" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm">
                        <option selected>Selecciona el municipio</option>
                        @foreach ($cities as $city)
                            <option value="{{$city->id}}"> {{$city->city}} </option>
                        @endforeach
                    </select>
                    @error('city_id')
                        <small class="text-red-400 italic">{{$message}}</small>
                    @enderror
                </div>

                <div class="col-span-2">
                    <x-jet-label class="font-bold" for="delivery_free" value="¿Haces delivery gratis?" />
                    <select wire:model="delivery_free" id="delivery_free" autocomplete="delivery_free" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm">
                        <option value="">Seleccionar respuesta</option>
                        <option class="text-gray-800" value="0"> No </option>
                        <option class="text-green-500" value="1"> Si </option>
                    </select>
                    @error('delivery_free')
                        <small class="text-red-400 italic">{{$message}}</small>
                    @enderror
                </div>

                <div class="col-span-2 md:col-span-6">
                    <div class="w-full">
                        <x-jet-label class="font-bold" for="delivery_zone" value="Zona de delivery" />
                        <input wire:model.defer="delivery_zone" autocomplete="delivery_zone" type="text" class="flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300" placeholder="Escribe la zona a donde ofreces delivery" required>
                        @error('delivery_zone')
                            <small class="text-red-400 italic">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-span-2 md:col-span-6 mb-0 md:mb-2">
                        <x-jet-label class="font-bold mb-2" value="Selecciona los días en que haces delivery" />
                        <input class="cursor-pointer" type="checkbox" wire:model="days" value="lunes" id="lunes">
                        <label class="cursor-pointer mr-1" for="lunes">Lunes</label>
                        <input class="cursor-pointer" type="checkbox" wire:model="days" value="martes" id="martes">
                        <label class="cursor-pointer mr-1" for="martes">Martes</label>
                        <input class="cursor-pointer" type="checkbox" wire:model="days" value="miercoles" id="miercoles">
                        <label class="cursor-pointer mr-1" for="miercoles">Miércoles</label>
                        <input class="cursor-pointer" type="checkbox" wire:model="days" value="jueves" id="jueves">
                        <label class="cursor-pointer mr-1" for="jueves">Jueves</label>
                        <input class="cursor-pointer" type="checkbox" wire:model="days" value="viernes" id="viernes">
                        <label class="cursor-pointer mr-1" for="viernes">Viernes</label>
                        <input class="cursor-pointer" type="checkbox" wire:model="days" value="sabado" id="sabado">
                        <label class="cursor-pointer mr-1 align-self" for="sabado">Sábado</label>
                        <input class="cursor-pointer" type="checkbox" wire:model="days" value="domingo" id="domingo">
                        <label class="cursor-pointer" for="domingo">Domingo</label>
                        @error('days')
                            <small class="text-red-400 italic">{{$message}}</small>
                        @enderror
                </div>

                <div class="col-span-2 sm:col-span-3">
                    <x-jet-label class="font-bold" for="delivery_time" value="¿En cuanto tiempo haces el delivery?" />
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input wire:model.defer="delivery_time" autocomplete="delivery_time" class="flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300" type="text" placeholder="ej. 48-72" required>
                        <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-red-500 text-sm font-bold" title="Horas">
                            Hrs.
                        </span>
                    </div>
                    @error('delivery_time')
                        <small class="text-red-400 italic">{{$message}}</small>
                    @enderror
                </div>

                <div class="col-span-2 md:col-span-3">
                    <x-jet-label class="font-bold" for="min_amount_purchase" value="¿Cúal es el monto minimo para hacer delivery?" />
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input wire:model.defer="min_amount_purchase" autocomplete="min_amount_purchase" type="number" class="flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300" placeholder="ej. 35" required>
                        <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-green-500 text-sm font-bold" title="Dólares">
                            $USD
                        </span>
                    </div>
                    @error('min_amount_purchase')
                        <small class="text-red-400 italic">{{$message}}</small>
                    @enderror
                </div>

            </div>

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:loading.attr="disabled" wire:click="cancelar">
                Cancelar
            </x-jet-button>
            <x-jet-button wire:loading.attr="disabled" wire:click="update">
                Confirmar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    @endif

    @include('common.alert')

</div>
