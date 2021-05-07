<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Delivery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProductById($product_id){
        $product = Product::findOrFail($product_id);
        return $product;
    }

    public function getProductsByCategoryId($category_id){
        $products = Product::where('status','active')->where('category_id', $category_id)->get();
        return $products;
    }

    public function getTotalProductsByCategoryId($category_id){
        $products = Product::where('status','active')->where('category_id', $category_id)->get();
        return count($products);
    }

    // Obtener productos dependiendo del estado
    // Se obtendran las productos de las marcas que esten ubicadas en el estado seleccionado
    public function getProductsByStateId($state_id){
        $products = DB::table('products')
        ->join('items', 'products.id', '=', 'items.product_id')
        ->join('brands', 'items.brand_id', '=', 'brands.id')
        ->where('brands.state_id', $state_id)
        ->select('products.*')
        ->get();

        return $this->noDuplicatedArray($products);
    }

    // Obtener productos por el id de la ciudad
    // Se obtendran las productos de las marcas que esten ubicadas en el estado seleccionado
    public function getProductsByCityId($city_id){
        $products = DB::table('products')
        ->join('items', 'products.id', '=', 'items.product_id')
        ->join('brands', 'items.brand_id', '=', 'brands.id')
        ->where('brands.city_id', $city_id)
        ->select('products.*')
        ->get();

        return $this->noDuplicatedArray($products);
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
}
