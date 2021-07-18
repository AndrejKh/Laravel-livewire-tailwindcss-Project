<div class="flex justify-center mt-10 px-2">
    <div class="max-w-7xl w-full">
        <h3 class="font-regular text-xl text-gray-900 inline">
            Otros productos que te podrían interesar
        </h3>
        <p class="text-sm font-semibold text-gray-600">
            Recuerda que al final puedes comparar en diferentes abastos o supermercados de tu ciudad
        </p>
    </div>
</div>
<div class="flex justify-center px-2 mb-6">
    <div class="owl-carousel owl-theme max-w-7xl my-1 text-center relative" id="other_products">

        @foreach ($other_products as $product)

            @include('components.card_product')

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
