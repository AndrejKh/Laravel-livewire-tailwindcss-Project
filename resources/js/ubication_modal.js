
document.addEventListener("DOMContentLoaded", function() {
    const modalUbication = document.getElementById('modalUbication');
    const ubication = localStorage.getItem('ubication');

    if( ubication === null ){

        modalUbication.style.display = 'block';
    }else{
        let ubicationObject = JSON.parse(ubication);
        const city = ubicationObject.city;
        if( city !== null ){

            // Agregar la ciudad en el DOM
            const ubicationText = document.querySelectorAll('.ubicationText')
            ubicationText.forEach(element => {
                element.textContent = city;
            });

        }
    }
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

        // Agregar la ciudad en el DOM
        const ubicationText = document.querySelectorAll('.ubicationText')
        ubicationText.forEach(element => {
            element.textContent = city;
        });


        // hago el llamdo axios para guardar los datos del estado y ciudad en variables de session php(backend)
        axios.get('/set/state-city/'+state_id+'/'+city_id).then( function(response){
            // alert(response)
        });


    })


    const selectState = document.getElementById('selectState');
    selectState.addEventListener('change', event => {
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

    const ubicationTag = document.querySelectorAll('.ubicationTag')
    ubicationTag.forEach(element => {
        element.addEventListener('click', event => {

            modalUbication.style.display = 'block';

        })
    });

    const modalUbicationButtonClose = document.getElementById('modalUbicationButtonClose');
    modalUbicationButtonClose.addEventListener('click', event => {
        modalUbication.style.display = 'none';
    })

    // cerrar modal al dar click fuera del modal
    const contentModalUbication = document.getElementById('contentModalUbication')
    const backgroundModalUbication = document.getElementById('backgroundModalUbication')
    backgroundModalUbication.addEventListener('click', event => {
        if( !contentModalUbication.contains(event.target) ){
            modalUbication.style.display = 'none';
        }
    })

});
