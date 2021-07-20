@if ( $banners_brands_list && count($banners_brands_list) > 0)
<div class="hidden md:block">
    <div class="owl-carousel owl-theme w-full" id="carousel_banner">

        @foreach ($banners_brands_list as $banner)

                <div class="h-24 sm:h-28 md:h-36 bg-no-repeat bg-cover bg-center w-full overflow-hidden z-10 shadow-md"
                style="background-image: url('/storage/{{ $banner->banner }}');">
                </div>

        @endforeach

    </div>
</div>
    <script>
        $('#carousel_banner').owlCarousel({
            loop:true,
            margin:0,
            nav:true,
            autoplay: true,
            autoplayTimeout: 5000,
            navText: ['<img src="{{asset('arrow_left.svg')}}" alt="anterior imagen" width="25px" height="25px" loading="lazy"/>', '<img src="{{asset('arrow_right.svg')}}" alt="siguiente imagen" width="25px" height="25px" loading="lazy"/>'],
            responsive:{
                0:{
                    items:1
                }
            }
        })
    </script>
@endif



