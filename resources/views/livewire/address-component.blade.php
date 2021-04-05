<div class="col-span-1 w-full px-2">
    <div class="grid grid-cols-1 max-w-7xl mt-2">
        <div class="col-span-1 flex justify-between">
            <div>
                <h2 class="text-xl">Configura la dirección de tu Marca</h2>
                <small class="text-sm text-gray-500">Esta dirección se mostrará como la principal de tu marca.</small>
            </div>
            @if (!$direction)
                <div>
                    <x-jet-button wire:loading.attr="disabled" wire:click="$set( 'openModal' , true )">
                        Configurar
                    </x-jet-button>
                </div>
            @endif
        </div>
    </div>

    <x-jet-dialog-modal wire:model="openModal">
        <x-slot name="title">
            La dirección principal de tu marca
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

    @if ($direction)
        <div class="w-full shadow-md rounded-lg p-3 lg:p-6">
            <div class="flex my-2 align-self justify-between">
                <h2 class="font-bold text-lg">La dirección principal de tu marca</h2>
                <x-jet-button class="" wire:loading.attr="disabled" wire:click="buttonActualizar">
                    Actualizar
                </x-jet-button>
            </div>
            <hr>
            <div class="grid grid-cols-2 mt-3">
                <div class="col-span-1 pr-3">
                    <strong class="mr-2">Estado:</strong> <span> {{ $user->state->state }} </span>
                </div>
                <div class="col-span-1">
                    <strong class="mr-2">Municipio:</strong> <span> {{ $user->city->city }} </span>
                </div>
                <div class="col-span-2 pt-2">
                    <strong class="mr-2">Dirección:</strong> <span> Urb. Araguaney, Av. Araguaney Urb. Araguaney, Av. Araguaney Urb. Araguaney, Av. Araguaney{{-- {{ $user->city->city }} --}} </span>
                </div>
            </div>

        </div>

        <x-jet-dialog-modal wire:model="openModalActualizar">
            <x-slot name="title">
                Actualiza tu dirección
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
    @endif
</div>
