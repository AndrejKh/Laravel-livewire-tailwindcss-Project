<div class="grid grid-cols-6 gap-4 bg-white rounded-md shadow-sm px-3 py-2">
    <div class="text-3xl font-light ">
        {{$item->price}} USD$
    </div>
    <div class="text-lg font-bold">
        {{$item->user->name}}
        {{$item->user->city}}
        {{$item->user->state}}
        {{$item->user->address}}
    </div>
    <div class="text-lg font-bold">
        {{$item->user->ratings}}
    </div>
    <div class="text-md font-base text-gray-700">
        <strong>{{$item->quantity}}</strong> Disponibles
    </div>
    <div class="text-lg font-bold">
        {{$item->user->shippings}}
    </div>
</div>
