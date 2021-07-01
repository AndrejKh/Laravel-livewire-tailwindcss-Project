@foreach ($principal_categories as $category)

    <div class="max-w-7xl w-full mx-auto mt-5 md:mt-10 px-2">
        <h2 class="font-bold text-xl text-gray-900 inline">
            {{ $category->category }} -
        </h2>
        <a class="inline text-blue-700 text-sm" href="{{route('products.category.show', $category->slug)}}" aria-label="ver todos los productos de la categoría {{ $category->category }}">
            Ver todos
        </a>
        <p class="text-sm font-semibold text-gray-600">
            {{ $category->description }}
        </p>
    </div>

    <div class="owl-carousel owl-theme max-w-7xl mx-auto px-2 my-1 text-center relative carousel_products">

        @foreach ($category->products as $product)

            @include('components.card_product')

        @endforeach

    </div>

@endforeach
<script>
    $('.carousel_products').owlCarousel({
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
