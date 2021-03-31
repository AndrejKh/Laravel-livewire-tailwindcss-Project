<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title"></x-slot>

    <x-slot name="description"></x-slot>

    <x-slot name="form">
        <div class="grid grid-cols-1 md:grid-cols-6">
            <!-- Profile Photo -->
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-3 row-span-1 sm:col-span-3 sm:row-span-2">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                                wire:model="photo"
                                x-ref="photo"
                                x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />

                    <x-jet-label for="photo" value="{{ __('Foto de Perfil') }}" />

                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview">
                        <span class="block rounded-full w-15 h-15"
                            x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select A New Photo') }}
                    </x-jet-secondary-button>

                    @if ($this->user->profile_photo_path)
                        <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                            {{ __('Remove Photo') }}
                        </x-jet-secondary-button>
                    @endif

                    <x-jet-input-error for="photo" class="mt-2" />
                </div>
            @endif

            <!-- Name -->
            <div class="col-span-3 row-span-1 sm:col-span-3 sm:row-span-1 pl-0 md:pl-3">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full bg-gray-100" wire:model.defer="state.name" autocomplete="name" disabled />
                <x-jet-input-error for="name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-3 row-span-1 sm:col-span-3 sm:row-span-1 pl-0 md:pl-3">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" type="email" class="mt-1 block w-full bg-gray-100" wire:model.defer="state.email" disabled />
                <x-jet-input-error for="email" class="mt-2" />
            </div>

            <!-- Documento de identidad -->
            <div class="col-span-1 sm:col-span-3 lg:col-span-2 mt-4">
                <x-jet-label for="doc" value="Documento de Identidad" />
                <div>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center">
                            <label for="type_identity" class="sr-only">Tipo de documento</label>
                            <select id="type_identity" name="type_identity" class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md" wire:model.defer="state.type_identity">
                                <option value="ci.">C.I.</option>
                                <option value="rif">RIF</option>
                                <option value="passport">Pasaporte</option>
                            </select>
                        </div>
                        <x-jet-input id="doc_identity" class="block mt-1 w-full pl-28" type="text" name="doc_identity" required  wire:model.defer="state.doc_identity" />
                    </div>
                </div>
            </div>

            <!-- Phone -->
            <div class="col-span-1 sm:col-span-3 lg:col-span-2 mt-4 pl-0 md:pl-3">
                <x-jet-label for="phone" value="Teléfono" />
                <x-jet-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="state.phone" />
                <x-jet-input-error for="phone" class="mt-2" />
            </div>
            @if (auth()->user()->roles[0]->name == 'seller')
                <!-- Estado -->
                <div class="col-span-1 sm:col-span-3 lg:col-span-2 mt-4 pl-0 md:pl-3">
                    <x-jet-label for="state" value="Estado" />
                    <x-jet-input id="state" type="text" class="mt-1 block w-full bg-gray-100" wire:model.defer="state.state" disabled/>
                    <x-jet-input-error for="state" class="mt-2" />
                </div>
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            Guardado
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            Guardar
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
