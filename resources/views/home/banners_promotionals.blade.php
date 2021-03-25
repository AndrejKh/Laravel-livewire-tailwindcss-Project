@if ( $banners_promotionals && count($banners_promotionals) > 0)
    @foreach ($banners_promotionals as $banner)
        <img class="w-full" src="/storage/{{$banner->banner}}">
    @endforeach
@endif
