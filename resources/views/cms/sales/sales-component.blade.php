<div>
    {{-- Filtro --}}
    @include('cms.sales.components.filter')

    {{-- Listado de ventas --}}
    <div class="grid grid-cols-1 gap-2 px-0">

        @foreach ($orders as $order)

            @include('cms.sales.components.card_sale')

        @endforeach

    </div>

    {{-- En caso de que el vendedor aun no haya creado ninguna marca, no tendra ventas --}}
    @empty($brands)

        <div class="flex justify-center mt-10">
            <span class="text-lg bg-green-300 px-3 md:px-8 py-4 rounded-md shadow">
                <strong>Aún no has creado tu marca.</strong> ¡Recuerda que para poder vender tus productos, primero debes
                <a class="text-blue-700" href="{{ route('cms.tiendas') }}">crear una marca</a>!
            </span>
        </div>

    @endempty

    {{-- Modals --}}
    @include('cms.sales.components.modals')


    @if ($modalRating)
        {{-- Script para seleccionar las estrella de la calificacion --}}
        <script>
            const stars = document.querySelectorAll('.star');

            // Se rellena de Verde la estrella al hacer hover sobre ella
            stars.forEach(star => {
                star.addEventListener('mouseover', event => {
                    const item = event.target;
                    if ( event.target.nodeName == 'path' ){
                        var svgStar = item.parentNode;
                    }else{
                        var svgStar = item;
                    }

                    // debo rellenar de verde todas las estrellas anteriores a la actual
                    const rootContainer = svgStar.parentNode;

                    const svgChildren = rootContainer.querySelectorAll('svg');

                    for (let index = 0; index < svgChildren.length; index++) {
                        if (svgChildren.item(index) == svgStar) {
                            svgChildren.item(index).children.item(0).setAttribute("fill", "#2BCB00");
                            svgChildren.item(index).children.item(1).setAttribute("fill", "#2BCB00");
                            break;
                        }else{
                            svgChildren.item(index).children.item(0).setAttribute("fill", "#2BCB00");
                            svgChildren.item(index).children.item(1).setAttribute("fill", "#2BCB00");
                        }

                    }

                })
            })

            // Se quita el relleno de Verde de la estrella al dejar de hacer hover sobre ella
            stars.forEach(star => {
                star.addEventListener('mouseout', event => {
                    const item = event.target;
                    if ( event.target.nodeName == 'path' ){
                        var svgStar = item.parentNode;
                    }else{
                        var svgStar = item;
                    }

                    //obtengo la estrella seleccionada
                    let starSelected = localStorage.getItem('starSelected');
                    // Veo si ya se selecciono una estrella via local storage
                    // en caso de no ser asi, regreso todas las estrellas a sus colores normales
                    if (starSelected !== null) {
                        // Paso a formato JSON el string que obtuve del local Storage
                        const jsonStarSelected = JSON.parse(starSelected);

                        // Ahora Dejo visibles solo las estrellas que se selccionaron

                        const containerStars = document.getElementById('rootContainerStars');
                        const svgChildren = containerStars.querySelectorAll('svg');

                        let band = 0;

                        for (let index = 0; index < svgChildren.length; index++) {

                            if( band == 1 ){

                                svgChildren.item(index).children.item(0).setAttribute("fill", "#fff");
                                svgChildren.item(index).children.item(1).setAttribute("fill", "#6B7280");

                            }

                            if (svgChildren.item(index).id == jsonStarSelected.star) {
                                band = 1;
                            }

                        }

                    }else{

                        // Oculto todas las estrellas
                        // debo rellenar de verde todas las estrellas anteriores a la actual
                        const rootContainer = svgStar.parentNode;

                        const svgChildren = rootContainer.querySelectorAll('svg');

                        for (let index = 0; index < svgChildren.length; index++) {
                                svgChildren.item(index).children.item(0).setAttribute("fill", "#fff");
                                svgChildren.item(index).children.item(1).setAttribute("fill", "#6B7280");

                        }

                    }

                })
            })

            // Guardo en Local Storage la estrella seleccionada
            stars.forEach(star => {
                star.addEventListener('click', event => {
                    const item = event.target;
                    if ( event.target.nodeName == 'path' ){
                        var svgStar = item.parentNode;
                    }else{
                        var svgStar = item;
                    }

                    let starSelected = {
                        star: svgStar.id
                    };
                    // Almaceno el producto en el localStorage
                    localStorage.setItem('starSelected',JSON.stringify(starSelected));

                })
            })

        </script>

        {{-- Script para enviar la calificacion --}}
        <script>
            const confirmarRating = document.getElementById('confirmarRating');
            confirmarRating.addEventListener('click', event => {
                const csrf_token = document.getElementById('csrf_token').textContent;
                // //obtengo la estrella seleccionada
                const starSelected = localStorage.getItem('starSelected');
                // Paso a formato JSON el string que obtuve del local Storage
                const jsonStarSelected = JSON.parse(starSelected);

                const star = jsonStarSelected.star;

                const rating = star.charAt(star.length - 1);
                console.log(rating)

                const comment = document.getElementById('comment').value;

                const brand_id = document.getElementById('brand_id').textContent;
                const user_id = document.getElementById('user_id').textContent;
                const order_id = document.getElementById('order_id').textContent;

                const data = {
                        rating: rating,
                        comment: comment,
                        brand_id: brand_id,
                        user_id: user_id,
                        order_id: order_id
                    };

                axios({
                        method  : 'post',
                        url : '/post/rating-seller/',
                        data : data,
                        headers: {
                            'content-type': 'text/json',
                            'X-CSRF-Token': csrf_token
                            }
                    })
                    .then((res)=>{
                        console.log(res)
                        if(res.data === 'success'){
                            localStorage.removeItem('starSelected');
                            const closeButtonModalRating = document.getElementById('closeButtonModalRating');
                            let click_event = new CustomEvent('click');
                            closeButtonModalRating.dispatchEvent(click_event);
                        }
                    })
                    .catch((err) => {console.log(err)});

            })





        </script>
    @endif

    {{-- script para ocultar o mostrar el boton de confirmar entrega de productos --}}
    <script>
        const confirmSale = document.getElementById('confirmSale');
        const disabledButtonConfirmSale = document.getElementById('disabledButtonConfirmSale');
        const ableButtonConfirmSale = document.getElementById('ableButtonConfirmSale');


        confirmSale.addEventListener('change', event => {
            if(event.target.checked){
                disabledButtonConfirmSale.classList.replace("block","hidden");
                ableButtonConfirmSale.classList.replace("hidden","block");
            } else{
                disabledButtonConfirmSale.classList.replace("hidden","block");
                ableButtonConfirmSale.classList.replace("block","hidden");
            }
        })
    </script>


    <script>
        function resetRatingStorage(){
            localStorage.removeItem('starSelected');
        }
    </script>

    @include('common.alert')
</div>


