<div class="col-span-1 mb-2 md:mb-0">
    <div class="w-full shadow-md rounded-lg p-3 lg:p-6 bg-white">
        <div class="flex mb-2 align-self justify-between">
            <h2 class="font-bold text-lg">Tú dirección </h2>

            @isset($brand->state_id)
            <x-jet-button wire:loading.attr="disabled" wire:click="buttonActualizar">
                Actualizar
            </x-jet-button>
            @else
            <x-jet-button wire:loading.attr="disabled" wire:click="$set( 'openModal' , true )">
                Configurar
            </x-jet-button>
            @endisset
        </div>
        <hr>

        <div class="grid grid-cols-2 mt-3">
                @isset($brand->state_id)

                    <div class="col-span-1 pr-3">
                        <strong class="mr-2 text-gray-500">Estado:</strong> <span> {{ $brand->state->state }} </span>
                    </div>
                    <div class="col-span-1">
                        <strong class="mr-2 text-gray-500">Municipio:</strong>
                        <span>
                            {{ $brand->city_id ? $brand->city->city : 'Sin información' }}
                        </span>
                    </div>
                    <div class="col-span-2 pt-2">
                        <strong class="mr-2 text-gray-500">Dirección:</strong> <span> {{ $brand->address ? $brand->address : 'Sin información' }} </span>
                    </div>
                @else
                <span class="col-span-2 text-gray-700">Esta dirección se mostrará como la principal de tu marca.</span>
                @endisset
        </div>

    </div>
    @isset($brand->state_id)
    {{-- Modal para actualizar direccion --}}
    <x-jet-dialog-modal wire:model="openModalActualizar">
        <x-slot name="title">
            Actualiza tu dirección
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div class="col-span-1">
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

                <div class="col-span-1">
                    <x-jet-label class="font-bold" for="city" value="Municipio" />
                    <select wire:model="city_id" id="city" autocomplete="city" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm">
                        <option selected>Selecciona el municipio</option>
                        @if ($cities)
                            @foreach ($cities as $city)
                                <option value="{{$city->id}}"> {{$city->city}} </option>
                            @endforeach
                        @endif
                    </select>
                    @error('city_id')
                        <small class="text-red-400 italic">{{$message}}</small>
                    @enderror
                </div>

                <div class="col-span-2">
                    <x-jet-label class="font-bold" for="address" value="Dirección" />
                    <input wire:model.defer="address" autocomplete="address" class="flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300" type="text" id="address" required >
                    @error('address')
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
                Actualizar
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
    @else
    {{-- Modal para crear direccion --}}
        <x-jet-dialog-modal wire:model="openModal">
            <x-slot name="title">
                La dirección principal de tu marca
            </x-slot>

            <x-slot name="content">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div class="col-span-1">
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

                    <div class="col-span-1">
                        <x-jet-label class="font-bold" for="city" value="Municipio" />
                        <select wire:model="city_id" id="city" autocomplete="city" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm">
                            <option selected>Selecciona el municipio</option>
                            @if ($cities)

                                @foreach ($cities as $city)
                                    <option value="{{$city->id}}"> {{$city->city}} </option>
                                @endforeach

                            @endif
                        </select>
                        @error('city_id')
                            <small class="text-red-400 italic">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <x-jet-label class="font-bold" for="address" value="Dirección" />
                        <input wire:model.defer="address" autocomplete="address" class="flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300" type="text" id="address" required >
                        @error('address')
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

    @endisset

    @include('common.alert')

</div>
