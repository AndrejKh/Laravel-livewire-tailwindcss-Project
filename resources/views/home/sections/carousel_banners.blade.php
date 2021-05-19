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
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path fill="#fff" d="M15.41 16.59L10.83 12l4.58-4.59L14 6l-6 6 6 6 1.41-1.41z"/><path d="M0 0h24v24H0V0z" fill="none"/></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path fill="#fff" d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"/><path d="M0 0h24v24H0V0z" fill="none"/></svg>'
            ],
        responsive:{
            0:{
                items:1
            }
        }
    })
</script>
@endif



