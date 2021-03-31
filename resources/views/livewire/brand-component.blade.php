<div>
    <div class="flex max-w-7xl">
        <div class="flex-1">
            <h2 class="text-lg">Configura el nombre de imagen de tu Marca</h2>
            <small class="text-sm text-gray-500">Esta marca es como te encontrarán los compradores del sitio.</small>
        </div>
        @if (!$brand_user)
            <x-jet-button wire:loading.attr="disabled" wire:click="$set( 'openModal' , true )">
                Crear Marca
            </x-jet-button>
        @endif
    </div>

    <x-jet-dialog-modal wire:model="openModal">
        <x-slot name="title">
            Crea tu marca
        </x-slot>
        <x-slot name="content">
            <div class="w-full">
                <label class="form-label mb-2" for="brand">Nombre de tu Marca</label>
                <input wire:model.defer="brand" autocomplete="brand" class="form-control" type="text" placeholder="Ingresa un nombre" id="brand" required>
                @error('brand')
                    <small class="text-red-400 italic">{{$message}}</small>
                @enderror
            </div>
            <div class="w-full mt-4">
                <span>Selecciona la imagen de la Marca </span>
                <label class="text-green-600 cursor-pointer mb-2" for="profile_photo_path_brand"> aqui</label>
                <input type="file" class="hidden" id="profile_photo_path_brand" wire:model="profile_photo_path_brand">
                @if ($profile_photo_path_brand)
                    <img class="w-10 h-10 rounded-full" src="{{ $profile_photo_path_brand->temporaryUrl() }}">
                @endif
                @error('profile_photo_path_brand')
                    <small class="text-red-400 italic">{{$message}}</small>
                @enderror
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

    @if ($brand_user)
        <div class="w-full md:w-1/2 shadow-md rounded-lg p-6">
            <div class="flex my-2">
                <h2 class="font-bold text-lg">Tu marca</h2>
            </div>
            <hr>
            <div class="flex mt-3">
                <div class="flex">
                    <div class="bg-no-repeat bg-cover bg-center w-16 h-16 overflow-hidden rounded-full mx-auto" style="background-image: url('/storage/{{ $brand_user->profile_photo_path_brand }}');"></div>
                </div>
                <div class="flex self-center ml-4">
                    {{$brand_user->brand}}
                </div>
            </div>
            <x-jet-button class="flex-1 mt-3 " wire:loading.attr="disabled" wire:click="$set( 'openModalActualizar' , true )">
                Actualizar marca
            </x-jet-button>
        </div>

        <x-jet-dialog-modal wire:model="openModalActualizar">
            <x-slot name="title">
                Actualiza tu marca
            </x-slot>
            <x-slot name="content">
                <div class="w-full">
                    <label class="form-label mb-2" for="brand">Nombre de tu Marca</label>
                    <input wire:model.defer="brand" autocomplete="brand" class="form-control" type="text" placeholder="Ingresa un nombre" id="brand" required>
                    @error('brand')
                        <small class="text-red-400 italic">{{$message}}</small>
                    @enderror
                </div>
                <div class="w-full mt-4">
                    <span>Selecciona la imagen de la Marca </span>
                    <label class="text-green-600 cursor-pointer mb-2" for="profile_photo_path_brand"> aqui</label>
                    <input type="file" class="hidden" id="profile_photo_path_brand" wire:model="profile_photo_path_brand">
                    @if ($profile_photo_path_brand)
                        <img class="w-10 h-10 rounded-full" src="{{ $profile_photo_path_brand->temporaryUrl() }}">
                    @endif
                    @error('profile_photo_path_brand')
                        <small class="text-red-400 italic">{{$message}}</small>
                    @enderror
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:loading.attr="disabled" wire:click="$set( 'openModalActualizar' , false )">
                    Cancelar
                </x-jet-button>
                <x-jet-button wire:loading.attr="disabled" wire:click="update">
                    Actualizar
                </x-jet-button>
            </x-slot>

        </x-jet-dialog-modal>
    @endif
</div>
