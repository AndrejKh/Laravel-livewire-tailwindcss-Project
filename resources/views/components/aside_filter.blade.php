<div class="py-6 w-48 h-screen">
    <hr>
    <ul class="mt-6">
        {{-- categorias --}}
        <li class="mb-8">
            <h3 class="font-bold text-gray-900 text-lg mb-1"> Categorias </h3>

            @foreach ($principal_categories as $category)
                <div>
                    <div class="flex text-gray-700 font-semibold my-1 text-md">
                        <a class="hover:text-blue-600" href="{{ route('products.category.show', $category->slug) }}">
                            <span class="categoryPrincipal">{{ $category->category }}</span>
                            <span class="text-gray-400"> ({{ count($category->products) }}) </span>
                        </a>
                        @if ( count( $category->categories_children($category->id) ) > 0 )
                        <div class="flex h-5 w-5 self-center text-center bg-white rounded-full shadow-sm lg:shadow-md ml-auto items-center cursor-pointer displayCategoriesChildren">
                            <svg class="fill-current text-gray-900 h-1 mx-auto return_rotate_select_icon" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.29866 0.333143L7.50671 4.75228L12.7148 0.333143C13.2383 -0.111048 14.0839 -0.111048 14.6074 0.333143C15.1309 0.777335 15.1309 1.49487 14.6074 1.93907L8.44631 7.16686C7.92282 7.61105 7.07718 7.61105 6.55369 7.16686L0.392617 1.93907C-0.130872 1.49487 -0.130872 0.777335 0.392617 0.333143C0.916107 -0.0996583 1.77517 -0.111048 2.29866 0.333143Z" />
                            </svg>
                        </div>
                        @endif
                        <span hidden class="categoryId">{{ $category->id }}</span>
                    </div>
                    {{-- contenedor de las categorias hijo --}}
                    <div class="containerChildCategories">
                    </div>
                </div>
            @endforeach
            {{-- Modelo de categorias hijos --}}
            <div hidden id="modelCategoryChild">
                <div class="col-span-1 my-1 text-sm pl-1">
                    <a class="text-gray-500 hover:text-blue-600 slugCategoryChild" href="">
                        <span class="titleCategoryChild"></span>
                        <span class="text-gray-400 quantityProductsCategoryChild"> </span>
                    </a>
                </div>
            </div>

            <div class="text-blue-600 font-semibold my-1 text-md">
                <button class="hover:text-blue-600 modalCategories">
                    Ver más
                </button>
            </div>
        </li>
        <hr>

        {{-- estaods --}}
        <li class=" mb-8">
            <h3 class="font-bold text-gray-900 text-lg mb-1"> Estados </h3>

            <div class="w-full" id="badgeStateSelected">
                <span class="flex bg-green-500 text-white rounded-full shadow w-full px-3 py-1">
                    <span class="inline self-center text-sm" id="stateSelected">Carabobo</span>
                    <svg class="fill-current text-white stroke-current stroke-2 cursor-pointer h-3 inline self-center ml-auto" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" />
                    </svg>
                </span>
            </div>

            <div id="containerEstados"> </div>

            <div class="text-blue-600 font-semibold my-1 text-md">
                <button class="hover:text-blue-600 modalStates">
                    Ver más
                </button>
            </div>

        </li>
        <hr>

        {{-- Ciudades --}}
        <li class=" mb-8">
            <h3 class="font-bold text-gray-900 text-lg mb-1"> Ciudades </h3>

            <div class="w-full" id="badgeCitySelected">
                <span class="flex bg-green-500 text-white rounded-full shadow w-full px-3 py-1">
                    <span class="inline self-center text-sm" id="citySelected">Valencia</span>
                    <svg class="fill-current text-white stroke-current stroke-2 cursor-pointer h-3 inline self-center ml-auto" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" />
                    </svg>
                </span>
            </div>

            <div id="containerCiudades"> </div>

            <div class="text-blue-600 font-semibold my-1 text-md">
                <button class="hover:text-blue-600 modalCities">
                    Ver más
                </button>
            </div>

        </li>
        <hr>

        <div id="modelStateAndCity">
            <div class="text-gray-700 font-semibold my-1 text-md">
                <span class="hover:text-blue-600 cursor-pointer titleElement"></span>
                <span hidden  class="valueElement"></span>
            </div>
        </div>

    </ul>
