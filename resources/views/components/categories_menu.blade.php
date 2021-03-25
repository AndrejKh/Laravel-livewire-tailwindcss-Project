@if ( $carousel_banners && count($carousel_banners) > 0)
<div class="owl-carousel w-full h-14 bg-gray-200 px-3 py-2 flex flex-wrap content-center" id="carousel_categories_home">

        @foreach ($categories as $category)
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
