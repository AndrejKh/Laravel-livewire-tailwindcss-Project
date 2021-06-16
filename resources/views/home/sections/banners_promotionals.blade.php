@if ( $banners_promotionals && count($banners_promotionals) > 0)
    <div class="max-w-7xl w-full mx-auto mt-5 md:mt-10 px-2">
        <h1 class="font-semibold md:font-bold text-lg md:text-xl text-gray-900 inline">
            Compara los diferentes abastos y supermercados de tu ciudad
        </h1>
        <p class="text-sm font-semibold text-gray-600">
            Haz tus compras en el abasto que mejor se adapte a ti.
        </p>
    </div>

    <div class="owl-carousel owl-theme max-w-7xl my-4 text-center mx-auto px-2" id="carousel_banners_promotionals">

        @foreach ($banners_promotionals as $banner)
            <a href="{{ $banner->url }}" aria-label="ir a la url de la promoción">
                <div class="bg-no-repeat bg-cover bg-center w-full h-24 md:h-36 xl:h-40 overflow-hidden z-10 rounded-md shadow-md" style="background-image: url('/storage/{{ $banner->banner }}');"></div>
            </a>
        @endforeach

    </div>

    <script>
        $('#carousel_banners_promotionals').owlCarousel({
            loop:true,
            margin:15,
            nav:false,
            dots:false,
            navText: ['<img src="{{asset('arrow_left.svg')}}"/>', '<img src="{{asset('arrow_right.svg')}}"/>'],
            responsive:{
                0:{
                    items:2
                },
                768:{
                    items:3
                },
                1024:{
                    items:4
                }
            }
        })
    </script>
@endif
