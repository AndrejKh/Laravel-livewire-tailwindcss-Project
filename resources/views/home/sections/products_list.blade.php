<div class="grid grid-flow-col grid-cols-7 grid-rows-2 gap-4">
    @foreach ($products as $product)

        @include('components.card_product')

    @endforeach
</div>