</div>

{{-- Formulario para consultas y filtro --}}
<div hidden>
    <form action="" id="formQueryFilter">
        @isset($query)
            <input type="text" name="q" value="{{ $query }}" id="querySearch">
        @endisset
        @isset($category_slug)
            <input type="text" value="{{ $category_slug }}" id="categorySelected">
        @endisset

        <input type="text" name="state" id="stateSelectedForm">

        <input type="text" name="city" id="citySelectedForm">

    </form>

</div>

{{-- Modal de todas las categorias --}}
<div class="fixed z-40 inset-0 overflow-y-auto ease-out duration-400" style="display:none;" id="categoriesModal">

    <div class="flex md:items-end justify-center min-h-screen md:pt-4 md:px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="inline-block sm:align-middle sm:h-screen"></span>​

        <div class="max-w-7xl w-full lg:max-w-4xl inline-block align-bottom md:rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle bg-gray-100" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

        <div class="grid grid-cols-5 px-5 pt-5 pb-2">
            <h5 class="col-span-4 text-xl font-bold text-gray-900">Todas las categorias del sitio</h5>
            <span class="justify-self-end">
                <svg class="cursor-pointer" width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg" id="closeModalCategories">
                    <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" fill="black"/>
                </svg>
            </span>
        </div>

        <div class="flex justify-center">
            <div class="grid grid-cols-2 lg:grid-cols-3 w-full p-6 md:px-10 bg-gray-100 gap-2" id="categoryModalContainer">
            </div>
        </div>

        <div id="cardCategoryModalExample">
            <div class="col-span-1 text-gray-900 text-lg">
                <a class="hover:text-blue-600" href="">
                    <span class="categoryTitle"></span>
                    <span class="text-gray-700 quantityProductsCategory"></span>
                </a>
            </div>
        </div>

        </div>
    </div>

</div>

{{-- Modal de todas los estados --}}
<div class="fixed z-40 inset-0 overflow-y-auto ease-out duration-400" style="display:none;" id="statesModal">

    <div class="flex md:items-end justify-center min-h-screen md:pt-4 md:px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="inline-block sm:align-middle sm:h-screen"></span>​

        <div class="max-w-7xl w-full lg:max-w-4xl inline-block align-bottom md:rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle bg-gray-100" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

        <div class="grid grid-cols-5 px-5 pt-5 pb-2">
            <h5 class="col-span-4 text-xl font-bold text-gray-900">Todos los estados</h5>
            <span class="justify-self-end">
                <svg class="cursor-pointer" width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg" id="closeModalState">
                    <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" fill="black"/>
                </svg>
            </span>
        </div>

        <div class="flex justify-center">
            <div class="grid grid-cols-2 lg:grid-cols-3 w-full p-6 md:px-10 bg-gray-100 gap-2" id="stateModalContainer">
            </div>
        </div>

        <div id="cardStateModalExample">
            <div class="col-span-1 text-gray-900 text-lg">
                <a class="hover:text-blue-600" href="">
                    <span class="stateTitle"></span>
                    {{-- <span class="text-gray-700 quantityProductsCategory"></span> --}}
                </a>
            </div>
        </div>

        </div>
    </div>

</div>

{{-- Modal de todas las ciudades --}}
<div class="fixed z-40 inset-0 overflow-y-auto ease-out duration-400" style="display:none;" id="citiesModal">

    <div class="flex md:items-end justify-center min-h-screen md:pt-4 md:px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="inline-block sm:align-middle sm:h-screen"></span>​

        <div class="max-w-7xl w-full lg:max-w-4xl inline-block align-bottom md:rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle bg-gray-100" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

        <div class="grid grid-cols-5 px-5 pt-5 pb-2">
            <h5 class="col-span-4 text-xl font-bold text-gray-900">
                Todos las ciudades de
                <span class="text-green-800" id="subtitleStateModalCity"></span>
            </h5>
            <span class="justify-self-end">
                <svg class="cursor-pointer" width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg" id="closeModalCity">
                    <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" fill="black"/>
                </svg>
            </span>
        </div>

        <div class="flex justify-center">
            <div class="grid grid-cols-2 lg:grid-cols-3 w-full p-6 md:px-10 bg-gray-100 gap-2" id="cityModalContainer">
            </div>
        </div>

        <div id="cardCityModalExample">
            <div class="col-span-1 text-gray-900 text-lg">
                <a class="hover:text-blue-600" href="">
                    <span class="cityTitle"></span>
                    {{-- <span class="text-gray-700 quantityProductsCategory"></span> --}}
                </a>
            </div>
        </div>

        </div>
    </div>

