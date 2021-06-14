@if ( $banners_promotionals && count($banners_promotionals) > 0)
<div class="flex justify-center mt-4 px-2">
    <div class="max-w-7xl w-full">
        <h1 class="font-regular md:font-bold text-lg md:text-xl text-gray-900 inline">
            Compara los diferentes abastos y supermercados de tu ciudad
        </h1>
        <p class="text-sm font-semibold text-gray-600">
            Haz tus compras en el abasto que mejor se adapte a ti.
        </p>
    </div>
</div>
    <div class="flex justify-center px-2">

        <div class="owl-carousel owl-theme max-w-7xl my-4 text-center" id="carousel_banners_promotionals">

            @foreach ($banners_promotionals as $banner)
                <a href="{{ $banner->url }}">
                    <div class="bg-no-repeat bg-cover bg-center w-full h-24 md:h-36 xl:h-40 overflow-hidden z-10 rounded-md shadow-md" style="background-image: url('/storage/{{ $banner->banner }}');"></div>
                </a>
            @endforeach

        </div>

    </div>

    <script>
        $('#carousel_banners_promotionals').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            dots:false,
            navText: ['<img src="{{asset('icons/arrow_left.svg')}}"/>', '<img src="{{asset('icons/arrow_right.svg')}}"/>'],
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
