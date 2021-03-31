<?php

namespace App\Http\Controllers;

use App\Models\BannerPromocional;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $carousel_banners = BannerPromocional::latest('id')->where('page', 'home')->where('status', 'active')->get();
        $banners_promotionals = BannerPromocional::latest('id')->where('page', 'promotions')->where('status', 'active')->get();
        $categories = Category::latest('id')->where('status', 'active')->get();
        $products = Product::latest('id')->where('status', 'active')->get();

        $carousel_items_first = Product::latest('id')->where('status', 'active')->where('category_id', '3')->get();
        $carousel_items_second = Product::latest('id')->where('status', 'active')->where('category_id', '2')->get();
        $carousel_items_third = Product::latest('id')->where('status', 'active')->where('category_id', '7')->get();
        $carousel_items_fourth = Product::latest('id')->where('status', 'active')->where('category_id', '4')->get();
        $carousel_items_five = Product::latest('id')->where('status', 'active')->where('category_id', '5')->get();
        $brands = Brand::latest('id')->where('status', 'active')->get();

        return view('home', compact('carousel_banners','categories','products','brands', 'banners_promotionals', 'carousel_items_first', 'carousel_items_second', 'carousel_items_third', 'carousel_items_fourth', 'carousel_items_five'));
    }

    // Vitirna de productos
    public function vitrina(Request $request)
    {
        if(isset($request->q))
        {
            $query = $request->q;
            $products = Product::latest('id')->where('status', 'active')->where('title', 'LIKE', '%'.$query.'%')->paginate(16);
            $total_products_search = count(Product::where('status', 'active')->where('title', 'LIKE', '%'.$query.'%')->get());
        }else {
            $products = Product::latest('id')->where('status', 'active')->paginate(16);
            $total_products_search = count(Product::where('status', 'active')->get());
        }
        $categories = Category::latest('id')->where('status', 'active')->get();

        return view('vitrina', compact('categories','products', 'total_products_search'));
    }

    // Metodo para obtener los productos por la categoria elegida
    public function vitrinaPorCategoria(Request $request)
    {
        if(isset($request->slug))
        {
            $category = Category::where('slug', $request->slug)->first();
            $products = Product::latest('id')->where('status', 'active')->where('category_id', $category->id)->paginate(16);
            $total_products_search = count(Product::where('status', 'active')->where('category_id', $category->id)->get());
        }else {
            $products = Product::latest('id')->where('status', 'active')->paginate(16);
            $total_products_search = count(Product::where('status', 'active')->get());
        }
        $categories = Category::latest('id')->where('status', 'active')->get();

        return view('vitrina', compact('categories','products', 'total_products_search'));
    }

    //Metodo que devulve la vista del detalle del producto
    public function ProductShow(Request $request){
        if(isset($request->id))
        {
            $product = Product::where('status', 'active')->where('id', $request->id)->first();
            $items = Item::where('status','active')->where('product_id',$request->id)->get();
        }else{

        }
        $categories = Category::latest('id')->where('status', 'active')->get();

        return view('product_detail', compact('categories','product','items'));

    }

    /*
    VISTAS DEL CMS
    */
    public function usuarios() {
        return view('cms.usuarios');
    }
    public function categories() {
        return view('cms.categories');
    }
    public function banners() {
        return view('cms.banners');
    }
    public function estados() {
        return view('cms.estados');
    }
    public function ciudades() {
        return view('cms.ciudades');
    }
    public function productos() {
        return view('cms.productos');
    }
    public function tiendas() {
        return view('cms.tiendas');
    }
}
