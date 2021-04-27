<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProductById($product_id){
        $product = Product::findOrFail($product_id);

        return $product;
    }
}
