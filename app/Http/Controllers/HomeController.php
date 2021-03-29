<?php

namespace App\Http\Controllers;

use App\Models\BannerPromocional;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
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
        $carousel_items_third = Product::latest('id')->where('status', 'active')->where('category_id', '3')->get();
        $carousel_items_fourth = Product::latest('id')->where('status', 'active')->where('category_id', '4')->get();
        $carousel_items_five = Product::latest('id')->where('status', 'active')->where('category_id', '5')->get();
        $brands = Brand::latest('id')->where('status', 'active')->get();

        return view('home.home', compact('carousel_banners','categories','products','brands', 'banners_promotionals', 'carousel_items_first', 'carousel_items_second', 'carousel_items_third', 'carousel_items_fourth', 'carousel_items_five'));
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
}
