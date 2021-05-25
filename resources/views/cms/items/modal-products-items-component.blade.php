<div>

    <x-jet-dialog-modal wire:model="show_modal">
        <x-slot name="title">
            <div class="grid grid-cols-5 py-2">
                <h5 class="col-span-4 text-xl font-bold text-gray-900">Nuevo producto</h5>
                <span wire:click="$set('show_modal', false)" class="justify-self-end">
                    <svg class="cursor-pointer" width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" fill="black"/>
                    </svg>
                </span>
            </div>
        </x-slot>

        <x-slot name="content">

            <div  class="max-w-7xl w-full lg:max-w-4xl inline-block align-bottom text-left transform transition-all sm:align-middle" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                <div class="grid grid-cols-1 gap-2">

                <div x-data="{open:false}" class="col-span-1 ">
                    <div class="w-full py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                        <span class="flex items-center">
                            <input  @click="open = true" @click.away="open = false"
                                    wire:model="products_search_input"
                                    type="text"
                                    class="w-full rounded-full"
                                    placeholder="Buscar el producto que deseas agregar"
                            >
                        </span>
                    </div>

                    <ul x-show="open" class="absolute w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm z-50">
                        @if ( count($products) > 0)
                        @foreach ($products as $product)
                            <li wire:click="SearchProduct({{$product->id}})" class="text-gray-900 cursor-pointer select-none relative py-2 pl-3">
                                <div class="flex items-center truncate">
                                    <img src="/storage/{{$product->photo_main_product}}" class="flex-shrink-0 h-6 w-6 rounded-full" alt="">
                                    <span class="font-normal ml-3 block truncate">
                                        {{ $product->title }}
                                    </span>
                                </div>
                                <span class="text-sm text-green-600 absolute inset-y-0 right-0 flex items-center pr-4">
                                    {{$product->category->category}}
                                </span>
                            </li>
                        @endforeach
                        @else
                        <li class="text-gray-500 py-2 px-2 w-full">
                            No hay resultados
                        </li>
                        @endif

                    </ul>
                </div>
                @if ($product_selected)
                <div class="col-span-1 flex items-center border-gray-900 shadow py-1 px-5 rounded-md justify-between bg-green-100 my-auto" >
                    <span>
                        <img src="/storage/{{$product_selected->photo_main_product}}" class="h-10 inline rounded-full">
                        <span class="font-normal text-lg ml-6 inline truncate">{{ $product_selected->title }}</span>
                    </span>

                    <span>
                        <svg class="h-5 w-5 fill-current text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
                @endif

                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 mt-3">
                    <div class="col-span-1">
                        <div class="flex-auto mb-3">
                            <label class="text-md font-semibold mb-2" for="quantity">Cantidad</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input wire:model.lazy="quantity" autocomplete="min_amount_purchase" type="number" class="flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300" required onkeypress="return filterInteger(event);" min="1" step="1">
                                <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-800 text-sm font-bold" title="Unidad">
                                    ud.
                                </span>
                            </div>
                            @error('quantity')
                                <small class="text-red-400 italic">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="flex-auto mb-3">
                            <label class="text-md font-semibold mb-2" for="price">Precio</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input wire:model.lazy="price" autocomplete="min_amount_purchase" type="number" class="flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300" required onkeypress="return filterFloat(event,this);" min="0.01" step="0.01">
                                <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-green-600 text-sm font-bold" title="Dólares">
                                    $USD
                                </span>
                            </div>
                            @error('price')
                                <small class="text-red-400 italic">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

        </x-slot>
        <x-slot name="footer">
            <button wire:click="agregar" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:blue-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 items-center">
                Crear producto
            </button>
        </x-slot>
    </x-jet-dialog-modal>

    <div class="flex justify-center mt-10">
    @empty($brand)

        <span class="text-lg bg-green-300 px-3 md:px-8 py-4 rounded-md shadow">
            <strong>Aún no has creado tu marca.</strong> ¡Recuerda que para poder vender tus productos, primero debes
            <a class="text-blue-700" href="{{ route('cms.tiendas') }}">crear una marca</a>!
        </span>

    @else

        <button wire:click="SetModalShow()" class="hidden md:flex text-lg text-white py-3 px-16 bg-blue-600 rounded-md shadow-md">
            <svg class="h-6 fill-current text-white mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M18 13h-5v5c0 .55-.45 1-1 1s-1-.45-1-1v-5H6c-.55 0-1-.45-1-1s.45-1 1-1h5V6c0-.55.45-1 1-1s1 .45 1 1v5h5c.55 0 1 .45 1 1s-.45 1-1 1z"/></svg>
            Nuevo producto
        </button>
        {{-- Agragr profucto Boton flotante --}}
        <div wire:click="SetModalShow()" class="flex fixed bottom-14 right-4 h-14 w-14 lg:h-16 lg:w-16 justify-center bg-blue-500 rounded-full z-30 shadow-md items-center cursor-pointer">
            <svg class="h-10 lg:h-12 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M18 13h-5v5c0 .55-.45 1-1 1s-1-.45-1-1v-5H6c-.55 0-1-.45-1-1s.45-1 1-1h5V6c0-.55.45-1 1-1s1 .45 1 1v5h5c.55 0 1 .45 1 1s-.45 1-1 1z"/></svg>
        </div>
    @endempty
    </div>


    <script type="text/javascript">

        function filterFloat(evt,input){
            // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
            var key = window.Event ? evt.which : evt.keyCode;
            var chark = String.fromCharCode(key);
            var tempValue = input.value+chark;
            if(key >= 48 && key <= 57){
                if(filterFormatTwoDecimals(tempValue)=== false){
                    return false;
                }else{
                    return true;
                }
            }else{
                if(key == 8 || key == 13 || key == 0) {
                    return true;
                }else if(key == 46){
                        if(filterFormatTwoDecimals(tempValue)=== false){
                            return false;
                        }else{
                            return true;
                        }
                }else{
                    return false;
                }
            }
        }
        function filterFormatTwoDecimals(__val__){
            var preg = /^([0-9]+\.?[0-9]{0,2})$/;
            if(preg.test(__val__) === true){
                return true;
            }else{
            return false;
            }

        }

        function filterInteger(evt){

            // code is the decimal ASCII representation of the pressed key.
            var code = (evt.which) ? evt.which : evt.keyCode;

            if(code==8) { // backspace.
            return true;
            } else if(code>=48 && code<=57) { // is a number.
            return true;
            } else{ // other keys.
            return false;
            }
        }

    </script>


    @include('common.alert')
</div>

