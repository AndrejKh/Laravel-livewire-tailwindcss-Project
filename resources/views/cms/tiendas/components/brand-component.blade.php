{{-- <div class="grid grid-cols-1 md:grid-cols-2 max-w-7xl mt-2 gap-2"> --}}

    <div class="col-span-1 mb-2 md:mb-0">

        <div class="w-full shadow-md rounded-lg p-3 lg:p-6 bg-white">
            <div class="flex mb-2 align-self justify-between">
                <h2 class="font-bold text-lg inline">Tu tienda</h2>

                @if (!$brand_user)
                <div>
                    <x-jet-button wire:loading.attr="disabled" wire:click="$set( 'openModal' , true )">
                        Crear Tienda
                    </x-jet-button>
                </div>
                @else
                <x-jet-button class="" wire:loading.attr="disabled" wire:click="buttonActualizarBrand">
                    Editar
                </x-jet-button>
                @endif
            </div>
            <hr>
            <div class="grid grid-cols-1 md:grid-cols-3 mt-3">
                @if ($brand_user)
                    <div class="col-span-1">
                        <div class="flex">
                            <div class="bg-no-repeat bg-cover bg-center w-14 h-14 overflow-hidden rounded-full mx-auto" style="background-image: url('/storage/{{ $brand_user->profile_photo_path_brand }}');"></div>
                        </div>
                        <div class="flex self-center ml-4 justify-center text-lg font-semibold">
                            {{ $brand_user->brand }}
                        </div>
                        @if ($brand_user->whatsapp)
                        <div class="flex self-center ml-4 justify-center text-lg font-light">
                            <svg class="inline fill-current text-green-500 " width="20px" heigth="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <g>	<g>
                                <path d="M440.164,71.836C393.84,25.511,332.249,0,266.737,0S139.633,25.511,93.308,71.836S21.473,179.751,21.473,245.263
                                    c0,41.499,10.505,82.279,30.445,118.402L0,512l148.333-51.917c36.124,19.938,76.904,30.444,118.403,30.444
                                    c65.512,0,127.104-25.512,173.427-71.836C486.488,372.367,512,310.776,512,245.263S486.488,118.16,440.164,71.836z
                                    M266.737,460.495c-38.497,0-76.282-10.296-109.267-29.776l-6.009-3.549L48.952,463.047l35.878-102.508l-3.549-6.009
                                    c-19.479-32.985-29.775-70.769-29.775-109.266c0-118.679,96.553-215.231,215.231-215.231s215.231,96.553,215.231,215.231
                                    C481.968,363.943,385.415,460.495,266.737,460.495z"/>
                                </g></g><g>	<g>
                                <path d="M398.601,304.521l-35.392-35.393c-11.709-11.71-30.762-11.71-42.473,0l-13.538,13.538
                                    c-32.877-17.834-60.031-44.988-77.866-77.865l13.538-13.539c5.673-5.672,8.796-13.214,8.796-21.236
                                    c0-8.022-3.124-15.564-8.796-21.236l-35.393-35.393c-5.672-5.672-13.214-8.796-21.236-8.796c-8.023,0-15.564,3.124-21.236,8.796
                                    l-28.314,28.314c-15.98,15.98-16.732,43.563-2.117,77.664c12.768,29.791,36.145,62.543,65.825,92.223
                                    c29.68,29.68,62.432,53.057,92.223,65.825c16.254,6.965,31.022,10.44,43.763,10.44c13.992,0,25.538-4.193,33.901-12.557
                                    l28.314-28.314c5.673-5.672,8.796-13.214,8.796-21.236S404.273,310.193,398.601,304.521z M349.052,354.072
                                    c-6.321,6.32-23.827,4.651-44.599-4.252c-26.362-11.298-55.775-32.414-82.818-59.457c-27.043-27.043-48.158-56.455-59.457-82.818
                                    c-8.903-20.772-10.571-38.278-4.252-44.599l28.315-28.314l35.393,35.393l-28.719,28.719l4.53,9.563
                                    c22.022,46.49,59.753,84.221,106.244,106.244l9.563,4.53l28.719-28.719l35.393,35.393L349.052,354.072z"/>
                                </g></g>
                            </svg>
                            +{{ $brand_user->whatsapp }}
                        </div>
                        @endif
                    </div>
                    <div class="col-span-2 grid grid-cols-2">

                        <div class="col-span-1">
                            <strong class="mr-2 text-gray-700">Estado:</strong>
                            <span>
                                {{ $addressBD->state_id ? $addressBD->state->state : 'Sin información' }}
                            </span>
                        </div>
                        <div class="col-span-1">
                            <strong class="mr-2 text-gray-700">Ciudad:</strong>
                            <span>
                                {{ $addressBD->city_id ? $addressBD->city->city : 'Sin información' }}
                            </span>
                        </div>
                        <div class="col-span-2">
                            <strong class="mr-2 text-gray-700">Dirección:</strong>
                            <span>
                                {{ $addressBD->address ? $addressBD->address : 'Sin información' }}
                            </span>
                        </div>
                        {{-- <div class="col-span-2">
                            <strong class="mr-2 text-gray-700">Horario de atención:</strong>
                            <span>
                                Lun, Mar, Mie, Jue, Sab, Dom -
                                <strong> 8:00AM - 7:00PM </strong>
                                {{ $addressBD->address ? $addressBD->address : 'Sin información' }}
                            </span>
                        </div> --}}
                    </div>
                @else
                    <p class="col-span-3 text-gray-700 mt-2 ">
                        Esta tienda es como te encontrarán los compradores del sitio. <br>
                        Este será tu perfil.
                    </p>
                @endif
            </div>
        </div>

        @if (!$brand_user)
            {{--  Modal para crear marca --}}
            <x-jet-dialog-modal wire:model="openModal">
                <x-slot name="title">
                    Crea tu tienda
                </x-slot>
                <x-slot name="content">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <div class="col-span-2 md:col-span-1">
                            <x-jet-label class="font-bold" for="city" value="Nombre de tu tienda*" />
                            <input wire:model.defer="brand" autocomplete="brand" class="flex-1 block w-full rounded-md sm:text-sm border-gray-300" type="text" placeholder="Ingresa un nombre" id="brand_create" required>
                            @error('brand')
                                <small class="text-red-400 italic">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-span-2 md:col-span-1 mt-4">
                            <span>La imagen de perfil de tu tienda </span>
                            <label class="text-green-600 cursor-pointer mb-2" for="profile_photo_path_brand"> aqui</label>
                            <input type="file" class="hidden" id="profile_photo_path_brand" wire:model="profile_photo_path_brand">
                            @if ($profile_photo_path_brand)
                                <div class="bg-no-repeat bg-cover bg-center w-20 h-20 overflow-hidden rounded-full mx-auto" style="background-image: url('{{ $profile_photo_path_brand->temporaryUrl() }}');"></div>
                            @endif
                            @error('profile_photo_path_brand')
                                <small class="text-red-400 italic">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="w-full text-center my-3" wire:loading wire:target="profile_photo_path_brand">
                            <span class="text-green-600 intermitente text-xl font-semibold">Cargando...</span>
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <x-jet-label class="font-bold" for="state" value="Estado*" />
                            <select wire:model="state_id" wire:click="changeState" id="state" autocomplete="state" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm">
                                @foreach ($estados as $estado)
                                    <option value="{{$estado->id}}"> {{$estado->state}} </option>
                                @endforeach
                            </select>
                            @error('state_id')
                                <small class="text-red-400 italic">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <x-jet-label class="font-bold" for="city" value="Municipio*" />
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
                            <x-jet-label class="font-bold" for="address" value="Dirección*" />
                            <input wire:model.defer="address" autocomplete="address" class="flex-1 block w-full rounded-md sm:text-sm border-gray-300" type="text" id="address" >
                            @error('address')
                                <small class="text-red-400 italic">{{$message}}</small>
                            @enderror
                        </div>

                        {{-- <div class="col-span-2 md:col-span-2 mb-0 md:mb-2">
                            <x-jet-label class="font-bold" for="schedule" value="Horario de atención" />
                            <ul class="">
                                <li class="grid grid-cols-3 gap-1 mb-1">
                                    <div class="col-span-1"></div>
                                    <div class="col-span-2">
                                        <div>
                                            <span class="text-sm font-bold">
                                                Desde
                                            </span>
                                            <span class="text-sm font-bold ml-14 md:ml-20">
                                                Hasta
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-span-1">

                                    </div>
                                </li>
                                @foreach ($days_week as $day)
                                    <li class="grid grid-cols-3 gap-1 mb-3">
                                        <div class="col-span-1">
                                            <input class="cursor-pointer" type="checkbox" wire:model="days" value="{{ $day->id }}" id="{{ $day->day }}">
                                            <label class="cursor-pointer mr-1" for="{{ $day->day }}">{{ ucfirst( $day->day ) }}</label>
                                        </div>
                                        <div class="col-span-2">
                                            <input wire:model="open_hour" class="inline rounded-md sm:text-sm border-gray-300 p-1 h-8 w-9 md:w-12" type="number" step="1" min="0" max="23" placeholder="00"> :
                                            <input wire:model="open_min" class="inline rounded-md sm:text-sm border-gray-300 p-1 h-8 w-9 md:w-12" type="number" step="1" min="0" max="59" placeholder="00"> -
                                            <input wire:model="close_hour" class="inline rounded-md sm:text-sm border-gray-300 p-1 h-8 w-9 md:w-12" type="number" step="1" min="0" max="23" placeholder="00"> :
                                            <input wire:model="close_min" class="inline rounded-md sm:text-sm border-gray-300 p-1 h-8 w-9 md:w-12" type="number" step="1" min="0" max="59" placeholder="00">
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            @error('schedule')
                                <small class="text-red-400 italic">{{$message}}</small>
                            @enderror
                        </div> --}}
                        {{-- @if ($days)
                            @php
                                sort($days);
                                print_r($days);
                            @endphp

                        @endif --}}

                        <div class="col-span-1">
                            <x-jet-label class="font-bold" for="" value="Whatsapp de contacto para tus clientes" />
                            <div>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 flex items-center">
                                        <select name="code_whatsapp" wire:model.defer="code_whatsapp" class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-800 sm:text-sm rounded-md" >
                                            <option value="">Código</option>
                                            <option value="58414">0414</option>
                                            <option value="58424">0424</option>
                                            <option value="58412">0412</option>
                                            <option value="58416">0416</option>
                                        </select>
                                    </div>
                                    <x-jet-input id="whatsapp" wire:model.defer="whatsapp" class="block mt-1 w-full md:w-52 pl-16 md:pl-20" type="number" name="whatsapp" :value="old('whatsapp')" step="1" min="0" max="9999999" />
                                </div>
                            </div>
                            @error('address')
                                <small class="text-red-400 italic">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                </x-slot>
                <x-slot name="footer">
                    <x-jet-secondary-button wire:loading.attr="disabled" wire:click="$set( 'openModal' , false )">
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
                    Editar tu tienda
                </x-slot>
                <x-slot name="content">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <div class="col-span-2 md:col-span-1">
                            <x-jet-label class="font-bold" for="city" value="Nombre de tu tienda*" />
                            <input wire:model.defer="brand" autocomplete="brand" class="flex-1 block w-full rounded-md sm:text-sm border-gray-300" type="text" placeholder="Ingresa un nombre" id="brand_create" required>
                            @error('brand')
                                <small class="text-red-400 italic">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-span-2 md:col-span-1 mt-4">
                            <span>La imagen de perfil de tu tienda </span>
                            <label class="text-green-600 cursor-pointer mb-2" for="profile_photo_path_brand"> aqui</label>
                            <input type="file" class="hidden" id="profile_photo_path_brand" wire:model="profile_photo_path_brand">
                            @if ($profile_photo_path_brand)
                                <div class="bg-no-repeat bg-cover bg-center w-20 h-20 overflow-hidden rounded-full mx-auto" style="background-image: url('{{ $profile_photo_path_brand->temporaryUrl() }}');"></div>
                            @endif
                            @error('profile_photo_path_brand')
                                <small class="text-red-400 italic">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="w-full text-center my-3" wire:loading wire:target="profile_photo_path_brand">
                            <span class="text-green-600 intermitente text-xl font-semibold">Cargando...</span>
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <x-jet-label class="font-bold" for="state" value="Estado*" />
                            <select wire:model="state_id" wire:click="changeState" id="state" autocomplete="state" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm">
                                @foreach ($estados as $estado)
                                    <option value="{{$estado->id}}"> {{$estado->state}} </option>
                                @endforeach
                            </select>
                            @error('state_id')
                                <small class="text-red-400 italic">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <x-jet-label class="font-bold" for="city" value="Municipio*" />
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
                            <x-jet-label class="font-bold" for="address" value="Dirección*" />
                            <input wire:model.defer="address" autocomplete="address" class="flex-1 block w-full rounded-md sm:text-sm border-gray-300" type="text" id="address" >
                            @error('address')
                                <small class="text-red-400 italic">{{$message}}</small>
                            @enderror
                        </div>

                        {{-- <div class="col-span-2 md:col-span-2 mb-0 md:mb-2">
                            <x-jet-label class="font-bold" for="schedule" value="Horario de atención" />
                            <ul class="">
                                <li class="grid grid-cols-3 gap-1 mb-1">
                                    <div class="col-span-1"></div>
                                    <div class="col-span-2">
                                        <div>
                                            <span class="text-sm font-bold">
                                                Desde
                                            </span>
                                            <span class="text-sm font-bold ml-14 md:ml-20">
                                                Hasta
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-span-1">

                                    </div>
                                </li>
                                @foreach ($days_week as $day)
                                    <li class="grid grid-cols-3 gap-1 mb-3">
                                        <div class="col-span-1">
                                            <input class="cursor-pointer" type="checkbox" wire:model="days" value="{{ $day->day }}" id="{{ $day->day }}">
                                            <label class="cursor-pointer mr-1" for="{{ $day->day }}">{{ ucfirst( $day->day ) }}</label>
                                        </div>
                                        <div class="col-span-2">
                                            <input wire:model="open_hour" class="inline rounded-md sm:text-sm border-gray-300 p-1 h-8 w-9 md:w-12" type="number" step="1" min="0" max="23" placeholder="00"> :
                                            <input wire:model="open_min" class="inline rounded-md sm:text-sm border-gray-300 p-1 h-8 w-9 md:w-12" type="number" step="1" min="0" max="59" placeholder="00"> -
                                            <input wire:model="close_hour" class="inline rounded-md sm:text-sm border-gray-300 p-1 h-8 w-9 md:w-12" type="number" step="1" min="0" max="23" placeholder="00"> :
                                            <input wire:model="close_min" class="inline rounded-md sm:text-sm border-gray-300 p-1 h-8 w-9 md:w-12" type="number" step="1" min="0" max="59" placeholder="00">
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            @error('schedule')
                                <small class="text-red-400 italic">{{$message}}</small>
                            @enderror
                        </div> --}}

                        <div class="col-span-1">
                            <x-jet-label class="font-bold" for="" value="Whatsapp de contacto para tus clientes" />
                            <div>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 flex items-center">
                                        <select name="code_whatsapp" wire:model.defer="code_whatsapp" class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-800 sm:text-sm rounded-md" >
                                            <option value="">Código</option>
                                            <option value="58414">0414</option>
                                            <option value="58424">0424</option>
                                            <option value="58412">0412</option>
                                            <option value="58416">0416</option>
                                        </select>
                                    </div>
                                    <x-jet-input id="whatsapp" wire:model.defer="whatsapp" class="block mt-1 w-full md:w-52 pl-16 md:pl-20" type="number" name="whatsapp" :value="old('whatsapp')" step="1" min="0" max="9999999" />
                                </div>
                            </div>
                            @error('address')
                                <small class="text-red-400 italic">{{$message}}</small>
                            @enderror
                        </div>

                    </div>
                    {{-- <div class="w-full">
                        <label class="form-label mb-2" for="brand_udpdate">Nombre de tu tienda</label>
                        <input wire:model.defer="brand" autocomplete="brand" class="form-control" type="text" placeholder="Ingresa un nombre" id="brand_udpdate" required>
                        @error('brand')
                            <small class="text-red-400 italic">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="w-full mt-4">
                        <span>Selecciona la <b>nueva imagen</b> de perfil de la tienda </span>
                        <label class="text-green-600 cursor-pointer mb-2" for="profile_photo_path_brand"> aqui</label>
                        <input type="file" class="hidden" id="profile_photo_path_brand" wire:model="profile_photo_path_brand">
                        <div class="w-full text-center my-3" wire:loading wire:target="profile_photo_path_brand">
                            <span class="text-green-600 intermitente text-xl font-semibold">Cargando...</span>
                        </div>
                        @if ($profile_photo_path_brand)
                            <div class="bg-no-repeat bg-cover bg-center w-20 h-20 overflow-hidden rounded-full mx-auto" style="background-image: url('{{ $profile_photo_path_brand->temporaryUrl() }}');"></div>
                        @endif
                        @error('profile_photo_path_brand')
                            <small class="text-red-400 italic">{{$message}}</small>
                        @enderror
                    </div> --}}
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


{{-- </div> --}}

