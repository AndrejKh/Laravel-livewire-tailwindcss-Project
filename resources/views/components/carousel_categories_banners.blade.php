@if ( $principal_categories && count($principal_categories) > 0)

    <div class="owl-carousel owl-theme max-w-7xl mx-auto my-4 text-center relative px-2" id="carousel_banners_categories">
        @foreach ($principal_categories as $category)
            <a class="w-full" href="{{route('products.category.show', $category->slug)}}" aria-label="ver los productos de la categoría {{$category->category}}">
                <span class="absolute inset-x-0 w-full h-full object-cover bg-gray-800 rounded-md opacity-70 hover:opacity-90 flex justify-center">
                    <span class="self-center text-white text-2xl opacity-100 text-center">
                        {{$category->category}}
                    </span>
                </span>
                <div class="bg-no-repeat bg-cover bg-center w-full h-24 md:h-36 xl:h-36 overflow-hidden z-10 rounded-md shadow-md" style="background-image: url('/storage/{{ $category->photo }}');"></div>
            </a>
        @endforeach
    </div>
    <script>
        $('#carousel_banners_categories').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            dots:false,
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



