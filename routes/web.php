<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductInRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RekestController;
use App\Models\ProductInRequest;
use Illuminate\Support\Facades\Route;

// Ruta principal de la aplicación
Route::get('/', function () {
    return view('welcome');
});

// Dashboard solo accesible para usuarios autenticados
Route::get('/dashboard', [RekestController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Ruta para el historial de pedidos (cancelado o completo)
Route::get('/historial', [RekestController::class, 'Historial'])->name('rekests.historial');

Route::resource('rekests', RekestController::class);
Route::patch('rekests/{rekest}/change-status', [RekestController::class, 'changeStatus'])->name('rekests.changeStatus');
Route::get('rekests/{rekestId}/add-product', [ProductInRequestController::class, "create"])->name('productsinrequests.create');
Route::post('rekests/{rekestId}/add-product', [ProductInRequestController::class, 'store'])->name('productsinrequests.store');
// Ruta para la lista de productos (si es necesario)
Route::resource('products', ProductController::class);

// Rutas para los clientes (CRUD)
Route::resource('clients', ClientController::class);

// Rutas de perfil (ya definidas en el código original)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Requiere las rutas de autenticación definidas en 'auth.php'
require __DIR__ . '/auth.php';
