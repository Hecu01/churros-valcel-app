<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\VentaController;

// Rutas para el panel de administración
Route::get('/inicio', [AdminController::class, 'index'])->name('admin.index');

// Rutas para el CRUD de productos
Route::get('/productos', [ProductoController::class, 'index'])->name('producto.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('producto.create');
Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('producto.edit');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('producto.update');
Route::delete('/productos/productos/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');
Route::post('/productos/store', [ProductoController::class, 'store'])->name('producto.store');

// Rutas para el CRUD de clientes
Route::get('/clientes', [ClienteController::class, 'index'])->name('cliente.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('cliente.create');
Route::get('/clientes/{id}/edit', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('/clientes/clientes/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');
Route::post('/clientes/store', [ClienteController::class, 'store'])->name('cliente.store');

// Rutas para el CRUD de ventas
Route::get('/ventas', [VentaController::class, 'index'])->name('venta.index');

Route::get('/ventas/create', [VentaController::class, 'create'])->name('venta.create');

Route::post('/ventas/store', [VentaController::class, 'store'])->name('venta.store');

Route::get('/ventas/{id}', [VentaController::class, 'show'])->name('venta.show');

Route::get('/ventas/{id}/edit', [VentaController::class, 'edit'])->name('venta.edit');

Route::put('/ventas/{id}', [VentaController::class, 'update'])->name('venta.update');

Route::delete('/ventas/ventas/{id}', [VentaController::class, 'destroy'])->name('venta.destroy');

Route::get('/ventas/{venta}/ticket', [VentaController::class, 'ticket'])->name('venta.ticket');