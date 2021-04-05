<div class="col-span-1 px-2">
    <div class="grid grid-cols-1 max-w-7xl mt-2">
        <div class="col-span-1 flex justify-between">
            <div>
                <h2 class="text-xl">Configura el nombre de tu Marca</h2>
                <small class="text-sm text-gray-500">Esta marca es como te encontrarán los compradores del sitio.</small>
            </div>
            @if (!$brand_user)
                <div>
                    <x-jet-button wire:loading.attr="disabled" wire:click="$set( 'openModal' , true )">
                        Crear Marca
                    </x-jet-button>
                </div>
            @endif
        </div>
    </div>

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
        <div class="w-full shadow-md rounded-lg p-6">
            <div class="flex my-2 align-self justify-between">
                <h2 class="font-bold text-lg">Tu marca</h2>
                <x-jet-button class="" wire:loading.attr="disabled" wire:click="buttonActualizarBrand">
                    Actualizar
                </x-jet-button>
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

        </div>

        <x-jet-dialog-modal wire:model="openModalActualizar">
            <x-slot name="title">
                Actualiza tu marca
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
                    Actualizar
                </x-jet-button>
            </x-slot>

        </x-jet-dialog-modal>
    @endif
</div>
