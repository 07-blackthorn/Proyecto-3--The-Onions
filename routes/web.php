<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ReparacionController;

// =============================
// RUTA PRINCIPAL
// =============================
Route::get('/', function () {
    return view('welcome');
});

// =============================
// DASHBOARD (solo para usuarios autenticados)
// =============================
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// =============================
// GESTIÓN DE PRODUCTOS
// =============================
Route::prefix('gestion-productos')->group(function () {
    Route::get('/', [ProductoController::class, 'index'])->name('gestion.productos.index');
    Route::get('/create', [ProductoController::class, 'create'])->name('gestion.productos.create');
    Route::post('/', [ProductoController::class, 'store'])->name('gestion.productos.store');
    Route::get('/{producto}/edit', [ProductoController::class, 'edit'])->name('gestion.productos.edit');
    Route::put('/{producto}', [ProductoController::class, 'update'])->name('gestion.productos.update');
    Route::delete('/{producto}', [ProductoController::class, 'destroy'])->name('gestion.productos.destroy');
    Route::get('/{producto}', [ProductoController::class, 'show'])->name('gestion.productos.show');
});

// =============================
// INVENTARIO
// =============================
Route::prefix('inventario')->group(function () {
    Route::get('/', [InventarioController::class, 'index'])->name('inventario.index');
    Route::get('/create', [InventarioController::class, 'create'])->name('inventario.create');
    Route::post('/', [InventarioController::class, 'store'])->name('inventario.store');
    Route::get('/{inventario}/edit', [InventarioController::class, 'edit'])->name('inventario.edit');
    Route::put('/{inventario}', [InventarioController::class, 'update'])->name('inventario.update');
    Route::delete('/{inventario}', [InventarioController::class, 'destroy'])->name('inventario.destroy');
    Route::get('/{inventario}', [InventarioController::class, 'show'])->name('inventario.show');
});

// =============================
// REPARACIONES
// =============================
Route::prefix('reparaciones')->group(function () {
    Route::get('/', [ReparacionController::class, 'index'])->name('reparaciones.index');
    Route::get('/create', [ReparacionController::class, 'create'])->name('reparaciones.create');
    Route::post('/', [ReparacionController::class, 'store'])->name('reparaciones.store');
    Route::get('/{reparacion}/edit', [ReparacionController::class, 'edit'])->name('reparaciones.edit');
    Route::put('/{reparacion}', [ReparacionController::class, 'update'])->name('reparaciones.update');
    Route::delete('/{reparacion}', [ReparacionController::class, 'destroy'])->name('reparaciones.destroy');
    Route::get('/{reparacion}', [ReparacionController::class, 'show'])->name('reparaciones.show');
});

// Ruta para enviar alerta de retraso
Route::post('/reparaciones/{reparacion}/alerta', [ReparacionController::class, 'enviarAlerta'])
    ->name('reparaciones.alerta');
    
// =============================
// SISTEMA DE AUTENTICACIÓN
// =============================
require __DIR__ . '/auth.php';
