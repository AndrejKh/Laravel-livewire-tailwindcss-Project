@if ( $principal_categories && count($principal_categories) > 0)
<div class="flex justify-center mt-3 px-2">
    <div class="max-w-7xl w-full">
        <h3 class="text-lg text-gray-800 inline">
            Algunas categorías para tí -
        </h3>
        <a class="inline text-blue-700 text-sm" href="{{ route('categorias') }}">Ver todas</a>
        <p class="text-sm font-semibold text-gray-600">Encuentra los diversos productos que estas buscando</p>
    </div>
</div>
<div class="flex justify-center px-2">
    <div class="owl-carousel owl-theme max-w-7xl my-1 lg:my-4 px-2" id="categories_carousel_card_details">
        @foreach ($principal_categories as $category)
            @include('components.card_category_details')
        @endforeach
    </div>
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
