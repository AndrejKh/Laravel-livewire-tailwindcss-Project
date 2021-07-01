<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    // Obtener el precio de cada producto de la marca, de los productos que estan en el carrito
    public function getPriceAndProductIdToShoppingCarByBrandId( $brand_id, $products_shopping_car ){
        $array_products_id_shopping_car = explode(",", $products_shopping_car);

        $items = DB::table('items')
        ->where('status', 'active')
        ->where('brand_id', $brand_id)
        ->whereIn('product_id', $array_products_id_shopping_car)
        ->select('items.price', 'items.product_id')
        ->get();

        return $items;
    }

    // Obtener el precio del producto de la marca
    public function getItemByBrandIdAndProductId( $brand_id, $product_id ){
        $item = DB::table('items')
        ->where('status', 'active')
        ->where('brand_id', $brand_id)
        ->where('product_id', $product_id)
        ->select('items.*')
        ->get();

        return $item;
    }

    // Obtener el precio del producto de la marca
    public function getItemsByBrandId( $brand_id, $products_shopping_car ){
        $array_products_id_shopping_car = explode(",", $products_shopping_car);

        $items = DB::table('items')
        ->where('status', 'active')
        ->where('brand_id', $brand_id)
        ->whereIn('product_id', $array_products_id_shopping_car)
        ->select('items.*')
        ->get();

        return $items;
    }
}
