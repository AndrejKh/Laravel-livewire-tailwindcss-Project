<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BannerPromocional;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Delivery;
use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use App\Models\State;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $product = Product::where('status', 'active')->where('slug', $request->slug)->first();
        $items = Item::where('status','active')->where('product_id',$request->id)->get();
        $categories = Category::latest('id')->where('status', 'active')->get();

        return view('product_detail', compact('categories','product','items'));

    }

    // Vitirna de supermemrcados
    public function tiendas(Request $request) {
        if(isset($request->q))
        {
            $query = $request->q;
            $tiendas = Brand::latest('id')->where('status', 'active')->where('brand', 'LIKE', '%'.$query.'%')->paginate(16);
            $total_tiendas_search = count(Brand::where('status', 'active')->where('brand', 'LIKE', '%'.$query.'%')->get());
        }else {
            $tiendas = Brand::latest('id')->where('status', 'active')->paginate(16);
            $total_tiendas_search = count(Brand::where('status', 'active')->get());
        }
        $carousel_banners = BannerPromocional::latest('id')->where('page', 'tiendas')->where('status', 'active')->get();
        $categories = Category::latest('id')->where('status', 'active')->get();

        return view('supermercados.tiendas', compact('categories','tiendas', 'total_tiendas_search', 'carousel_banners'));
    }

    //Metodo que devulve la vista del detalle del producto
    public function tiendaDetail(Request $request){


        if(isset($request->id))
        {
            $tienda = Brand::where('status', 'active')->where('user_id', $request->id)->first();
            $items = Item::where('status','active')->where('brand_id',$tienda->id)->paginate(16);
            $banners_promotionals = Banner::where('status','active')->where('brand_id',$tienda->id)->get();
            $categories = Category::latest('id')->where('status', 'active')->get();
            $deliveries = Delivery::where('status','active')->where('brand_id',$tienda->id)->get();
        }else{

        }

        return view('tienda.tienda', compact('categories','tienda','items','banners_promotionals','deliveries'));

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

    // Rutas CMS
    public function dashboard(){
        return view('dashboard');
    }

    function register_seller() {
        $estados = State::where('status', 'active')->get();
        return view('auth.register_seller', compact('estados'));
    }

    public function tiendasCMS() {
        return view('cms.tiendas');
    }

    public function itemsCMS() {
        return view('cms.items');
    }

    public function comprasCMS(){
        return view('cms.compras');
    }
    public function ventasCMS(){
        return view('cms.ventas');
    }
}
