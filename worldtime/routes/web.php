<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

// Rutas de autenticación
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas del catálogo (protegidas)
Route::middleware('auth')->group(function () {
    Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
    Route::get('/offers', [CatalogController::class, 'offers'])->name('catalog.offers');
    Route::get('/news', [CatalogController::class, 'news'])->name('catalog.news');
    Route::get('/brands', [CatalogController::class, 'brands'])->name('catalog.brands');
    Route::get('/about', [CatalogController::class, 'about'])->name('catalog.about');
});