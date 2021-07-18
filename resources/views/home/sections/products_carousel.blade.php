@if ( $products && count($products) > 0)
    <div class="max-w-7xl w-full mx-auto mt-2 md:mt-4 px-2">
        <h2 class="font-bold text-xl text-gray-900 inline">
            Productos destacados -
        </h2>
        <a class="inline text-blue-700 text-sm" href="{{ route('products.show') }}" aria-label="ver todos los productos destacados">
            Ver todos
        </a>
        <p class="text-sm font-semibold text-gray-600">
            Los mejores productos de todos abastos
        </p>
    </div>
    <div class="owl-carousel owl-theme max-w-7xl mx-auto px-2 my-1 text-center relative" id="carousel_products_destacados">

        @foreach ($products as $product)
            @include('components.card_product')
        @endforeach

    </div>
@endif
<script>
    $('#carousel_products_destacados').owlCarousel({
        loop:true,
        margin:15,
        nav:false,
        dots:false,
        responsive:{
            0:{
                items:2
            },
            640:{
                items:3
            },
            768:{
                items:4
            },
            1024:{
                items:5
            }
        }
    })
</script>
