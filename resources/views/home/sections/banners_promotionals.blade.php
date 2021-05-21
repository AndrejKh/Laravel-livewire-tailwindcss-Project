@if ( $banners_promotionals && count($banners_promotionals) > 0)
<div class="flex justify-center px-2">


<div class="owl-carousel owl-theme max-w-7xl my-4 text-center" id="carousel_banners_promotionals">
    @foreach ($banners_promotionals as $banner)
    <a href="">
        <div class="bg-no-repeat bg-cover bg-center w-full h-32 md:h-40 xl:h-44 overflow-hidden z-10 rounded-md shadow-md" style="background-image: url('/storage/{{ $banner->banner }}');"></div>
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
