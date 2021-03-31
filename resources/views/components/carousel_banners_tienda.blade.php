@if ( $banners_promotionals && count($banners_promotionals) > 0)

<div class="flex justify-center">

    <div class="owl-carousel owl-theme max-w-7xl my-2 text-center relative" id="carousel_banners_tienda">
        @foreach ($banners_promotionals as $banner)
            <div class="bg-no-repeat bg-cover bg-center w-full h-20 md:h-32 lg:h-36 overflow-hidden rounded-lg" style="background-image: url('/storage/{{$banner->photo}}');"></div>
        @endforeach
    </div>

</div>
<script>
    $('#carousel_banners_tienda').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots:false,
        responsive:{
            0:{
                items:2
            },
            1280:{
                items:3
            }
        }
    })
</script>
@endif



