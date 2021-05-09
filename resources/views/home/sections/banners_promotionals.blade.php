@if ( $banners_promotionals && count($banners_promotionals) > 0)
<div class="flex justify-center">


<div class="owl-carousel owl-theme max-w-7xl my-4 text-center" id="carousel_banners_promotionals">
    @foreach ($banners_promotionals as $banner)
    <a href="">
        <img class="w-full rounded-md shadow-md" src="/storage/{{$banner->banner}}" alt="Banner de kabasto, supermercados, compra y venta de productos">
    </a>
    @endforeach

</div>
</div>
<script>
    $('#carousel_banners_promotionals').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
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
