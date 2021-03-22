<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\StateComponent;
use App\Http\Livewire\CityComponent;
use App\Http\Livewire\PromotionalBannerComponent;
use App\Http\Livewire\ProductComponent;
use App\Models\State;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/register_seller', function () {
    $estados = State::where('status', 'active')->get();
    return view('auth.register_seller', compact('estados'));
})->name('auth.register_seller');


/* Componente de Livewire como una vista FullPage */
Route::middleware(['auth:sanctum', 'verified'])->get('/categorias',CategoryComponent::class)->name('cms.categorias');
Route::middleware(['auth:sanctum', 'verified'])->get('/estados',StateComponent::class)->name('cms.estados');
Route::middleware(['auth:sanctum', 'verified'])->get('/ciudades',CityComponent::class)->name('cms.ciudades');
Route::middleware(['auth:sanctum', 'verified'])->get('/banners_home',PromotionalBannerComponent::class)->name('cms.banners_home');
Route::middleware(['auth:sanctum', 'verified'])->get('/productos',ProductComponent::class)->name('cms.productos');
