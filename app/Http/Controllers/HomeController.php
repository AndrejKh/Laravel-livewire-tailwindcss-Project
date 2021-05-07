<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BannerPromocional;
use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Delivery;
use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use App\Models\State;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public $perPage = 15;
    public function index()
    {
        $carousel_banners = BannerPromocional::latest('id')->where('page', 'home')->where('status', 'active')->get();
        $banners_promotionals = BannerPromocional::latest('id')->where('page', 'promotions')->where('status', 'active')->get();
        $principal_categories = Category::where('status', 'active')->where('padre_id', 0)->take(7)->get();
        $products = Product::latest('id')->where('status', 'active')->get();

        $carousel_items_first = Product::latest('id')->where('status', 'active')->where('category_id', '3')->get();
        $carousel_items_second = Product::latest('id')->where('status', 'active')->where('category_id', '2')->get();
        $carousel_items_third = Product::latest('id')->where('status', 'active')->where('category_id', '7')->get();
        $carousel_items_fourth = Product::latest('id')->where('status', 'active')->where('category_id', '4')->get();
        $carousel_items_five = Product::latest('id')->where('status', 'active')->where('category_id', '5')->get();
        $brands = Brand::latest('id')->where('status', 'active')->get();

        return view('home', compact('carousel_banners','principal_categories','products','brands', 'banners_promotionals', 'carousel_items_first', 'carousel_items_second', 'carousel_items_third', 'carousel_items_fourth', 'carousel_items_five'));
    }

    // Vitirna de productos, controlador del input search del navbar
    public function vitrina(Request $request)
    {

        if( isset($request->q) ){
            $query = $request->q;

            // Obtengo los productos filtrados por la busqueda 'search' y el estado
            if( isset($request->state) ){

                $estado = $request->state;
                $state = State::where('status','active')->where('state',$estado)->first();
                $state_id = $state->id;

                $productsDB = Product::where('title', 'LIKE', '%'.$query.'%')
                    ->join('items', 'products.id', '=', 'items.product_id')
                    ->join('brands', 'items.brand_id', '=', 'brands.id')
                    ->where('brands.state_id', $state_id)
                    ->where('products.status', 'active')
                    ->select('products.*')
                    ->paginate($this->perPage);

                $products = $this->noDuplicatedArray($productsDB);
                // return $products;
                $total_products_search = count($products);

            }else if( isset($request->city) ){
                // Obtengo los productos filtrados por la busqueda 'search' y la ciudad
                $ciudad = $request->city;
                $city = City::where('status','active')->where('city',$ciudad)->first();
                $city_id = $city->id;


                $productsDB = Product::where('title', 'LIKE', '%'.$query.'%')
                    ->join('items', 'products.id', '=', 'items.product_id')
                    ->join('brands', 'items.brand_id', '=', 'brands.id')
                    ->where('brands.city_id', $city_id)
                    ->where('products.status', 'active')
                    ->select('products.*')
                    ->paginate($this->perPage);

                $products = $this->noDuplicatedArray($productsDB);
                $total_products_search = count($products);

            }else{

                // Obtengo los productos filtrados por la busqueda 'search'
                $products = Product::latest('id')->where('status', 'active')->where('title', 'LIKE', '%'.$query.'%')->paginate($this->perPage);
                $total_products_search = count(Product::where('status', 'active')->where('title', 'LIKE', '%'.$query.'%')->get());

            }
        }else {

            // Obtengo todos los productos, sin filtro
            $products = Product::latest('id')->where('status', 'active')->paginate($this->perPage);
            $total_products_search = count(Product::where('status', 'active')->get());

            // Variables que se retornan a la vista, estas variables se usan para el form de filtro
            $query = null;

        }

        $principal_categories = Category::where('status', 'active')->where('padre_id', 0)->take(9)->get();
        $category_slug = null;

        return view('vitrina', compact('principal_categories', 'products', 'total_products_search', 'query', 'category_slug'));
    }

    // Metodo para obtener los productos por la categoria elegida
    public function vitrinaPorCategoria(Request $request)
    {

        if( isset($request->slug) ){
            $category_slug = $request->slug;
            $category = Category::where('slug', $category_slug)->first();

            // Obtengo los productos filtrados por la busqueda 'search' y el estado
            if( isset($request->state) ){

                $estado = $request->state;
                $state = State::where('status','active')->where('state',$estado)->first();
                $state_id = $state->id;

                $productsDB = Product::where('category_id', $category->id)
                    ->join('items', 'products.id', '=', 'items.product_id')
                    ->join('brands', 'items.brand_id', '=', 'brands.id')
                    ->where('brands.city_id', $state_id)
                    ->where('products.status', 'active')
                    ->select('products.*')
                    ->paginate($this->perPage);

                $products = $this->noDuplicatedArray($productsDB);
                // return $products;
                $total_products_search = count($products);

            }else if( isset($request->city) ){
                // Obtengo los productos filtrados por la busqueda 'search' y la ciudad
                $ciudad = $request->city;
                $city = City::where('status','active')->where('city',$ciudad)->first();
                $city_id = $city->id;

                $productsDB = Product::where('category_id', $category->id)
                    ->join('items', 'products.id', '=', 'items.product_id')
                    ->join('brands', 'items.brand_id', '=', 'brands.id')
                    ->where('brands.city_id', $city_id)
                    ->where('products.status', 'active')
                    ->select('products.*')
                    ->paginate($this->perPage);

                $products = $this->noDuplicatedArray($productsDB);
                $total_products_search = count($products);

            }else{

                // Todos los productos de una categoria sin filtro
                $products = Product::latest('id')->where('status', 'active')->where('category_id', $category->id)->paginate($this->perPage);
                $total_products_search = count(Product::where('status', 'active')->where('category_id', $category->id)->get());

            }

        }else {

            // Todos los productos sin filtro
            $products = Product::latest('id')->where('status', 'active')->paginate($this->perPage);
            $total_products_search = count(Product::where('status', 'active')->get());

            $category_slug = null;

        }

        $principal_categories = Category::where('status', 'active')->where('padre_id', 0)->take(7)->get();
        $query = null;

        return view('vitrina', compact('principal_categories', 'products', 'total_products_search', 'query', 'category_slug'));
    }

    //Metodo que devulve la vista del detalle del producto
    public function productShow(Request $request){
        $product = Product::where('status', 'active')->where('slug', $request->slug)->first();
        $items = Item::where('status','active')->where('product_id',$request->id)->get();
        $principal_categories = Category::where('status', 'active')->where('padre_id', 0)->take(9)->get();

        return view('product_detail', compact('principal_categories','product','items'));
    }

    // Vitirna de supermemrcados
    public function brands(Request $request) {
        if(isset($request->q))
        {
            $query = $request->q;
            $tiendas = Brand::latest('id')->where('status', 'active')->where('brand', 'LIKE', '%'.$query.'%')->paginate($this->perPage);
            $total_tiendas_search = count(Brand::where('status', 'active')->where('brand', 'LIKE', '%'.$query.'%')->get());
        }else {
            $tiendas = Brand::latest('id')->where('status', 'active')->paginate($this->perPage);
            $total_tiendas_search = count(Brand::where('status', 'active')->get());
        }
        $carousel_banners = BannerPromocional::latest('id')->where('page', 'tiendas')->where('status', 'active')->get();
        $principal_categories = Category::where('status', 'active')->where('padre_id', 0)->take(9)->get();

        return view('supermercados.tiendas', compact('principal_categories','tiendas', 'total_tiendas_search', 'carousel_banners'));
    }

    //Metodo que devulve la vista del detalle del producto
    public function brandsDetail(Request $request){

        if(isset($request->slug))
        {
            $tienda = Brand::where('status', 'active')->where('slug', $request->slug)->first();
            $items = Item::where('status','active')->where('brand_id',$tienda->id)->paginate($this->perPage);
            $banners_promotionals = Banner::where('status','active')->where('brand_id',$tienda->id)->get();
            $deliveries = Delivery::where('status','active')->where('brand_id',$tienda->id)->get();
        }

        return view('tienda.tienda', compact('tienda','items','banners_promotionals','deliveries'));

    }

    function categorias() {
        $principal_categories = Category::where('status', 'active')->where('padre_id', 0)->get();
        $categories_children = Category::where('status', 'active')->where('padre_id', '<>' , 0)->get();
        return view('categories', compact('principal_categories','categories_children'));
    }

    /*
    VISTAS DEL CMS
    */
    public function dashboard(){
        return view('dashboard');
    }
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

    /******* Funciones internas  *********/

    // Funcion que elimina duplicados
    private function noDuplicatedArray($array){
        $arraySinDuplicados = [];
        foreach($array as $element) {
            if (!in_array($element, $arraySinDuplicados)) {
                array_push( $arraySinDuplicados, $element );
            }
        }
        return $arraySinDuplicados;
    }

    function register_seller() {
        $estados = State::where('status', 'active')->get();
        return view('auth.register_seller', compact('estados'));
    }
}
