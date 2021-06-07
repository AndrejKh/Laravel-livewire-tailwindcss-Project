@foreach ($categories as $category)
        @php
            $products = $category->products;
        @endphp


        <div class="flex justify-center mt-3 px-2">
            <div class="max-w-7xl w-full">
                <h2 class="font-bold text-xl text-gray-900 inline">
                    {{ $category->category }} -
                </h2>
                <a class="inline text-blue-700 text-sm" href="{{route('products.category.show', $category->slug)}}">
                    Ver todos
                </a>
                <p class="text-sm">
                    {{ $category->description }}
                </p>
            </div>
        </div>
        <div class="flex justify-center px-2">
            <div class="owl-carousel owl-theme max-w-7xl my-1 text-center relative carousel_products">

                @foreach ($products as $product)

                    @include('components.card_product')

                @endforeach

            </div>
        </div>

        <script>
            $('.carousel_products').owlCarousel({
                loop:true,
                margin:10,
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
                    },
                    1280:{
                        items:6
                    }
                }
            })
        </script>

    @endforeach
