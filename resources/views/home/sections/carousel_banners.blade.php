@if ( $carousel_banners && count($carousel_banners) > 0)
<div class="owl-carousel owl-theme w-full" id="carousel_banners_home">

    @foreach ($carousel_banners as $banner)
    <div class="item h-40 md:h-60 lg:h-72 xl:h-80 ">

        <img src="/storage/{{$banner->banner}}">
    </div>
    @endforeach
</div>
<script>
    $('#carousel_banners_home').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        navText: ['<img src="{{'icons/arrow_left.svg'}}"/>', '<img src="{{'icons/arrow_right.svg'}}"/>'],
        responsive:{
            0:{
                items:1
            }
        }
    })
</script>
@endif



