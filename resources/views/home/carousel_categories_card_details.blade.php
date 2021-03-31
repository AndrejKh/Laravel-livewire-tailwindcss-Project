@if ( $categories && count($categories) > 0)
<div class="flex justify-center mt-3">
    <div class="max-w-7xl w-full">
        <h3 class="text-lg text-gray-800 px-2">
            Algunas categorias para tí
        </h3>
    </div>
</div>
<div class="flex justify-center">
    <div class="owl-carousel owl-theme max-w-7xl my-1 lg:my-4 px-2" id="categories_carousel_card_details">
        @foreach ($categories as $category)
            @include('components.card_category_details')
        @endforeach
    </div>
</div>
<script>
    $('#categories_carousel_card_details').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            768:{
                items:2
            }
        }
    })
</script>
@endif
