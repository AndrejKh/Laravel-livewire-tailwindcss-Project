<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingsBuyerController;
use App\Http\Controllers\RatingsSellerController;
use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CategoryComponent;

Route::get('/', [HomeController::class, 'index'])->name('home');
// Categorias
Route::get('/categorias', [HomeController::class, 'categorias'])->name('categorias');
Route::get('/categorias/{slug}', [HomeController::class, 'vitrinaPorCategoria'])->name('products.category.show');

// Vistas de Tiendas, detalles de tiendas
Route::get('/supermercados', [HomeController::class, 'brands'])->name('brands.show');
Route::get('/supermercado/{slug}', [HomeController::class, 'brandsDetail'])->name('brands.details.show');
Route::get('/supermercado/{brand}/{product}', [HomeController::class, 'productShowBrand'])->name('brands.products.details.show');

// Vistas de vitrina de productos, detalles de productos, incluyendo filtro
Route::get('/listado-de-productos/', [HomeController::class, 'vitrina'])->name('products.show');
Route::get('/productos/{slug}', [HomeController::class, 'productShow'])->name('products.details.show');

// Vista de comparar
Route::get('/comparar', [CompareController::class, 'index'])->name('comparar');

// Politicas
Route::get('/politicas-de-privacidad', [HomeController::class, 'privacy'])->name('politics.privacy');

// Soporte
Route::get('/soporte', [HomeController::class, 'support'])->name('support.index');

/* CMS */
// Rutas adicionales para el cms
Route::get('/registro-abasto', [HomeController::class, 'register_seller'])->name('auth.register_seller');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

/* Componente de Livewire para 'Administradores' */
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.usuarios'])->get('/cms/usuarios',[HomeController::class, 'usuarios'])->name('cms.usuarios');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.categorias'])->get('/cms/categorias-cms',[HomeController::class, 'categories'])->name('cms.categorias');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.estados'])->get('/cms/estados',[HomeController::class, 'estados'])->name('cms.estados');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.ciudades'])->get('/cms/ciudades',[HomeController::class, 'ciudades'])->name('cms.ciudades');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.home'])->get('/cms/banners_home',[HomeController::class, 'banners'])->name('cms.home');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.productos'])->get('/cms/productos',[HomeController::class, 'productos'])->name('cms.productos');

/* Componente de Livewire para 'Sellers' */
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.ventas'])->get('/cms/tiendas',[HomeController::class, 'tiendasCMS'])->name('cms.tiendas');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.ventas'])->get('/cms/ventas',[HomeController::class, 'ventasCMS'])->name('cms.ventas');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.items'])->get('/cms/items', [HomeController::class, 'itemsCMS'])->name('cms.items');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.blog'])->get('/cms/blog',CategoryComponent::class)->name('cms.blog');

/* Componente de Livewire para 'Buyers' */
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.compras'])->get('/cms/compras', [HomeController::class, 'comprasCMS'])->name('cms.compras');

/**************** APis para llamdas internas via AXIOS ****************/
// Estados
Route::get('/get/states/', [StateController::class, 'getStates']);
Route::get('/get/state-state/', [StateController::class, 'getStateByStateTitle']);
Route::get('/get/cities/', [CityController::class, 'getCities']);
Route::get('/get/cities-state/{id}', [CityController::class, 'getCitiesByStateId']);
// Categorias - Productos
Route::get('/get/categories/', [CategoryController::class, 'getCategoriesPrincipals']);
Route::get('/get/categories-child/{id}', [CategoryController::class, 'getCategoriesChildrenByCategoryId']);
Route::get('/get/categories-child-products/{id}', [CategoryController::class, 'getQuantityOfProductsByCategoryId']);
// Productos
Route::get('/get/products/', [ProductController::class, 'getProducts']);
Route::get('/get/product/{id}', [ProductController::class, 'getProductById']);
Route::get('/get/product-category/{id}', [ProductController::class, 'getProductsByCategoryId']);
Route::get('/get/total-product-category/{id}', [ProductController::class, 'getTotalProductsByCategoryId']);
Route::get('/get/product-item/{id}', [ProductController::class, 'getProductsByItemId']);
Route::get('/get/product-state/{id}', [ProductController::class, 'getProductsByStateId']);
Route::get('/get/product-city/{id}', [ProductController::class, 'getProductsByCityId']);
// Items
Route::get('/get/items/', [ItemController::class, 'getItems']);
Route::get('/get/item-brand/{id}', [ItemController::class, 'getItemsByBrandId']);
Route::get('/get/items-price/{id}/{items}', [ItemController::class, 'getPriceAndProductIdToShoppingCarByBrandId']);
Route::get('/get/items-brand/{id}/{items}', [ItemController::class, 'getItemsByBrandId']);
// Marcas - Brand
Route::get('/get/brand-state/{id}', [BrandController::class, 'getBrandsByStateId']);
Route::get('/get/brand-city/{id}', [BrandController::class, 'getBrandsByCityId']);
Route::get('/get/brand-delivey/', [BrandController::class, 'getBrandsByDelivery']);
Route::get('/get/brand-delivey-free/', [BrandController::class, 'getBrandsByDeliveryFree']);
Route::get('/get/brand-product/{id}', [BrandController::class, 'getBrandsByProductId']);
Route::get('/get/brand-category/{id}', [BrandController::class, 'getBrandsByCategoryId']);
Route::get('/get/brand-order/{id}', [BrandController::class, 'getBrandByOrderId']);

// Ruta para crear orden(compra)
Route::post('/post/create-order/', [OrderController::class, 'createOrder']);
// Route::middleware(['auth:sanctum', 'verified'])->post('/post/create-order/', [OrderController::class, 'createOrder']);
Route::get('/get/order/{id}', [OrderController::class, 'getOrderById']);
Route::get('/get/order-products/{id}', [OrderController::class, 'getProductsByOrderId']);

Route::post('/post/cancel-order/', [OrderController::class, 'cancelOrder']);

// Ruta para calificaciones
Route::post('/post/rating-seller/', [RatingsSellerController::class, 'createRating']);
Route::post('/post/rating-buyer/', [RatingsBuyerController::class, 'createRating']);

/**************** FIN APis para llamdas internas via AXIOS ****************/
