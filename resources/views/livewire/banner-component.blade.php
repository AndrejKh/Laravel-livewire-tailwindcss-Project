<div class=" w-full md:mt-3 lg:mt-5">
    @if ( $brand )

    <div class="w-full shadow-md rounded-lg p-3 lg:p-6 bg-white">
        <div class="flex mb-2 align-self justify-between">
            <h2 class="font-bold text-lg">Banners promocionales </h2>
            @if ( $brand )
                <x-jet-button wire:loading.attr="disabled" wire:click="$set( 'openModal' , true )">
                    Agregar
                </x-jet-button>
            @endif
        </div>
        <hr>
        <div class="grid grid-cols-2 mt-3 gap-2 md:gap-3">
            @if ( $banners_tienda && count($banners_tienda) > 0)
                @foreach ($banners_tienda as $banner)
                    <div class="relative">
                        <div wire:click="bannerUpdate( {{$banner}} )" class="bg-no-repeat bg-cover bg-center h-16 lg:h-32 overflow-hidden rounded-lg mx-auto cursor-pointer shadow-lg" style="background-image: url('/storage/{{$banner->photo}}');"></div>
                        <span class="text-sm md:text-md w-5 h-5 md:w-6 md:h-6 absolute -top-2 -right-2 rounded-full bg-gray-900 text-white flex items-center justify-center cursor-pointer" wire:click="destroy({{$banner}})">x</span>
                    </div>
                @endforeach
            @else
                <span class="col-span-2 text-sm text-gray-700">Son banners de publicidad que se verán en tu perfil de tienda.</span>
            @endif
        </div>
    </div>



    {{-- Modal para agregar banner --}}
    <x-jet-dialog-modal wire:model="openModal">
        <x-slot name="title">
            Agregar banner promocional
        </x-slot>
        <x-slot name="content">
            <div class="w-full mt-4">
                <span>Selecciona la imagen del nuevo banner a agregar </span>
                <label class="text-green-600 cursor-pointer mb-2" for="photo"> aqui</label>
                <input type="file" class="hidden" id="photo" wire:model="photo">
                @if ($photo)
                    <div class="w-2/3 h-32 rounded-lg shadow-lg overflow-hidden my-4 mx-auto">
                        <img class="w-full" src="{{ $photo->temporaryUrl() }}">
                    </div>
                @endif
                @error('photo')
                    <small class="text-red-400 italic">{{$message}}</small>
                @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:loading.attr="disabled" wire:click="$set( 'openModal' , false )">
                Cancelar
            </x-jet-button>
            <x-jet-button wire:loading.attr="disabled" wire:click="agregar">
                Agregar
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>

    @if ($bannerUpdate)
    {{-- Modal para actualizar banner --}}
    <x-jet-dialog-modal wire:model="openModalUpdate">
        <x-slot name="title">
            Actualiza el banner promocional
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-1 gap-3">
                    <div class="col-span-1 w-full">
                        <div class="bg-no-repeat bg-cover bg-center h-16 lg:h-32 overflow-hidden rounded-lg mx-auto shadow-lg" style="background-image: url('/storage/{{$bannerUpdate->photo}}');"></div>
                    </div>
                    <div class="col-span-1 w-full mt-4">
                        <span class="text-xl">Selecciona la imagen del nuevo banner a agregar </span>
                        <label class="text-green-600 cursor-pointer mb-2" for="photo"> aqui</label>
                        <input type="file" class="hidden" id="photo" wire:model="photo">
                        @if ($photo)
                            <div class="w-2/3 h-32 rounded-lg shadow-lg overflow-hidden my-4 mx-auto">
                                <img class="w-full" src="{{ $photo->temporaryUrl() }}">
                            </div>
                        @endif
                        @error('photo')
                            <small class="text-red-400 italic">{{$message}}</small>
                        @enderror
                    </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:loading.attr="disabled" wire:click="$set( 'openModal' , false )">
                Cancelar
            </x-jet-button>
            <x-jet-button wire:loading.attr="disabled" wire:click="update">
                Actualizar
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
    @endif

    @endif

    @include('common.alert')

</div>