</div>

{{-- Al caragar la pagina web --}}
<script>

     window.onload = function(){
        //  Obtengo el formulario de envio para filtrar
        const formQueryFilter = document.getElementById('formQueryFilter');
        const stateSelectedForm = document.getElementById('stateSelectedForm');
        const citySelectedForm = document.getElementById('citySelectedForm');

        //------------------ Cargar y mostrar todos las categorias hijos de la categoria principal -------------//
        const categoryPrincipal = document.querySelectorAll('.categoryPrincipal');
        const displayCategoriesChildren = document.querySelectorAll('.displayCategoriesChildren');
        const modelCategoryChild = document.getElementById('modelCategoryChild');
        // Obtengo las catgorias del filtro, y los cargo en el DOM
        displayCategoriesChildren.forEach( item => {
            item.addEventListener('click', event => {

                // En que elemento se dio click? en el span, en el svg o en el path? obtengo el nodo principal
                if ( event.target.nodeName == 'DIV' ){
                    var rootContainer = event.target.parentNode.parentNode;
                }else if( event.target.nodeName == 'svg' ){
                    var rootContainer = event.target.parentNode.parentNode.parentNode;
                }else {
                    var rootContainer = event.target.parentNode.parentNode.parentNode.parentNode;
                }

                const svg = rootContainer.querySelector('svg');

                const category_id = rootContainer.querySelector('.categoryId').textContent;

                const containerCategoriesChild = rootContainer.querySelector('.containerChildCategories');
                containerCategoriesChild.textContent = '';

                if(svg.classList.contains('return_rotate_select_icon')){
                    // Girar icono de select

                    svg.classList.replace("return_rotate_select_icon", "rotate_select_icon");

                    // Busco las categorias hijo
                    axios.get('/get/categories-child/'+category_id).then( function(response){
                        const data = response.data;

                        // Recorro el array que devuelve la api
                        data.forEach(category => {
                            let child_category_id = category.id;
                            let newCategoryChildElement = modelCategoryChild.firstElementChild.cloneNode(true);
                            let slugCategoryChild = newCategoryChildElement.querySelector('.slugCategoryChild');
                            let titleCategoryChild = newCategoryChildElement.querySelector('.titleCategoryChild');
                            let quantityProductsCategoryChild = newCategoryChildElement.querySelector('.quantityProductsCategoryChild');

                            titleCategoryChild.textContent = category.category;
                            slugCategoryChild.href = category.slug;
                            // Busco la cantidad de productos de esta categoria
                            axios.get('/get/categories-child-products/'+child_category_id).then( function(response){
                                if (response.data == 0) {
                                    quantityProductsCategoryChild.textContent = "(0)";
                                }else{
                                    quantityProductsCategoryChild.textContent = `(${response.data})`;
                                }
                            });

                            containerCategoriesChild.appendChild(newCategoryChildElement);

                        });
                    });
                }else{
                    // Girar icono de select
                    svg.classList.replace("rotate_select_icon", "return_rotate_select_icon");

                }


            });
        });

        //----------------- Cargo los estados y las ciudades en el DOM ----------------//

        /**** Obtengo la direccion del localstorage ****/
        const ubicationStorage = localStorage.getItem('ubication');
        if(ubicationStorage !== null ){
            const ubication = JSON.parse(ubicationStorage);
        }
        const stateLocalStorage = ubication.state;
        const cityLocalStorage = ubication.city;
        const stateIdLocalStorge = ubication.state_id;
        const cityIdLocalStorge = ubication.city_id;

        // Obtengo el elemento de ejemplo
        const modelStateAndCity = document.getElementById('modelStateAndCity');

        // cargo los estados, y coloco el que se tiene en localstorage
        const containerEstados = document.getElementById('containerEstados');
        // OBTENGO LOS ESTADO
        axios.get('/get/states/').then( function(response){
            const {data} = response;
            let cont = 0;
            data.every( state => {
                let newStateElement = modelStateAndCity.firstElementChild.cloneNode(true);
                let titleElement = newStateElement.querySelector('.titleElement');
                let valueElement = newStateElement.querySelector('.valueElement');

                titleElement.textContent = state.state;
                valueElement.textContent = state.id;

                /* Agrego evento al enviar formulario */
                titleElement.addEventListener('click', event => {
                    // Cargo el nuevo estado en el LocalStorage
                    newUbicationLocalStorage = {
                        state_id: state.id,
                        state: state.state
                    };
                    // Almaceno el estado en el localStorage
                    localStorage.setItem('ubication',JSON.stringify(newUbicationLocalStorage));

                    // Agrego el estado al input del formulario
                    stateSelectedForm.value = state.state;
                    citySelectedForm.value = null;

                    // verifico si existe el input search o existe un input category
                    const querySearch = document.getElementById('querySearch');
                    const categorySelected = document.getElementById('categorySelected');
                    if( querySearch !== null ){

                        formQueryFilter.action = '/products/';


                    }else if( categorySelected !== null ){

                        formQueryFilter.action = `/categorias/${ categorySelected.value }`;
                        // console.log(categorySelected.value)

                    }
                    console.log(formQueryFilter)


                    // envio el formulario, porq fue elegido un estado para filtrar
                    formQueryFilter.submit();
                })

                // agrego el nuevo estado al dom
                containerEstados.appendChild(newStateElement);
                ++cont;
                if ( cont >= 10 ) {
                    return false;
                }else{
                    return true;
                }
            });
        });

        // OBTENGO LAS CIUDADES DEL ESTADO
        if(ubicationStorage !== null ){
            // cargo las ciudades, dependiendo del estaod que se tiene en localstorage
            const containerCiudades = document.getElementById('containerCiudades');
            // Busco las ciudades del estado
            axios.get('/get/cities-state/'+stateIdLocalStorge).then( function( response ){
                const data = response.data;
                let cont = 0;

                data.every( city => {

                    let newCityElement = modelStateAndCity.firstElementChild.cloneNode(true);
                    let titleElement = newCityElement.querySelector('.titleElement');
                    let valueElement = newCityElement.querySelector('.valueElement');

                    titleElement.textContent = city.city;
                    valueElement.textContent = city.id;

                    /* Agrego evento al enviar formulario */
                    titleElement.addEventListener('click', event => {
                        // Cargo el nuevo estado en el LocalStorage
                        newUbicationLocalStorage = {
                            state_id: stateIdLocalStorge,
                            state: stateLocalStorage,
                            city_id: city.id,
                            city: city.city
                        };
                        // Almaceno el estado en el localStorage
                        localStorage.setItem('ubication',JSON.stringify(newUbicationLocalStorage));

                        // Agrego el estado al input del formulario
                        citySelectedForm.value = city.city;
                        stateSelectedForm.value = null;

                        // envio el formulario, porq fue elegido un estado para filtrar
                        formQueryFilter.submit();
                    })

                    // agrego el nuevo estado al dom
                    containerCiudades.appendChild(newCityElement);
                    ++cont;
                    if ( cont >= 10 ) {
                        return false;
                    }else{
                        return true;
                    }

                });
            });
        }
        // cargo el estado y la ciudad del localstorage
        const stateSelected = document.getElementById('stateSelected');
        const citySelected = document.getElementById('citySelected');

        const badgeStateSelected = document.getElementById('badgeStateSelected');
        const badgeCitySelected = document.getElementById('badgeCitySelected');

        if ( stateLocalStorage ) {
            badgeStateSelected.style.display = 'block';
            stateSelected.textContent = stateLocalStorage;
        }else{
            badgeStateSelected.style.display = 'none';
        }

        if ( cityLocalStorage ) {
            badgeCitySelected.style.display = 'block';
            citySelected.textContent = cityLocalStorage;
        }else{
            badgeCitySelected.style.display = 'none';
        }




        /* Configuro el formulario para filtrar */

        // Veo si hay direccion en el localstorage
        if(ubicationStorage !== null ){

            // Agrego el estado y ciudad a los inputs del formulario
            stateSelectedForm.value = stateLocalStorage;
            citySelectedForm.value = cityLocalStorage;

        }



    }

