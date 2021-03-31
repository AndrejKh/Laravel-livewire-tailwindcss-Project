<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\StateComponent;
use App\Http\Livewire\CityComponent;
use App\Http\Livewire\PromotionalBannerComponent;
use App\Http\Livewire\ProductComponent;
use App\Http\Livewire\UserComponent;
use App\Http\Livewire\ItemsComponent;

use App\Models\State;


Route::get('/', [HomeController::class, 'index'])->name('home');

// Vistas de vitrina de productos, detalles de productos, incluyendo filtro
Route::get('/vitrina', [HomeController::class, 'vitrina'])->name('products.show');
Route::get('/categoria-productos/{slug}', [HomeController::class, 'vitrinaPorCategoria'])->name('products.category.show');
Route::get('/producto/{id}', [HomeController::class, 'ProductShow'])->name('products.details.show');

// Vistas de Tiendas, detalles de tiendas
Route::get('/supermercados', [HomeController::class, 'tiendas'])->name('tiendas.show');
Route::get('/supermercado/{slug}', [HomeController::class, 'tiendaDetail'])->name('tiendas.details.show');

// Rutas adicionales para el cms
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/register_seller', function () {
    $estados = State::where('status', 'active')->get();
    return view('auth.register_seller', compact('estados'));
})->name('auth.register_seller');


/* Componente de Livewire para 'Administradores' */
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.usuarios'])->get('/usuarios',[HomeController::class, 'usuarios'])->name('cms.usuarios');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.categorias'])->get('/categorias',[HomeController::class, 'categories'])->name('cms.categorias');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.estados'])->get('/estados',[HomeController::class, 'estados'])->name('cms.estados');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.ciudades'])->get('/ciudades',[HomeController::class, 'ciudades'])->name('cms.ciudades');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.home'])->get('/banners_home',[HomeController::class, 'banners'])->name('cms.home');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.productos'])->get('/productos',[HomeController::class, 'productos'])->name('cms.productos');


/* Componente de Livewire para 'Sellers' */
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.ventas'])->get('/tiendas',[HomeController::class, 'tiendas'])->name('cms.tiendas');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.ventas'])->get('/ventas',StateComponent::class)->name('cms.ventas');

Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.items'])->get('/items',function () {
    return view('cms.items');
})->name('cms.items');
// Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.items'])->get('/items',ItemsComponent::class)->name('cms.items');
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.blog'])->get('/blog',CategoryComponent::class)->name('cms.blog');

/* Componente de Livewire para 'Buyers' */
Route::middleware(['auth:sanctum', 'verified'])->middleware(['can:perfil.compras'])->get('/compras',StateComponent::class)->name('cms.compras');


Route::get('/supermercados', [HomeController::class, 'tiendas'])->name('tiendas.show');
