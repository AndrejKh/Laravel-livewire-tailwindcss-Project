<div>

    {{-- Agregar Marca --}}
    @livewire('brand-component',['user_id' => auth()->user()->id])

    <div>
        <div class="flex max-w-7xl mt-5">
            <div class="flex-1">
                <h2 class="text-lg">Agrega los banners promocionales de tu tienda</h2>
                <small class="text-sm text-gray-500">Son banners de publicidad que se verán en tu perfil de tienda.</small>
            </div>
            <x-jet-button wire:loading.attr="disabled" wire:click="$set( 'openModal' , true )">
                Agregar Banner
            </x-jet-button>
        </div>
    </div>
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

        @if ( $banners_tienda && count($banners_tienda) > 0)
            <div class="grid grid-cols-1 gap-6 p-6 shadow-lg rounded-lg mt-4">
                <div class="col-span-1 text-lg "> Los banners promocionales de tu tienda </div>
                    <div class="col-span-1 justify-center p-3">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach ($banners_tienda as $banner)
                                <div class="col-span-1 cursor-pointer relative">
                                    <img class="w-full rounded-md shadow-md z-10" src="/storage/{{$banner->photo}}" alt="imagen de banner">
                                    <span class="w-6 h-6 absolute -top-2 -right-2 rounded-full bg-gray-200 flex items-center justify-center cursor-pointer bg-opacity-80 hover:bg-opacity-100" wire:click="destroy({{$banner}})">x</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif


</div>
