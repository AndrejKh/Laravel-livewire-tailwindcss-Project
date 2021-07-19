<div class="fixed z-40 inset-0 overflow-y-auto ease-out duration-400 " style="display:none;" id="modalUbication">

    <div class="flex md:items-end justify-center md:pt-4 md:px-4 pb-20 text-center sm:block sm:p-0">

      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

      <div class="max-w-7xl w-full sm:max-w-xl md:max-w-lg inline-block align-bottom md:rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle bg-gray-100" role="dialog" aria-modal="true" aria-labelledby="modal-headline" id="contentModalShopinngCar">

        <div class="grid grid-cols-5 px-3 py-5">
            <h3 class="col-span-4 text-xl font-bold text-gray-900">¿En que lugar te encuentras?</h3>
            <span class="justify-self-end">
                <img class="cursor-pointer h-6" src="{{ asset('close_icon_dark.svg') }}" alt="icono de cerrar modal de ubicacion" width="24px" height="23px" id="modalUbicationButtonClose">
            </span>
        </div>

        <div class="px-3">

            <span class="text-lg font-semibold mb-3">Selecciona el estado y ciudad</span>
            <div class="grid grid-cols-2 gap-2 mt-3">
                <select class="col-span-1 rounded-lg h-12 shadow-sm bg-white border-0 py-2 text-sm font-semibold cursor-pointer" id="selectState">
                    @foreach ($states as $state)
                        <option value="{{ $state->id }}"> {{ $state->state }} </option>
                    @endforeach
                </select>
                <select class="col-span-1 rounded-lg h-12 shadow-sm bg-white border-0 py-2 text-sm font-semibold cursor-pointer ml-3" id="selectCity">
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}"> {{ $city->city }} </option>
                    @endforeach
                </select>
            </div>

            <div class="inline-flex justify-center w-full rounded-md border cursor-pointer border-transparent my-5 py-2 bg-gray-900 text-white font-semibold text-base leading-6 shadow-md hover:bg-gray-800 focus:outline-none focus:blue-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 items-center" aria-label="continuar" id="setUbication">
                Listo
                <img class="ml-2" src="{{ asset('arrow_finally.svg') }}" alt="icono de comparar precios de supermercados" width="24px" height="24px">
            </div>
        </div>
      </div>
    </div>
  </div>
