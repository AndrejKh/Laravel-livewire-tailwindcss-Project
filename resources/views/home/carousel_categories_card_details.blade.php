@if ( $categories && count($categories) > 0)
<div class="flex justify-center">
    <div class="owl-carousel owl-theme max-w-7xl my-4" id="categories_carousel_card_details">

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
