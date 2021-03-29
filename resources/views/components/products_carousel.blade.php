@if ( $products && count($products) > 0)

<div class="flex justify-center">
    <div class="owl-carousel owl-theme max-w-7xl my-4 text-center relative" id="carousel_products_categories">

        @foreach ($products as $product)

            @include('components.card_product')

        @endforeach

    </div>
</div>

<script>
    $('#carousel_products_categories').owlCarousel({
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
