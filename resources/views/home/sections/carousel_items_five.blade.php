@if ( $carousel_items_five && count($carousel_items_five) > 0)
<div class="flex justify-center mt-3">
    <div class="max-w-7xl w-full">
        <h2 class="font-bold text-xl text-gray-900">{{ $carousel_items_five[0]->category->category }}</h2>
    </div>
</div>
<div class="flex justify-center">
    <div class="owl-carousel owl-theme max-w-7xl my-4 text-center relative" id="carousel_items_five">

        @foreach ($carousel_items_five as $product)

            @include('components.card_product')

        @endforeach

    </div>
</div>

<script>
    $('#carousel_items_five').owlCarousel({
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
@endif
