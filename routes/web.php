<?php

use App\Http\Controllers\ProductController; // Asegúrate que la P sea mayúscula
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de Producto
Route::prefix("/product")->controller(ProductController::class)->group(function () {
    Route::get('/index', "index")->name('product.index');
    Route::get('/create', "create")->name('product.create');
    Route::get('/{id}', "show")->name('product.show');
    Route::post('/', "store")->name('product.store');
    // ruta para eliminar un producto
    Route::delete('/{id}', "destroy")->name('product.destroy');
});

// Ruta de Contacto (Para que tu nuevo formulario funcione)
Route::get('/contacto', function () {
    return view('form'); 
});

// Mantener la ruta de proceso de contacto que ya tenías
Route::post('/contacto/enviar', function (Request $request) {
    // Aquí procesarías el correo
    return "Mensaje recibido de: " . $request->input('email');
});

// Esta será la cara que ven los clientes
Route::get('/tienda', [ProductController::class, 'shop'])->name('product.shop');