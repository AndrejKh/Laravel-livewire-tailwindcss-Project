<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    // Obtengo las marcas dependiendo del estado
    // Estas marcas son las q tienen delivery a ese estado, y las marcas que su direccion es ese estado
    public function getBrandsByStateId($state_id){
        $brandsWithDeliveryInState = DB::table('states')
        ->join('deliveries', 'states.id', '=', 'deliveries.state_id')
        ->join('brands', 'deliveries.brand_id', '=', 'brands.id')
        ->where('brands.status', 'active')
        ->where('states.id', $state_id)
        ->select('brands.*', 'states.state')
        ->get();

        $brandsInState = Brand::where('status', 'active')->where('state_id', $state_id)->get();

        $brands = $brandsWithDeliveryInState->merge($brandsInState);

        return $this->noDuplicatedArray($brands);
    }

    // Obtengo las marcas dependiendo de la ciudad
    // Estas marcas son las q tienen delivery a esa ciudad, y las marcas que su direccion es esa ciudad
    public function getBrandsByCityId($city_id){
        $brandsWithDeliveryInCity = DB::table('cities')
        ->join('deliveries', 'cities.id', '=', 'deliveries.city_id')
        ->join('brands', 'deliveries.brand_id', '=', 'brands.id')
        ->where('brands.status', 'active')
        ->where('cities.id', $city_id)
        ->select('brands.*', 'cities.city')
        ->get();

        $brandsInCity = Brand::where('status', 'active')->where('city_id', $city_id)->get();

        $brands = $brandsWithDeliveryInCity->merge($brandsInCity);

        return $this->noDuplicatedArray($brands);
    }

    // Obtengo las marcas que tienen delivery
    public function getBrandsByDelivery(){
        $brands = DB::table('deliveries')
        ->join('brands', 'deliveries.brand_id', '=', 'brands.id')
        ->where('brands.status', 'active')
        ->select('brands.*', 'deliveries.*')
        ->get();

        return $this->noDuplicatedArray($brands);
    }

    // Obtengo las marcas que ofrecen envios gratis
    public function getBrandsByDeliveryFree(){
        $brands = DB::table('deliveries')
        ->join('brands', 'deliveries.brand_id', '=', 'brands.id')
        ->where('brands.status', 'active')
        ->where('deliveries.delivery_free', 1)
        ->select('brands.*', 'deliveries.*')
        ->get();

        return $this->noDuplicatedArray($brands);
    }

    // Obtener marcas que tiene el producto x
    public function getBrandsByProductId($product_id){
        $brands = DB::table('products')
        ->join('items', 'products.id', '=', 'items.product_id')
        ->join('brands', 'items.brand_id', '=', 'brands.id')
        ->where('brands.status', 'active')
        ->where('products.id', $product_id)
        ->select('brands.*', 'products.*')
        ->get();

        return $this->noDuplicatedArray($brands);
    }

    // Obtener marcas que tiene la categoria x
    public function getBrandsByCategoryId($category_id){
        $brands = DB::table('products')
        ->join('items', 'products.id', '=', 'items.product_id')
        ->join('brands', 'items.brand_id', '=', 'brands.id')
        ->where('brands.status', 'active')
        ->where('products.category_id', $category_id)
        ->select('brands.*', 'products.*')
        ->get();

        return $this->noDuplicatedArray($brands);
    }

    // FUncion para eliminar duplicados
    private function noDuplicatedArray($array){
        $arraySinDuplicados = [];
        foreach($array as $element) {
            if (!in_array($element, $arraySinDuplicados)) {
                array_push( $arraySinDuplicados, $element );
            }
        }
        return $arraySinDuplicados;
    }

    public function getBrandByOrderId($brand_id){

        $brand = Brand::findOrFail($brand_id);

        return $brand;

    }
}
