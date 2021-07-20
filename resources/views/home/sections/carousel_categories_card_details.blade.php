@if ( $home_categories && count($home_categories) > 0)
    <div class="max-w-7xl w-full mx-auto mt-3 px-2">
        <div class="text-lg text-gray-800 inline">
            Algunas categorías para tí -
        </div>
        <a class="inline text-blue-700 text-sm" href="{{ route('categorias') }}" aria-label="ver todas las categorías de kabasto">Ver todas</a>
        <p class="text-sm font-semibold text-gray-600">Encuentra los diversos productos que estas buscando</p>
    </div>
    <div class="owl-carousel owl-theme max-w-7xl mx-auto my-1 lg:my-4 px-2" id="categories_carousel_card_details">
        @foreach ($home_categories as $category)
            @include('components.card_category_details')
        @endforeach
    </div>
    <script>
        $('#categories_carousel_card_details').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                768:{
                    items:2
                }
            }
        })
    </script>
@endif
