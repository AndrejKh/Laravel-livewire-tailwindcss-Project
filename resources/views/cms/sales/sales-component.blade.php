<div>
    {{-- Filtro --}}
    @include('cms.sales.components.filter')

    {{-- Listado de ventas --}}
    <div class="grid grid-cols-1 gap-2 px-0">

        @foreach ($orders as $order)

            @include('cms.sales.components.card_sale')

        @endforeach

    </div>

    {{-- En caso de que el vendedor aun no haya creado ninguna marca, no tendra ventas --}}
    @empty($brands)

        <div class="flex justify-center mt-10">
            <span class="text-lg bg-green-300 px-3 md:px-8 py-4 rounded-md shadow">
                <strong>Aún no has creado tu marca.</strong> ¡Recuerda que para poder vender tus productos, primero debes
                <a class="text-blue-700" href="{{ route('cms.tiendas') }}">crear una marca</a>!
            </span>
        </div>

    @endempty

    {{-- Modals --}}
    @include('cms.sales.components.modals')

    @include('common.alert')
</div>


