@if ( $principal_categories && count($principal_categories) > 0)

<div class="flex justify-center">

    <div class="owl-carousel owl-theme max-w-7xl my-4 text-center relative" id="carousel_banners_categories">
        @foreach ($principal_categories as $category)

        <a class="w-full" href="{{route('products.category.show', $category->slug)}}">
            <span class="absolute inset-x-0 w-full h-full object-cover bg-gray-800 rounded-md opacity-70 hover:opacity-90 flex justify-center">
                <span class="self-center text-white text-2xl opacity-100 text-center">
                    {{$category->category}}
                </span>
            </span>
            <img class="w-full rounded-md shadow-md z-10" src="/storage/{{$category->photo}}" alt="{{$category->category}}">
        </a>

        @endforeach

    </div>
</div>
<script>
    $('#carousel_banners_categories').owlCarousel({
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
            }
        }
    })
</script>
@endif



