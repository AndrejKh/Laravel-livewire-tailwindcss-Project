@if ( $principal_categories && count($principal_categories) > 0)
<div class="owl-carousel w-full h-13 bg-white px-3 flex flex-wrap content-center" id="carousel_categories_home">

        @foreach ($principal_categories as $category)
            <div class="item py-2">
                @include('components.category_menu_link')
            </div>
        @endforeach


</div>
<script>
    $('#carousel_categories_home').owlCarousel({
        loop:false,
        margin:0,
        nav:false,
        dots:false,
        autoWidth:true
    })
</script>
@endif
