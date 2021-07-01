<div class="fixed z-40 inset-0 overflow-y-auto ease-out duration-400 " style="display:none;" id="modalUbication">

    <div class="flex md:items-end justify-center md:pt-4 md:px-4 pb-20 text-center sm:block sm:p-0">

      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>


      <!-- This element is to trick the browser into centering the modal contents. -->

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

      <div class="max-w-7xl w-full sm:max-w-xl md:max-w-lg inline-block align-bottom md:rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle bg-gray-100" role="dialog" aria-modal="true" aria-labelledby="modal-headline" id="contentModalShopinngCar">

        <div class="grid grid-cols-5 px-3 py-5">
            <h3 class="col-span-4 text-xl font-bold text-gray-900">¿En que lugar te encuentras?</h3>
            <span class="justify-self-end">
                <svg class="cursor-pointer" width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg" id="modalUbicationButtonClose">
                    <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" fill="black"/>
                </svg>
            </span>
        </div>

        <div>

            <div class="bg-gray-100 px-3 pt-2 xl:pt-5 pb-4 sm:pb-4">

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

            </div>

            <div class="bg-gray-100 px-4 py-5 sm:px-6 sm:flex sm:flex-row-reverse">
                <span class="mr-0">
                    <div class="inline-flex justify-center w-full rounded-md border cursor-pointer border-transparent px-14 py-2 bg-gray-900 text-white font-semibold text-base leading-6 shadow-md hover:bg-gray-800 focus:outline-none focus:blue-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 items-center" aria-label="ir a comparar precios" id="setUbication">
                        Listo
                        <svg class="fill-current text-white mr-2" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#fff"><rect fill="none" height="24" width="24"/><path d="M14.29,5.71L14.29,5.71c-0.39,0.39-0.39,1.02,0,1.41L18.17,11H3c-0.55,0-1,0.45-1,1v0c0,0.55,0.45,1,1,1h15.18l-3.88,3.88 c-0.39,0.39-0.39,1.02,0,1.41l0,0c0.39,0.39,1.02,0.39,1.41,0l5.59-5.59c0.39-0.39,0.39-1.02,0-1.41L15.7,5.71 C15.32,5.32,14.68,5.32,14.29,5.71z"/></svg>
                    </div>
                </span>
            </div>
        </div>
      </div>
    </div>
  </div>


  <script>
      const modalUbication = document.getElementById('modalUbication');

      document.addEventListener("DOMContentLoaded", function() {
          const ubication = localStorage.getItem('ubication');
          if( ubication === null ){

              modalUbication.style.display = 'block';
              const modalUbicationButtonClose = document.getElementById('modalUbicationButtonClose');

              modalUbicationButtonClose.addEventListener('click', event => {
                modalUbication.style.display = 'none';
              })


              selectState.addEventListener('change', event => {
                  const selectState = document.getElementById('selectState');
                  const state_id = selectState.value;
                  const selectCity = document.getElementById('selectCity');
                  axios.get('/get/cities-state/'+state_id).then( function(response){
                      selectCity.innerHTML = ''

                      let cities = response.data;
                      cities.forEach(city => {
                          let option = document.createElement("option");
                          option.text = city.city;
                          option.value = city.id;
                          selectCity.add(option);
                      });

                  });
              })


            //   guardar la ubicacion y cerrar el modal
            const setUbication = document.getElementById('setUbication')
            setUbication.addEventListener('click', event => {
                const selectState = document.getElementById('selectState');
                const selectCity = document.getElementById('selectCity');
                let state_id = selectState.value;
                let state = selectState.selectedOptions.item(0).text;
                let city_id = selectCity.value;
                let city = selectCity.selectedOptions.item(0).text;

                objectUbicationLocalStorage = {
                    state_id: state_id,
                    state: state,
                    city_id: city_id,
                    city: city
                };

                // Almaceno el producot en el localStorage
                localStorage.setItem('ubication',JSON.stringify(objectUbicationLocalStorage));

                // oculto el modal
                modalUbication.style.display = 'none';

            })
          }

      });

  </script>
