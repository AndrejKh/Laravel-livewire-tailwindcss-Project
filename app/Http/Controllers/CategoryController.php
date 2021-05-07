<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Obtengo las categorias principales, padre_id = 0
    public function getCategoriesPrincipals(){
        $categories= Category::where('status','active')->where('padre_id', 0)->get();
        return $categories;
    }


    // Obtengo las categorias hijo de una categoria
    public function getCategoriesChildrenByCategoryId($category_id){
        $categories= Category::where('status','active')->where('padre_id',$category_id)->get();
        return $categories;
    }

    // Obtengo la cantidad de productos que hay en una categoria
    public function getQuantityOfProductsByCategoryId($category_id){
        $category= Category::where('status','active')->where('id',$category_id)->first();
        return count($category->products);
    }
}
