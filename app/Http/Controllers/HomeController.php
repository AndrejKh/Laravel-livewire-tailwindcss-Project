<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BannerPromocional;
use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Delivery;
use App\Models\Item;
use App\Models\Product;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
// use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class HomeController extends Controller
{
    // use Paginator;

    public $perPage = 20;

    public function index()
    {
        // Banners principales
        if ( Cache::has('banners_home') ) {
            $banners_home = Cache::get('banners_home');
        } else {
            $banners_home = BannerPromocional::latest('id')->where('page', 'home')->where('status', 'active')->get();
            Cache::put('banners_home', $banners_home);
        }
        // Banners promocionales
        if ( Cache::has('banners_promotionals') ) {
            $banners_promotionals = Cache::get('banners_promotionals');
        } else {
            $banners_promotionals = BannerPromocional::latest('id')->where('page', 'promotions')->where('status', 'active')->get();
            Cache::put('banners_promotionals', $banners_promotionals);
        }
        // categorias principales
        if ( Cache::has('home_categories') ) {
            $home_categories = Cache::get('home_categories');
        } else {
            $home_categories = Category::where('status', 'active')->where('padre_id', 0)->take(4)->get();
            Cache::put('home_categories', $home_categories);
        }
        // productos
        if ( Cache::has('products') ) {
            $products = Cache::get('products');
        } else {
            $products = Product::latest('id')->where('status', 'active')->take(6)->get();
            Cache::put('products', $products);
        }
        // estados
        if ( Cache::has('states') ) {
            $states = Cache::get('states');
        } else {
            $states = State::all();
            Cache::put('states', $states);
        }
        // Ciudades
        if ( Cache::has('cities_first') ) {
            $cities_first = Cache::get('cities_first');
        } else {
            $cities_first = City::where('state_id', 1)->where('status', 'active')->get();
            Cache::put('cities_first', $cities_first);
        }

        return view('home.home', compact('banners_home', 'banners_promotionals', 'home_categories', 'products', 'states', 'cities_first'));
    }

    // Vitirna de productos, controlador del input search del navbar
    public function vitrina(Request $request)
    {

        if( isset($request->q) ){
            $query = $request->q;
            // return 'hay busqueda';

            // Obtengo los productos filtrados por la busqueda 'search' y el estado
            if( session()->has('state_id') ){
                return 'hay busqueda y estado';

                if( session()->has('city_id') ){
                    // Obtengo los productos filtrados por la busqueda 'search' y la ciudad
                    $city_id = session('city_id');

                    // Productos que se venden
                    $productsDBBrand = Product::where('title', 'LIKE', '%'.$query.'%')
                        ->join('items', 'products.id', '=', 'items.product_id')
                        // ->join('brands', 'items.brand_id', '=', 'brands.id')
                        ->join('address_brands', 'items.brand_id', '=', 'address_brands.brand_id')
                        ->where('address_brands.city_id', $city_id)
                        ->where('items.quantity', '>', 0)
                        ->where('products.status', 'active')
                        ->select('products.*')
                        ->get();

                    // Productos que tienen delivery hacia esta ubicacion
                    $productsDBDeliveries = Product::where('title', 'LIKE', '%'.$query.'%')
                        ->join('items', 'products.id', '=', 'items.product_id')
                        ->join('deliveries', 'items.brand_id', '=', 'deliveries.brand_id')
                        ->where('deliveries.city_id', $city_id)
                        ->where('items.quantity', '>', 0)
                        ->where('products.status', 'active')
                        ->select('products.*')
                        ->get();

                }else{

                    $state_id = session('state_id');

                    $productsDBBrand = Product::where('title', 'LIKE', '%'.$query.'%')
                        ->join('items', 'products.id', '=', 'items.product_id')
                        // ->join('brands', 'items.brand_id', '=', 'brands.id')
                        ->join('address_brands', 'items.brand_id', '=', 'address_brands.brand_id')
                        ->where('address_brands.state_id', $state_id)
                        ->where('items.quantity', '>', 0)
                        ->where('products.status', 'active')
                        ->select('products.*')
                        ->get();

                    $productsDBDeliveries = Product::where('title', 'LIKE', '%'.$query.'%')
                        ->join('items', 'products.id', '=', 'items.product_id')
                        ->join('deliveries', 'items.brand_id', '=', 'deliveries.brand_id')
                        ->where('deliveries.state_id', $state_id)
                        ->where('items.quantity', '>', 0)
                        ->where('products.status', 'active')
                        ->select('products.*')
                        ->get();

                }
                $productsDB = $productsDBBrand->merge($productsDBDeliveries);

                $products = $this->noDuplicatedArray($productsDB);
                $total_products_search = count($products);

            }else {

                // Obtengo los productos filtrados por la busqueda 'search', sin filtr de estado ni ciudad
                $productsDB = Product::where('title', 'LIKE', '%'.$query.'%')
                        ->join('items', 'products.id', '=', 'items.product_id')
                        ->where('items.quantity', '>', 0)
                        ->where('products.status', 'active')
                        ->select('products.*')
                        ->get();
                $products = $this->noDuplicatedArray($productsDB);

                $total_products_search = count($products);

                $city_selected = null;
                $state_selected = null;

            }
        }else {
            // return session('state_id');
            // return session()->has('state_id');

            // Obtengo los productos filtrados por la busqueda 'search' y el estado
            if( session()->has('state_id') ){
                // return 'aqui';

                if( session()->has('city_id') ){

                    $city_id = session('city_id');

                    $productsDBBrand = Product::where('products.status', 'active')
                        ->join('items', 'products.id', '=', 'items.product_id')
                        ->join('address_brands', 'items.brand_id', '=', 'address_brands.brand_id')
                        ->where('address_brands.city_id', $city_id)
                        ->where('items.quantity', '>', 0)
                        ->select('products.*')
                        ->get();

                    $productsDBDeliveries = Product::where('products.status', 'active')
                        ->join('items', 'products.id', '=', 'items.product_id')
                        ->join('deliveries', 'items.brand_id', '=', 'deliveries.brand_id')
                        ->where('deliveries.city_id', $city_id)
                        ->where('items.quantity', '>', 0)
                        ->select('products.*')
                        ->get();

                }else{

                    $state_id = session('state_id');

                    $productsDBBrand = Product::where('products.status', 'active')
                        ->join('items', 'products.id', '=', 'items.product_id')
                        ->join('address_brands', 'items.brand_id', '=', 'address_brands.brand_id')
                        ->where('address_brands.state_id', $state_id)
                        ->where('items.quantity', '>', 0)
                        ->select('products.*')
                        ->get();

                    $productsDBDeliveries = Product::where('products.status', 'active')
                        ->join('items', 'products.id', '=', 'items.product_id')
                        ->join('deliveries', 'items.brand_id', '=', 'deliveries.brand_id')
                        ->where('deliveries.state_id', $state_id)
                        ->where('items.quantity', '>', 0)
                        ->select('products.*')
                        ->get();

                }
                $productsDB = $productsDBBrand->merge($productsDBDeliveries);

                $products = $this->noDuplicatedArray($productsDB);
                $total_products_search = count($products);

            }else {

                // Obtengo todos los productos, sin filtro des estado o ciudad
                $productsDB = Product::where('products.status', 'active')
                        ->join('items', 'products.id', '=', 'items.product_id')
                        ->where('items.quantity', '>', 0)
                        ->select('products.*')
                        ->get();
                $products = $this->noDuplicatedArray($productsDB);

                $total_products_search = count($products);

                // Variables que se retornan a la vista, estas variables se usan para el form de filtro
                $city_selected = null;
                $state_selected = null;
            }
            $query = null;

        }

        // categorias principales
        if ( Cache::has('filter_categories') ) {
            $filter_categories = Cache::get('filter_categories');
        } else {
            $filter_categories = Category::where('status', 'active')->where('padre_id', 0)->take(9)->get();
            Cache::put('filter_categories', $filter_categories);
        }
        // estados
        if ( Cache::has('states') ) {
            $states = Cache::get('states');
        } else {
            $states = State::all();
            Cache::put('states', $states);
        }
        // Ciudades
        if ( Cache::has('cities_first') ) {
            $cities_first = Cache::get('cities_first');
        } else {
            $cities_first = City::where('state_id', 1)->where('status', 'active')->get();
            Cache::put('cities_first', $cities_first);
        }
        $category_selected = null;

        return view('vitrina.vitrina', compact('states', 'cities_first', 'query', 'filter_categories', 'products', 'total_products_search', 'query', 'category_selected'));
    }

    // Metodo para obtener los productos por la categoria elegida
    public function vitrinaPorCategoria(Request $request)
    {

        if( isset($request->slug) ){
            $category_slug = $request->slug;
            $category_selected = Category::where('slug', $category_slug)->first();
            $category_id = $category_selected->id;

            // Obtengo los productos filtrados por la busqueda 'search' y el estado
            if( session()->has('state_id') ){

                if( session()->has('city_id') ){
                    $city_id = session('city_id');

                    $productsDBBrand = Product::where('category_id', $category_id)
                        ->join('items', 'products.id', '=', 'items.product_id')
                        ->join('address_brands', 'items.brand_id', '=', 'address_brands.brand_id')
                        ->where('address_brands.city_id', $city_id)
                        ->where('items.quantity', '>', 0)
                        ->where('products.status', 'active')
                        ->select('products.*')
                        ->get();

                    $productsDBDeliveries = Product::where('category_id', $category_id)
                        ->join('items', 'products.id', '=', 'items.product_id')
                        ->join('deliveries', 'items.brand_id', '=', 'deliveries.brand_id')
                        ->where('deliveries.city_id', $city_id)
                        ->where('items.quantity', '>', 0)
                        ->where('products.status', 'active')
                        ->select('products.*')
                        ->get();

                }else{

                    $state_id = session('state_id');

                    $productsDBBrand = Product::where('category_id', $category_id)
                        ->join('items', 'products.id', '=', 'items.product_id')
                        ->join('address_brands', 'items.brand_id', '=', 'address_brands.brand_id')
                        ->where('address_brands.state_id', $state_id)
                        ->where('items.quantity', '>', 0)
                        ->where('products.status', 'active')
                        ->select('products.*')
                        ->get();

                    $productsDBDeliveries = Product::where('category_id', $category_id)
                        ->join('items', 'products.id', '=', 'items.product_id')
                        ->join('deliveries', 'items.brand_id', '=', 'deliveries.brand_id')
                        ->where('deliveries.state_id', $state_id)
                        ->where('items.quantity', '>', 0)
                        ->where('products.status', 'active')
                        ->select('products.*')
                        ->get();

                }
                $productsDB = $productsDBBrand->merge($productsDBDeliveries);

                $products = $this->noDuplicatedArray($productsDB);
                $total_products_search = count($products);

            }else {

                // Todos los productos de una categoria sin filtro
                $productsDB = Product::where('products.category_id', $category_id)
                        ->join('items', 'products.id', '=', 'items.product_id')
                        ->where('items.quantity', '>', 0)
                        ->where('products.status', 'active')
                        ->select('products.*')
                        ->get();

                $products = $this->noDuplicatedArray($productsDB);

                $total_products_search = count($products);

            }

        }else {

            // Todos los productos sin filtro
            $productsDB = Product::where('products.status', 'active')
                        ->join('items', 'products.id', '=', 'items.product_id')
                        ->where('items.quantity', '>', 0)
                        ->select('products.*')
                        ->get();
            $products = $this->noDuplicatedArray($productsDB);

            $total_products_search = count($products);

            $category_selected = null;

        }

        $query = null;
        if ( Cache::has('filter_categories') ) {
            $filter_categories = Cache::get('filter_categories');
        } else {
            $filter_categories = Category::where('status', 'active')->where('padre_id', 0)->take(9)->get();
            Cache::put('filter_categories', $filter_categories);
        }
        // estados
        if ( Cache::has('states') ) {
            $states = Cache::get('states');
        } else {
            $states = State::all();
            Cache::put('states', $states);
        }
        // Ciudades
        if ( Cache::has('cities_first') ) {
            $cities_first = Cache::get('cities_first');
        } else {
            $cities_first = City::where('state_id', 1)->where('status', 'active')->get();
            Cache::put('cities_first', $cities_first);
        }

        return view('vitrina.vitrina', compact('states', 'cities_first', 'query', 'filter_categories', 'products', 'total_products_search', 'query', 'category_selected'));
    }

    //Metodo que devulve la vista del detalle del producto
    public function productShow(Request $request){
        $product = Product::where('status', 'active')->where('slug', $request->slug)->first();
        // buscar los items dependiendo de la ciudad seleccionada
        $items = Item::where('status','active')->where('product_id',$product->id)->get();

        $other_products = Product::where('status', 'active')->take(10)->get();
        // estados
        if ( Cache::has('states') ) {
            $states = Cache::get('states');
        } else {
            $states = State::all();
            Cache::put('states', $states);
        }
        // Ciudades
        if ( Cache::has('cities_first') ) {
            $cities_first = Cache::get('cities_first');
        } else {
            $cities_first = City::where('state_id', 1)->where('status', 'active')->get();
            Cache::put('cities_first', $cities_first);
        }

        return view('vitrina.product_detail', compact('states', 'cities_first', 'other_products','product','items'));
    }

    // Metodo que devuelve la vista del detalle de producto, viniendo desde la vista de supermrecado
    public function productShowBrand(Request $request){

        $brand = Brand::where('slug', $request->brand)->first();
        $brand_id = $brand->id;

        $product = Product::where('status', 'active')->where('slug', $request->product)->first();
        $item = Item::where('product_id', $product->id)->first();
        $other_products_of_brand = Item::where('status', 'active')->where('brand_id', $brand_id)->take(10)->get();
        $deliveries = Delivery::where('status','active')->where('brand_id',$brand_id)->get();
        // estados
        if ( Cache::has('states') ) {
            $states = Cache::get('states');
        } else {
            $states = State::all();
            Cache::put('states', $states);
        }
        // Ciudades
        if ( Cache::has('cities_first') ) {
            $cities_first = Cache::get('cities_first');
        } else {
            $cities_first = City::where('state_id', 1)->where('status', 'active')->get();
            Cache::put('cities_first', $cities_first);
        }

        return view('tienda.product_detail', compact('states', 'cities_first', 'brand', 'product','item', 'other_products_of_brand', 'deliveries'));

    }

    // listado de categorias
    function categorias() {
        // Categorias principales
        if ( Cache::has('principal_categories') ) {
            $principal_categories = Cache::get('principal_categories');
        } else {
            $principal_categories = Category::where('status', 'active')->where('padre_id', 0)->get();
            Cache::put('principal_categories', $principal_categories);
        }
        // Categorias Hijos
        if ( Cache::has('categories_children') ) {
            $categories_children = Cache::get('categories_children');
        } else {
            $categories_children = Category::where('status', 'active')->where('padre_id', '<>' , 0)->get();
            Cache::put('categories_children', $principal_categories);
        }

        // Estados
        if ( Cache::has('states') ) {
            $states = Cache::get('states');
        } else {
            $states = State::all();
            Cache::put('states', $states);
        }
        // Ciudades
        if ( Cache::has('cities_first') ) {
            $cities_first = Cache::get('cities_first');
        } else {
            $cities_first = City::where('state_id', 1)->where('status', 'active')->get();
            Cache::put('cities_first', $cities_first);
        }

        return view('vitrina.categories', compact('states', 'cities_first', 'principal_categories', 'categories_children'));
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

        // estados
        if ( Cache::has('banners_brands_list') ) {
            $banners_brands_list = Cache::get('banners_brands_list');
        } else {
            $banners_brands_list = BannerPromocional::latest('id')->where('page', 'tiendas')->where('status', 'active')->get();
            Cache::put('banners_brands_list', $banners_brands_list);
        }
        // estados
        if ( Cache::has('states') ) {
            $states = Cache::get('states');
        } else {
            $states = State::all();
            Cache::put('states', $states);
        }
        // Ciudades
        if ( Cache::has('cities_first') ) {
            $cities_first = Cache::get('cities_first');
        } else {
            $cities_first = City::where('state_id', 1)->where('status', 'active')->get();
            Cache::put('cities_first', $cities_first);
        }

        return view('supermercados.tiendas', compact('states', 'cities_first', 'tiendas', 'total_tiendas_search', 'banners_brands_list'));
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

        // estados
        if ( Cache::has('states') ) {
            $states = Cache::get('states');
        } else {
            $states = State::all();
            Cache::put('states', $states);
        }
        // Ciudades
        if ( Cache::has('cities_first') ) {
            $cities_first = Cache::get('cities_first');
        } else {
            $cities_first = City::where('state_id', 1)->where('status', 'active')->get();
            Cache::put('cities_first', $cities_first);
        }

        return view('tienda.tienda', compact('states', 'cities_first', 'tienda','items','banners_promotionals','deliveries'));

    }

    /*
    VISTAS DEL CMS
    */
    public function dashboard(){
        return view('dashboard');
    }

    public function usuarios() {
        return view('cms.users.users');
    }

    public function categories() {
        return view('cms.categories.categories');
    }

    public function banners() {
        return view('cms.banners.banners');
    }

    public function estados() {
        return view('cms.states.states');
    }

    public function ciudades() {
        return view('cms.cities.cities');
    }

    public function productos() {
        return view('cms.products.products');
    }

    public function tiendasCMS() {
        return view('cms.tiendas.tiendas');
    }

    public function itemsCMS() {
        return view('cms.items.items');
    }

    public function comprasCMS(){
        return view('cms.purchases.purchases');
    }

    public function ventasCMS(){
        return view('cms.sales.sales');
    }

    public function privacy(){
        // Estados
        if ( Cache::has('states') ) {
            $states = Cache::get('states');
        } else {
            $states = State::all();
            Cache::put('states', $states);
        }
        // Ciudades
        if ( Cache::has('cities_first') ) {
            $cities_first = Cache::get('cities_first');
        } else {
            $cities_first = City::where('state_id', 1)->where('status', 'active')->get();
            Cache::put('cities_first', $cities_first);
        }
        return view('politics.privacy', compact('states', 'cities_first'));
    }

    public function support(){
        // Estados
        if ( Cache::has('states') ) {
            $states = Cache::get('states');
        } else {
            $states = State::all();
            Cache::put('states', $states);
        }
        // Ciudades
        if ( Cache::has('cities_first') ) {
            $cities_first = Cache::get('cities_first');
        } else {
            $cities_first = City::where('state_id', 1)->where('status', 'active')->get();
            Cache::put('cities_first', $cities_first);
        }
        return view('support.support', compact('states', 'cities_first'));
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


    // funcion que guarda en sesion el estado y la ciudad del usuario activo
    function setStateAndCitySession( $state_id, $city_id){

        session(['state_id' => $state_id]);
        session(['city_id' => $city_id]);
        return true;
    }
}
