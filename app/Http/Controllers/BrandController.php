<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    // Obtengo las marcas dependiendo del estado
    public function getBrandsByStateId($state_id){
        $brands = DB::table('states')
        ->join('deliveries', 'states.id', '=', 'deliveries.state_id')
        ->join('brands', 'deliveries.brand_id', '=', 'brands.id')
        ->where('states.id', $state_id)
        ->select('brands.*', 'states.state')
        ->get();

        return $this->noDuplicatedArray($brands);
    }

    // Obtengo las marcas dependiendo de la ciudad
    public function getBrandsByCityId($city_id){
        $brands = DB::table('cities')
        ->join('deliveries', 'cities.id', '=', 'deliveries.city_id')
        ->join('brands', 'deliveries.brand_id', '=', 'brands.id')
        ->where('cities.id', $city_id)
        ->select('brands.*', 'cities.city')
        ->get();

        return $this->noDuplicatedArray($brands);
    }

    // Obtengo las marcas que tienen delivery
    public function getBrandsByDelivery(){
        $brands = DB::table('deliveries')
        ->join('brands', 'deliveries.brand_id', '=', 'brands.id')
        ->select('brands.*', 'deliveries.*')
        ->get();

        return $this->noDuplicatedArray($brands);
    }

    // Obtengo las marcas que ofrecen envios gratis
    public function getBrandsByDeliveryFree(){
        $brands = DB::table('deliveries')
        ->join('brands', 'deliveries.brand_id', '=', 'brands.id')
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
        ->where('products.category_id', $category_id)
        ->select('brands.*', 'products.*')
        ->get();

        return $this->noDuplicatedArray($brands);
    }

    // FUncion para eliminar duplicados
    protected function noDuplicatedArray($array){
        $arraySinDuplicados = [];
        foreach($array as $element) {
            if (!in_array($element, $arraySinDuplicados)) {
                array_push( $arraySinDuplicados, $element );
            }
        }
        return $arraySinDuplicados;
    }
}