</script>

{{-- Modals --}}
<script>
    //--------------------- Modal de categorias ---------------------//
    const modalCategories = document.querySelectorAll('.modalCategories');
    const categoriesModal = document.getElementById('categoriesModal');
    const closeModalCategories = document.getElementById('closeModalCategories');

    modalCategories.forEach(item => {
        item.addEventListener('click', event => {
            const cardCategoryModalExample = document.getElementById('cardCategoryModalExample');
            const categoryModalContainer = document.getElementById('categoryModalContainer');
            categoryModalContainer.textContent = '';

            // Busco las categorias principales
            axios.get('/get/categories/').then( function( response ){
                const data = response.data;

                data.forEach( category => {

                    let newElement = cardCategoryModalExample.firstElementChild.cloneNode(true);
                    let titleElement = newElement.querySelector('.categoryTitle');
                    let quantityProductsCategory = newElement.querySelector('.quantityProductsCategory');

                    titleElement.textContent = category.category;
                    titleElement.parentNode.href = category.slug;
                    axios.get('/get/total-product-category/'+category.id).then( function( response ){
                        quantityProductsCategory.textContent = ` (${response.data})`;
                    });

                    // agrego el nuevo estado al dom
                    categoryModalContainer.appendChild(newElement);

                });

            });

            categoriesModal.style.display = 'block';
        });
    });
    closeModalCategories.addEventListener('click', event => {
        categoriesModal.style.display = 'none';
    })

    //-------------- Modal de Estados ---------------------//
    const modalStates = document.querySelectorAll('.modalStates');
    const statesModal = document.getElementById('statesModal');
    const closeModalState = document.getElementById('closeModalState');

    modalStates.forEach(item => {
        item.addEventListener('click', event => {
            const cardStateModalExample = document.getElementById('cardStateModalExample');
            const stateModalContainer = document.getElementById('stateModalContainer');
            stateModalContainer.textContent = '';

            // Busco las categorias principales
            axios.get('/get/states/').then( function( response ){
                const {data} = response;

                data.forEach( state => {

                    let newElement = cardStateModalExample.firstElementChild.cloneNode(true);
                    let titleElement = newElement.querySelector('.stateTitle');

                    titleElement.textContent = state.state;
                    titleElement.href = state.state;

                    // agrego el nuevo estado al dom
                    stateModalContainer.appendChild(newElement);

                });
            });


            statesModal.style.display = 'block';
        });
    });
    closeModalState.addEventListener('click', event => {
        statesModal.style.display = 'none';
    })

    // Modal de Ciudades
    const modalCities = document.querySelectorAll('.modalCities');
    const citiesModal = document.getElementById('citiesModal');
    const closeModalCity = document.getElementById('closeModalCity');
    const subtitleStateModalCity = document.getElementById('subtitleStateModalCity');
    // Obtengo la direccion del localstorage
    const ubicationStorage = localStorage.getItem('ubication');
    const ubication = JSON.parse(ubicationStorage);
    const state_id = ubication.state_id;
    const state = ubication.state;

    subtitleStateModalCity.textContent = state;

    modalCities.forEach(item => {
        item.addEventListener('click', event => {
            const cardCityModalExample = document.getElementById('cardCityModalExample');
            const cityModalContainer = document.getElementById('cityModalContainer');
            cityModalContainer.textContent = '';

            // Busco las categorias principales
            axios.get('/get/cities-state/'+state_id).then( function( response ){
                const {data} = response;

                data.forEach( city => {

                    let newElement = cardCityModalExample.firstElementChild.cloneNode(true);
                    let titleElement = newElement.querySelector('.cityTitle');

                    titleElement.textContent = city.city;
                    titleElement.href = city.city;

                    // agrego el nuevo estado al dom
                    cityModalContainer.appendChild(newElement);

                });
            });


            citiesModal.style.display = 'block';
        });
    });
    closeModalCity.addEventListener('click', event => {
        citiesModal.style.display = 'none';
    })

</script>


