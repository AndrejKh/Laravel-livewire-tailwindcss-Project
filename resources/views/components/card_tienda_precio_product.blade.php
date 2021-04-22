
<span>
    @php $delivery_free = 0; @endphp
        {{-- Verifico si la marca tiene deliveries --}}
        @isset( $item->brand->deliveries )
            {{-- Recorro todos los deliveries --}}
            @foreach ($item->brand->deliveries as $delivery)
                {{-- Verifico si el delivery es free, en este caso finalizo el cilo --}}
                @if ( $delivery->delivery_free == 1 )
                    @php $delivery_free = 1; break; @endphp
                @endif
            @endforeach
        @endisset
    {{-- Delivery free?: {{ $delivery_free ? 'Si' : 'No'}} --}}
</span>

<article class="max-w-7xl w-full bg-white p-2 md:p-4 shadow-md rounded-lg mb-3">
    <div class="grid grid-cols-6 gap-3">
        <div class="col-span-1 self-center text-center">
            <span class="text-2xl lg:text-4xl font-semibold text-gray-900">{{ $item->price }}</span> $USD
        </div>
        <div class="col-span-4 self-center">
            <div class="grid grid-cols-6 gap-3">
                <div class="col-span-1 hidden md:inline self-center">
                    <div class="bg-no-repeat bg-cover bg-center w-12 h-12 md:w-16 md:h-16 overflow-hidden rounded-full mx-auto" style="background-image: url('/storage/{{ $item->brand->profile_photo_path_brand }}');"></div>
                </div>
                <div class="col-span-6 sm:col-span-4 md:col-span-3 self-center">

                    <div class="flex self-center">
                        <svg class="inline fill-current text-yellow-500" width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.3 0.126277L1.3 2.37628C0.52 2.67628 0 3.41628 0 4.25628V8.96628C0 14.0163 3.41 18.7263 8 19.8763C12.59 18.7263 16 14.0163 16 8.96628V4.25628C16 3.42628 15.48 2.67628 14.7 2.38628L8.7 0.136277C8.25 -0.0437232 7.75 -0.0437232 7.3 0.126277ZM6.23 12.6963L4.11 10.5763C3.72 10.1863 3.72 9.55628 4.11 9.16628C4.5 8.77628 5.13 8.77628 5.52 9.16628L6.93 10.5763L10.47 7.03628C10.86 6.64628 11.49 6.64628 11.88 7.03628C12.27 7.42628 12.27 8.05628 11.88 8.44628L7.64 12.6863C7.26 13.0863 6.62 13.0863 6.23 12.6963Z"/>
                        </svg>
                        <h6 class="text-lg md:text-xl inline ml-3">
                            {{ $item->brand->brand }}
                        </h6>
                    </div>
                    <div class="flex self-center">
                        <svg class="inline fill-current text-gray-600" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                        <span class="text-gray-400 font-semibold self-center text-sm md:text-md block ml-3">
                            {{ $item->brand->user->state->state }}
                            @isset( $item->brand->user->city )
                                , {{ $item->brand->user->city->city }}
                            @endisset
                        </span>
                    </div>
                    <div class="flex self-center sm:hidden">
                        <svg class="inline h-5 w-5" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M10 15.27L16.18 19L14.54 11.97L20 7.24L12.81 6.63L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27Z" fill="#34BA00"/></svg>
                        <svg class="inline h-5 w-5" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M10 15.27L16.18 19L14.54 11.97L20 7.24L12.81 6.63L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27Z" fill="#34BA00"/></svg>
                        <svg class="inline h-5 w-5" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M10 15.27L16.18 19L14.54 11.97L20 7.24L12.81 6.63L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27Z" fill="#34BA00"/></svg>
                        <svg class="inline h-5 w-5" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M20 7.24L12.81 6.62L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27L16.18 19L14.55 11.97L20 7.24ZM10 13.4V4.1L11.71 8.14L16.09 8.52L12.77 11.4L13.77 15.68L10 13.4Z" fill="#34BA00"/></svg>
                        <svg class="inline h-5 w-5" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M20 7.24L12.81 6.62L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27L16.18 19L14.55 11.97L20 7.24ZM10 13.4L6.24 15.67L7.24 11.39L3.92 8.51L8.3 8.13L10 4.1L11.71 8.14L16.09 8.52L12.77 11.4L13.77 15.68L10 13.4Z" fill="#34BA00"/></svg>
                    </div>
                </div>
                <div class="col-span-2 self-center text-center hidden sm:block">
                    <div class="flex self-center justify-center">
                        <svg class="inline h-5 w-5" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M10 15.27L16.18 19L14.54 11.97L20 7.24L12.81 6.63L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27Z" fill="#34BA00"/></svg>
                        <svg class="inline h-5 w-5" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M10 15.27L16.18 19L14.54 11.97L20 7.24L12.81 6.63L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27Z" fill="#34BA00"/></svg>
                        <svg class="inline h-5 w-5" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M10 15.27L16.18 19L14.54 11.97L20 7.24L12.81 6.63L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27Z" fill="#34BA00"/></svg>
                        <svg class="inline h-5 w-5" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M20 7.24L12.81 6.62L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27L16.18 19L14.55 11.97L20 7.24ZM10 13.4V4.1L11.71 8.14L16.09 8.52L12.77 11.4L13.77 15.68L10 13.4Z" fill="#34BA00"/></svg>
                        <svg class="inline h-5 w-5" viewBox="0 0 20 19" xmlns="http://www.w3.org/2000/svg"><path d="M20 7.24L12.81 6.62L10 0L7.19 6.63L0 7.24L5.46 11.97L3.82 19L10 15.27L16.18 19L14.55 11.97L20 7.24ZM10 13.4L6.24 15.67L7.24 11.39L3.92 8.51L8.3 8.13L10 4.1L11.71 8.14L16.09 8.52L12.77 11.4L13.77 15.68L10 13.4Z" fill="#34BA00"/></svg>
                    </div>
                    <span class="hidden md:inline text-sm text-gray-500">125 calificaciones</span>
                </div>
            </div>
        </div>
        <div class="col-span-1 mx-auto self-center">
            <svg class="mx-auto w-8 h-8" viewBox="0 0 31 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.6585 5.07317C21.0537 5.07317 22.1951 3.93171 22.1951 2.53659C22.1951 1.14146 21.0537 0 19.6585 0C18.2634 0 17.122 1.14146 17.122 2.53659C17.122 3.93171 18.2634 5.07317 19.6585 5.07317ZM6.34146 13.3171C2.79024 13.3171 0 16.1073 0 19.6585C0 23.2098 2.79024 26 6.34146 26C9.89268 26 12.6829 23.2098 12.6829 19.6585C12.6829 16.1073 9.89268 13.3171 6.34146 13.3171ZM6.34146 24.0976C3.93171 24.0976 1.90244 22.0683 1.90244 19.6585C1.90244 17.2488 3.93171 15.2195 6.34146 15.2195C8.75122 15.2195 10.7805 17.2488 10.7805 19.6585C10.7805 22.0683 8.75122 24.0976 6.34146 24.0976ZM13.6976 11.4146L16.7415 8.37073L17.7561 9.38536C19.0878 10.7171 20.6859 11.6429 22.6517 11.9473C23.4127 12.0615 24.0976 11.4527 24.0976 10.679C24.0976 10.0576 23.641 9.53756 23.0195 9.4361C21.6498 9.2078 20.5717 8.53561 19.6585 7.62244L17.2488 5.21268C16.6146 4.69268 15.9805 4.43902 15.2195 4.43902C14.4585 4.43902 14.193 4.36768 13.8125 4.875C13.8125 4.875 11.375 2.4375 10.5625 2.4375C9.75 2.4375 6.5 6.5 7.3125 7.3125C8.125 8.125 9.89268 8.75122 9.89268 8.75122C9.38537 9.25854 9.13171 9.89268 9.13171 10.5268C9.13171 11.2878 9.38537 11.922 9.89268 12.3024L13.9512 15.8537V20.9268C13.9512 21.6244 14.522 22.1951 15.2195 22.1951C15.9171 22.1951 16.4878 21.6244 16.4878 20.9268V15.3463C16.4878 14.6868 16.2341 14.0654 15.7902 13.5961L13.6976 11.4146ZM24.0976 13.3171C20.5463 13.3171 17.7561 16.1073 17.7561 19.6585C17.7561 23.2098 20.5463 26 24.0976 26C27.6488 26 30.439 23.2098 30.439 19.6585C30.439 16.1073 27.6488 13.3171 24.0976 13.3171ZM24.0976 24.0976C21.6878 24.0976 19.6585 22.0683 19.6585 19.6585C19.6585 17.2488 21.6878 15.2195 24.0976 15.2195C26.5073 15.2195 28.5366 17.2488 28.5366 19.6585C28.5366 22.0683 26.5073 24.0976 24.0976 24.0976Z" fill="#42D697"/>
            </svg>
            <span class="block text-green-500 text-sm md:text-md"> <span class="hidden md:inline">Envíos</span> Gratis</span>
        </div>
    </div>
</article>
