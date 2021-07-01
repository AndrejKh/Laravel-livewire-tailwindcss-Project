@if ( $carousel_banners && count($carousel_banners) > 0)
    <div class="owl-carousel owl-theme w-full" id="carousel_banners_home">

        @foreach ($carousel_banners as $banner)
            <div class="item h-28 sm:h-40 md:h-60 lg:h-72 xl:h-80 bg-no-repeat bg-cover bg-top w-full overflow-hidden z-10 rounded-md shadow-md"
            style="background-image: url('/storage/{{ $banner->banner }}');">
            </div>
        @endforeach

    </div>
    <script>
        $('#carousel_banners_home').owlCarousel({
            loop:true,
            margin:0,
            nav:true,
            navText: ['<img src="{{asset('arrow_left.svg')}}"/>', '<img src="{{asset('arrow_right.svg')}}"/>'],
            responsive:{
                0:{
                    items:1
                }
            }
        })
    </script>
@endif



