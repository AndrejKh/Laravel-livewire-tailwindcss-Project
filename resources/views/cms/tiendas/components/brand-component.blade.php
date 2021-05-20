<div class="grid grid-cols-1 md:grid-cols-2 max-w-7xl mt-2 gap-2">

    <div class="col-span-1 mb-2 md:mb-0">

        <div class="w-full shadow-md rounded-lg p-3 lg:p-6 bg-white">
            <div class="flex mb-2 align-self justify-between">
                <h2 class="font-bold text-lg">Tu marca</h2>


                @if (!$brand_user)
                <div>
                    <x-jet-button wire:loading.attr="disabled" wire:click="$set( 'openModal' , true )">
                        Crear Marca
                    </x-jet-button>
                </div>
                @else
                <x-jet-button class="" wire:loading.attr="disabled" wire:click="buttonActualizarBrand">
                    Editar
                </x-jet-button>
                @endif
            </div>
            <hr>
            <div class="flex mt-3">
            @if ($brand_user)
                <div class="flex">
                    <div class="bg-no-repeat bg-cover bg-center w-16 h-16 overflow-hidden rounded-full mx-auto" style="background-image: url('/storage/{{ $brand_user->profile_photo_path_brand }}');"></div>
                </div>
                <div class="flex self-center ml-4">
                    {{$brand_user->brand}}
                </div>
            @else
                <span class="text-gray-700 mt-2">Esta marca es como te encontrarán los compradores del sitio.</span>
            @endif
            </div>
        </div>

        @if (!$brand_user)
            {{--  Modal para crear marca --}}
            <x-jet-dialog-modal wire:model="openModal">
                <x-slot name="title">
                    Crea tu marca
                </x-slot>
                <x-slot name="content">
                    <div class="w-full">
                        <label class="form-label mb-2" for="brand_create">Nombre de tu Marca</label>
                        <input wire:model.defer="brand" autocomplete="brand" class="form-control" type="text" placeholder="Ingresa un nombre" id="brand_create" required>
                        @error('brand')
                            <small class="text-red-400 italic">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="w-full mt-4">
                        <span>Selecciona la imagen de la marca </span>
                        <label class="text-green-600 cursor-pointer mb-2" for="profile_photo_path_brand"> aqui</label>
                        <input type="file" class="hidden" id="profile_photo_path_brand" wire:model="profile_photo_path_brand">
                        @if ($profile_photo_path_brand)
                            <div class="bg-no-repeat bg-cover bg-center w-20 h-20 overflow-hidden rounded-full mx-auto" style="background-image: url('{{ $profile_photo_path_brand->temporaryUrl() }}');"></div>
                        @endif
                        @error('profile_photo_path_brand')
                            <small class="text-red-400 italic">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="w-full text-center" wire:loading wire:target="profile_photo_path_brand">
                        <span class="text-green-500">Cargando...</span>
                    </div>
                </x-slot>
                <x-slot name="footer">
                    <x-jet-secondary-button wire:loading.attr="disabled" wire:click="$set( 'openModalAddress' , false )">
                        Cancelar
                    </x-jet-button>
                    <x-jet-button wire:loading.attr="disabled" wire:click="crear">
                        Crear
                    </x-jet-button>
                </x-slot>
            </x-jet-dialog-modal>
        @else
            {{--  Modal para actualizar marca --}}
            <x-jet-dialog-modal wire:model="openModalActualizar">
                <x-slot name="title">
                    Editar tu marca
                </x-slot>
                <x-slot name="content">
                    <div class="w-full">
                        <label class="form-label mb-2" for="brand_udpdate">Nombre de tu Marca</label>
                        <input wire:model.defer="brand" autocomplete="brand" class="form-control" type="text" placeholder="Ingresa un nombre" id="brand_udpdate" required>
                        @error('brand')
                            <small class="text-red-400 italic">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="w-full mt-4">
                        <span>Selecciona la <b>nueva imagen</b>  de la Marca </span>
                        <label class="text-green-600 cursor-pointer mb-2" for="profile_photo_path_brand"> aqui</label>
                        <input type="file" class="hidden" id="profile_photo_path_brand" wire:model="profile_photo_path_brand">
                        <span class="text-green-500" wire:loading wire:target="profile_photo_path_brand">
                            Cargando...
                        </span>
                        @if ($profile_photo_path_brand)
                            <div class="bg-no-repeat bg-cover bg-center w-20 h-20 overflow-hidden rounded-full mx-auto" style="background-image: url('{{ $profile_photo_path_brand->temporaryUrl() }}');"></div>
                        @endif
                        @error('profile_photo_path_brand')
                            <small class="text-red-400 italic">{{$message}}</small>
                        @enderror
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

    </div>


    {{-- Address --}}
    @if($brand_user !== null )
        <div class="col-span-1 mb-2 md:mb-0">
            <div class="w-full shadow-md rounded-lg p-3 lg:p-6 bg-white">
                <div class="flex mb-2 align-self justify-between">
                    <h2 class="font-bold text-lg">Tú dirección </h2>

                    @if($brand_user->state_id !== null)
                        <x-jet-button wire:loading.attr="disabled" wire:click="buttonActualizarAddress">
                            Editar
                        </x-jet-button>
                    @else
                        <x-jet-button wire:loading.attr="disabled" wire:click="$set( 'openModalAddress' , true )">
                            Configurar
                        </x-jet-button>
                    @endif

                </div>
                <hr>

                <div class="grid grid-cols-2 mt-3">
                        @if($brand_user->state_id !== null)

                            <div class="col-span-1 pr-3">
                                <strong class="mr-2 text-gray-500">Estado:</strong> <span> {{ $brand_user->state->state }} </span>
                            </div>
                            <div class="col-span-1">
                                <strong class="mr-2 text-gray-500">Municipio:</strong>
                                <span>
                                    {{ $brand_user->city_id ? $brand_user->city->city : 'Sin información' }}
                                </span>
                            </div>
                            <div class="col-span-2 pt-2">
                                <strong class="mr-2 text-gray-500">Dirección:</strong> <span> {{ $brand_user->address ? $brand_user->address : 'Sin información' }} </span>
                            </div>
                        @else
                            <span class="col-span-2 text-gray-700">Esta dirección se mostrará como la principal de tu marca.</span>
                        @endif
                </div>

            </div>

            @isset($brand_user->state_id)

                {{-- Modal para actualizar direccion --}}
                <x-jet-dialog-modal wire:model="openModalActualizarAddress">
                    <x-slot name="title">
                        Editar la dirección de tu marca
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
                        <x-jet-button wire:loading.attr="disabled" wire:click="updateAddress">
                            Confirmar
                        </x-jet-button>
                    </x-slot>

                </x-jet-dialog-modal>

            @else

                {{-- Modal para crear direccion --}}
                <x-jet-dialog-modal wire:model="openModalAddress">
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
                        <x-jet-button wire:loading.attr="disabled" wire:click="updateAddress">
                            Confirmar
                        </x-jet-button>
                    </x-slot>
                </x-jet-dialog-modal>

            @endisset

            @include('common.alert')

        </div>
    @endif
</div>

