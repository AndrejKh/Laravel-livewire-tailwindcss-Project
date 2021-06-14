{{-- Al caragar la pagina web --}}
<script>

    window.onload = function(){
       //  Obtengo el formulario de envio para filtrar
       const formQueryFilter = document.getElementById('formQueryFilter');
       const stateSelectedForm = document.getElementById('stateSelectedForm');
       const citySelectedForm = document.getElementById('citySelectedForm');

       const siteUrl = document.getElementById('siteUrl').textContent.trim();

       //------------------ Cargar y mostrar todos las categorias hijos de la categoria principal -------------//
       const categoryPrincipal = document.querySelectorAll('.categoryPrincipal');
       const displayCategoriesChildren = document.querySelectorAll('.displayCategoriesChildren');
       const modelCategoryChild = document.getElementById('modelCategoryChild');
       // Obtengo las CATEGORIAS del filtro, y los cargo en el DOM
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
                           slugCategoryChild.href = `${siteUrl}/categorias/${category.slug}`;
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

       // Obtengo el elemento de ejemplo
       const modelStateAndCity = document.getElementById('modelStateAndCity');

       // cargo los estados, y coloco el que se tiene en localstorage
       const containerEstados = document.getElementById('containerEstados');
       // OBTENGO LOS ESTADO
       axios.get('/get/states/').then( function(response){
           const {data} = response;
           let cont = 0;
           data.every( state => {

               // Funcion para colocar el estado en el dom y agregarle un evento click
               setElementToDom( modelStateAndCity, containerEstados, state.state, state.id, 'estado' );

               // Contador para solo mostrar los 10 primeros estados
               ++cont;
               if ( cont >= 10 ) {
                   return false;
               }else{
                   return true;
               }

           });
       });

       /**** Obtengo la direccion del localstorage ****/
       const ubicationStorage = localStorage.getItem('ubication');
       const listCitiesFilter = document.getElementById('listCitiesFilter');

       if(ubicationStorage !== null ){
            listCitiesFilter.style.display = 'block';

           const ubication = JSON.parse(ubicationStorage);
           const stateLocalStorage = ubication.state;
           const cityLocalStorage = ubication.city;
           const stateIdLocalStorge = ubication.state_id;
           const cityIdLocalStorge = ubication.city_id;

           // OBTENGO LAS CIUDADES DEL ESTADO
           // cargo las ciudades, dependiendo del estaod que se tiene en localstorage
           const containerCiudades = document.getElementById('containerCiudades');
           // Busco las ciudades del estado
           axios.get('/get/cities-state/'+stateIdLocalStorge).then( function( response ){
               const data = response.data;
               let cont = 0;

               data.every( city => {

                   // Funcion para colocar el estado en el dom y agregarle un evento click
                   setElementToDom( modelStateAndCity, containerCiudades, city.city, city.id, 'ciudad' );

                   // Contador para solo mostrar las 10 primers ciudades
                   ++cont;
                   if ( cont >= 10 ) {
                       return false;
                   }else{
                       return true;
                   }

               });
           });

           /* Configuro el formulario para filtrar y muestro u oculto los badges si existe estdo y ciudad en el localstorage */
           // Muestro los badges en el filtro
           const badgeStateSelected = document.getElementById('badgeStateSelected');
           const badgeCitySelected = document.getElementById('badgeCitySelected');
           // span que contendran el nombre del estado y ciudad del localstorage
           const stateSelected = document.getElementById('stateSelected');
           const citySelected = document.getElementById('citySelected');


           // Agrego el estado y ciudad a los inputs del formulario
           stateSelectedForm.value = stateLocalStorage;
           citySelectedForm.value = cityLocalStorage;


           // configuro los badges
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

       }else{
           // Oculto la lista de ciudades
           listCitiesFilter.style.display = 'none';
           // No existe ubicacion en el localstorage, oculto los badges
           badgeStateSelected.style.display = 'none';
           badgeCitySelected.style.display = 'none';
       }

   }

</script>

{{-- Modals --}}
<script>
   const siteUrl = document.getElementById('siteUrl').textContent.trim();
   //--------------------- Modal de categorias ---------------------//
   const modalCategories = document.querySelectorAll('.modalCategories');
   const categoriesModal = document.getElementById('categoriesModal');
   const closeModalCategories = document.getElementById('closeModalCategories');

   modalCategories.forEach(item => {
       item.addEventListener('click', event => {
           categoriesModal.style.display = 'block';

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
                   titleElement.parentNode.href = `${siteUrl}/categorias/${category.slug}`;
                   axios.get('/get/total-product-category/'+category.id).then( function( response ){
                       quantityProductsCategory.textContent = ` (${response.data})`;
                   });

                   // agrego el nuevo estado al dom
                   categoryModalContainer.appendChild(newElement);

               });

           });


       });
   });
   closeModalCategories.addEventListener('click', event => {
       categoriesModal.style.display = 'none';
   })
   //-------------- End Modal de categorias ---------------------//


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
                   // Funcion para colocar el estado en el dom y agregarle un evento click
                   setElementToDom( cardStateModalExample, stateModalContainer, state.state, state.id, 'estado' );

               });
           });

           statesModal.style.display = 'block';
       });
   });
   closeModalState.addEventListener('click', event => {
       statesModal.style.display = 'none';
   })
   //-------------- End Modal de Estados ---------------------//



   //-------------- Modal de Ciudades ---------------------//
   const modalCities = document.querySelectorAll('.modalCities');
   const citiesModal = document.getElementById('citiesModal');
   const closeModalCity = document.getElementById('closeModalCity');
   const subtitleStateModalCity = document.getElementById('subtitleStateModalCity');
   // Obtengo la direccion del localstorage
   const ubicationStorage = localStorage.getItem('ubication');
   if(ubicationStorage !== null ){
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

                       // Funcion para colocar el estado en el dom y agregarle un evento click
                       setElementToDom( cardCityModalExample, cityModalContainer, city.city, state.id, 'ciudad' );

                   });
               });


               citiesModal.style.display = 'block';
           });
       });
   }
   closeModalCity.addEventListener('click', event => {
       citiesModal.style.display = 'none';
   })

   //-------------- End Modal de Ciudades ---------------------//

