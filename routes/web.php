<?php

use Illuminate\Support\Facades\Route;

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
