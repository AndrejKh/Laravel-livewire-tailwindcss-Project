@if ( $deliveries && count($deliveries) > 0)

<div class="flex justify-center mt-3 px-2">
    <div class="max-w-7xl w-full">
        <h2 class="font-bold text-xl text-gray-900">Zonas de Delivery</h2>
    </div>
</div>

<div class="flex justify-center">

    <div class="owl-carousel owl-theme max-w-7xl my-2 text-center relative px-2" id="carousel_deliveries_tienda">
        @foreach ($deliveries as $delivery)
        <div class="bg-white rounded-md shadow-md grid grid-cols-6 gap-1 py-3 px-2">
            <div class="col-span-4 text-left">
                <span class="text-lg md:text-xl font-bold text-gray-900">
                    {{ $delivery->delivery_zone }}
                </span>
                <span class="text-md text-gray-700 block">
                    {{ $delivery->state->state }}, {{ $delivery->city->city }}
                </span>

            </div>
            <div class="col-span-2 text-right">
                @if ($delivery->delivery_free === 1)
                <span class="text-xs sm:text-sm text-light text-white bg-green-450 px-3 py-1 rounded-full">
                    Delivery gratis
                </span>
                <span class="font-bold">
                    En {{ $delivery->delivery_time }} Hrs.
                </span>

                @else
                <span class="text-sm text-light text-white bg-blue-450 px-3 py-1 rounded-full">
                    {{ $delivery->min_amount_purchase }}$ Delivery
                </span>
                @endif

            </div>

            <div class="col-span-6">
                <div class="grid grid-cols-4">
                    <div class="col-span-3 text-blue-800 text-sm md:text-md text-left self-end" title="Días que haces delivery">
                        @php
                            $days = explode(',',$delivery->days);
                            $array_days = array();
                            foreach ($days as $day) {
                                switch ($day) {
                                    case 'lunes':
                                        $array_days[0] = 'Lun';
                                        break;
                                    case 'martes':
                                        $array_days[1] = 'Mar';
                                        break;
                                    case 'miercoles':
                                        $array_days[2] = 'Mie';
                                        break;
                                    case 'jueves':
                                        $array_days[3] = 'Jue';
                                        break;
                                    case 'viernes':
                                        $array_days[4] = 'Vie';
                                        break;
                                    case 'sabado':
                                        $array_days[5] = 'Sab';
                                        break;
                                    default:
                                        array_push($array_days,'Dom');
                                        break;
                                }
                            }
                            ksort($array_days) ;
                            $days = implode(', ',$array_days);
                            echo $days;
                        @endphp
                    </div>
                    <span class="col-span-1 text-right self-center">
                        <span class="text-md text-gray-900 text-semibold block mt-1">
                            A partir de
                        </span>
                        <strong class="text-xl font-semibold text-gray-900 block">
                            {{ $delivery->min_amount_purchase }} $
                        </strong>
                    </span>
                </div>
            </div>

        </div>
        @endforeach
    </div>

</div>
<script>
    $('#carousel_deliveries_tienda').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            1280:{
                items:3
            }
        }
    })
</script>
@endif
