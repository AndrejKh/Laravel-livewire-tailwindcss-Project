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
        $brands = Brand::latest('id')->where('status', 'active')->get();

        return view('home.home', compact('carousel_banners','categories','products','brands', 'banners_promotionals'));
    }
}
