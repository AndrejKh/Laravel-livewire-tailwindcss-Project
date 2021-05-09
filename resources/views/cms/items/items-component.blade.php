<div class="container w-full mx-auto">
    {{-- Filtro --}}
    @include('cms.items.components.filter')

    @if ($items)

        @if ($items->count())
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-2 md:gap-3">

            @foreach ($items as $item)

                @include('cms.items.components.card_item')

            @endforeach
        </div>

        {{ $items->links() }}
        @else
            <div class="text-gray-400 bg-white py-3 px-4 border-t border-gray-200 mb-10">No se encontraron resultados </div>
        @endif
    @else
        <div class="text-gray-900 bg-white py-3 px-4 border-t border-gray-200 mb-10">No tienes aun productos. Recuerda que debes primero crear tu marca para poder agregar productos!</div>
    @endif

    {{-- Modals --}}
    @include('cms.items.components.modals')

    @include('common.alert')

</div>