</script>

{{-- Badge Elimnar --}}
<script>
    // Al elminar el badge de Estado
    const removeStateSelected = document.querySelectorAll('.removeStateSelected');
    removeStateSelected.forEach( item => {
        item.addEventListener('click', event => {
            // Elimino la propiedad ubication del localstorage
            localStorage.removeItem('ubication');
            // Configuro el fromulario para enviarlo
            const formQueryFilter = document.getElementById('formQueryFilter');
            const stateSelectedForm = document.getElementById('stateSelectedForm');
            const citySelectedForm = document.getElementById('citySelectedForm');
            stateSelectedForm.value = '';
            citySelectedForm.value = '';
            // envio el formulario, porq fue elegido un estado para filtrar
            formQueryFilter.submit();
        });
   });

   // Al elminar el badge de Ciudad
   const removeCitySelected = document.querySelectorAll('.removeCitySelected');
   removeCitySelected.forEach( item => {
        item.addEventListener('click', event => {
            // Obtengo el estado del LocalStorage
            const ubicationStorage = localStorage.getItem('ubication');
            const ubication = JSON.parse(ubicationStorage);
            const stateLocalStorage = ubication.state;
            const stateIdLocalStorge = ubication.state_id;

            // Cargo el nuevo estado en el LocalStorage
            newUbicationLocalStorage = {
                state_id: stateIdLocalStorge,
                state: stateLocalStorage,
                city: null,
                city_id: null
            };
            // Almaceno el estado en el localStorage
            localStorage.setItem('ubication',JSON.stringify(newUbicationLocalStorage));

            // Configuro el fromulario para enviarlo
            const formQueryFilter = document.getElementById('formQueryFilter');
            const citySelectedForm = document.getElementById('citySelectedForm');
            citySelectedForm.value = '';
            // envio el formulario, porq fue elegido un estado para filtrar
            formQueryFilter.submit();
        });
   });
</script>

{{-- Funciones  --}}
<script>
   // Funcion que agrega estado al DOM (filtro y modal) y le agrega un evento click
   function setElementToDom( elementContainer, containerNewElements, title, value, estado_ciudad ){

       let newElement = elementContainer.firstElementChild.cloneNode(true);
       let titleElement = newElement.querySelector('.titleElement');
       let valueElement = newElement.querySelector('.valueElement');

       titleElement.textContent = title;
       valueElement.textContent = value;

       /* Agrego evento al enviar formulario */
       titleElement.addEventListener('click', event => {
           if( estado_ciudad == 'estado' ){
               // Configuro el local storage y envio el formulario
               setStateLocalRedirectForm(title, value, null, null);

           }else{
               // Obtengo el estado del LocalStorage
               const ubicationStorage = localStorage.getItem('ubication');
               const ubication = JSON.parse(ubicationStorage);
               const stateLocalStorage = ubication.state;
               const stateIdLocalStorge = ubication.state_id;

               // Configuro el local storage y envio el formulario
               setStateLocalRedirectForm(stateLocalStorage, stateIdLocalStorge, title, value);
           }

       })

       // agrego el nuevo estado al dom
       containerNewElements.appendChild(newElement);

   }

   // Funcion que guarda el estado seleccionado en LocalStorage y envio el formulario
   function setStateLocalRedirectForm( state, state_id, city, city_id ){
       //  Obtengo el formulario de envio para filtrar
       const formQueryFilter = document.getElementById('formQueryFilter');
       const stateSelectedForm = document.getElementById('stateSelectedForm');
       const citySelectedForm = document.getElementById('citySelectedForm');

       // Cargo el nuevo estado en el LocalStorage
       newUbicationLocalStorage = {
           state_id: state_id,
           state: state,
           city: city,
           city_id: city_id
       };
       // Almaceno el estado en el localStorage
       localStorage.setItem('ubication',JSON.stringify(newUbicationLocalStorage));

       // Agrego el estado al input del formulario
       stateSelectedForm.value = state;
       citySelectedForm.value = city;

       // verifico si existe el input search o existe un input category
       const querySearch = document.getElementById('querySearch');
       const categorySelected = document.getElementById('categorySelected');
       if( querySearch !== null ){

           formQueryFilter.action = '/listado-de-productos/';

       }else if( categorySelected !== null ){

           formQueryFilter.action = `/categorias/${ categorySelected.value }`;

       }

       // envio el formulario, porq fue elegido un estado para filtrar
       formQueryFilter.submit();

   }
</script>
