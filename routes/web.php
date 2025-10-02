<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// Rutas públicas para gestión de productos - CON PARÁMETRO CORREGIDO
Route::prefix('gestion-productos')->group(function () {
    Route::get('/', [ProductoController::class, 'index'])->name('gestion.productos.index');
    Route::get('/create', [ProductoController::class, 'create'])->name('gestion.productos.create');
    Route::post('/', [ProductoController::class, 'store'])->name('gestion.productos.store');
    Route::get('/{producto}', [ProductoController::class, 'show'])->name('gestion.productos.show'); // Cambiado
    Route::get('/{producto}/edit', [ProductoController::class, 'edit'])->name('gestion.productos.edit'); // Cambiado
    Route::put('/{producto}', [ProductoController::class, 'update'])->name('gestion.productos.update'); // Cambiado
    Route::delete('/{producto}', [ProductoController::class, 'destroy'])->name('gestion.productos.destroy'); // Cambiado
});

// Ruta para gestión de productos
//Route::get('/gestion-productos', [ProductoController::class, 'index'])->name('gestion.productos');
//Route::resource('productos', ProductoController::class);


// Rutas para inventario
Route::prefix('inventario')->group(function () {
    Route::get('/', [InventarioController::class, 'index'])->name('inventario.index');
    Route::get('/create', [InventarioController::class, 'create'])->name('inventario.create');
    Route::post('/', [InventarioController::class, 'store'])->name('inventario.store');
    Route::get('/{inventario}', [InventarioController::class, 'show'])->name('inventario.show');
    Route::get('/{inventario}/edit', [InventarioController::class, 'edit'])->name('inventario.edit');
    Route::put('/{inventario}', [InventarioController::class, 'update'])->name('inventario.update');
    Route::delete('/{inventario}', [InventarioController::class, 'destroy'])->name('inventario.destroy');
});

// Rutas protegidas para administrador
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('productos', ProductoController::class);
    Route::resource('inventario', InventarioController::class);
});

require __DIR__.'/auth.php';