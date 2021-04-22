<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\StateComponent;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Vistas de vitrina de productos, detalles de productos, incluyendo filtro
Route::get('/categoria-productos/{slug}', [HomeController::class, 'vitrinaPorCategoria'])->name('products.category.show');
Route::get('/vitrina', [HomeController::class, 'vitrina'])->name('products.show');
Route::get('/producto/{id}', [HomeController::class, 'ProductShow'])->name('products.details.show');

// Vistas de Tiendas, detalles de tiendas
Route::get('/supermercados', [HomeController::class, 'tiendas'])->name('tiendas.show');
Route::get('/supermercado/{slug}/{id}', [HomeController::class, 'tiendaDetail'])->name('tiendas.details.show');

// Vista de comparar
Route::get('/comparar', [CompareController::class, 'index'])->name('comparar');

// Rutas adicionales para el cms
Route::get('/register_seller', [HomeController::class, 'register_seller'])->name('auth.register_seller');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

/* Componente de Livewire para 'Administradores' */
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.usuarios'])->get('/usuarios',[HomeController::class, 'usuarios'])->name('cms.usuarios');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.categorias'])->get('/categorias',[HomeController::class, 'categories'])->name('cms.categorias');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.estados'])->get('/estados',[HomeController::class, 'estados'])->name('cms.estados');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.ciudades'])->get('/ciudades',[HomeController::class, 'ciudades'])->name('cms.ciudades');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.home'])->get('/banners_home',[HomeController::class, 'banners'])->name('cms.home');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.productos'])->get('/productos',[HomeController::class, 'productos'])->name('cms.productos');

/* Componente de Livewire para 'Sellers' */
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.ventas'])->get('/tiendas',[HomeController::class, 'tiendasCMS'])->name('cms.tiendas');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.ventas'])->get('/ventas',StateComponent::class)->name('cms.ventas');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.items'])->get('/items', [HomeController::class, 'itemsCMS'])->name('cms.items');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.blog'])->get('/blog',CategoryComponent::class)->name('cms.blog');

/* Componente de Livewire para 'Buyers' */
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.compras'])->get('/compras',StateComponent::class)->name('cms.compras');


// Apis para llamadas axios
Route::get('/get/states/', [StateController::class, 'getStates']);
Route::get('/get/cities/', [CityController::class, 'getCities']);
Route::get('/get/cities-state/{id}', [CityController::class, 'getCitiesByStateId']);

Route::get('/get/products/', [ProductController::class, 'getProducts']);
Route::get('/get/product-item/{id}', [ProductController::class, 'getProductsByItemId']);

Route::get('/get/items/', [ItemController::class, 'getItems']);
Route::get('/get/item-brand/{id}', [ItemController::class, 'getItemsByBrandId']);

Route::get('/get/brand-state/{id}', [BrandController::class, 'getBrandsByStateId']);
Route::get('/get/brand-city/{id}', [BrandController::class, 'getBrandsByCityId']);
Route::get('/get/brand-delivey/', [BrandController::class, 'getBrandsByDelivery']);
Route::get('/get/brand-delivey-free/', [BrandController::class, 'getBrandsByDeliveryFree']);
Route::get('/get/brand-product/{id}', [BrandController::class, 'getBrandsByProductId']);
Route::get('/get/brand-category/{id}', [BrandController::class, 'getBrandsByCategoryId']);

Route::get('/get/items-price/{id}/{items}', [ItemController::class, 'getPriceAndProductIdToShoppingCarByBrandId']);
Route::get('/get/items-brand/{id}/{items}', [ItemController::class, 'getItemsByBrandId']);






