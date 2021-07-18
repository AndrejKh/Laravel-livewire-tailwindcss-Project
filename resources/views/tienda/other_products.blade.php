<div class="flex justify-center mt-4 px-2">
    <div class="max-w-7xl w-full">
        <h3 class="font-regular text-xl text-gray-900 inline">
            Otros productos de {{ $brand->brand }}
        </h3>
        <p class="text-sm font-semibold text-gray-600">
            También te podrian interesar
        </p>
    </div>
</div>
<div class="flex justify-center px-2">
    <div class="owl-carousel owl-theme max-w-7xl my-1 text-center relative" id="other_products">

        @foreach ($other_products_of_brand as $item)

            @include('tienda.card_other_products')

        @endforeach

    </div>
</div>

<script>
    $('#other_products').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots:false,
        responsive:{
            0:{
                items:2
            },
            640:{
                items:3
            },
            768:{
                items:4
            },
            1024:{
                items:5
            },
            1280:{
                items:6
            }
        }
    })
</script>

