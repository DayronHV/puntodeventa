<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí registras las rutas web de tu aplicación. Cargadas
| por RouteServiceProvider dentro del grupo "web".
|
*/
Route::post('/sales', [SaleController::class, 'store'])
     ->name('sales.store')
     ->middleware('auth');

// Ruta pública de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Todas estas rutas requieren estar autenticado
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // CRUD de productos
    Route::resource('products', ProductController::class);
});

// Rutas de autenticación (login, register, etc.)
require __DIR__.'/auth.php';

