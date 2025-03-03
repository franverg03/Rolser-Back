<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => 'admin'], function() {
    Route::prefix('administrativo')->group(function() {
        Route::view('/home', 'administrativo.administrativo-home')->name('administrativo.home');
        Route::view('/clientes', 'administrativo.administrativo-clientes')->name('administrativo.clientes');
        Route::view('/usuarios', 'administrativo.administrativo-usuarios')->name('administrativo.usuarios');
        Route::view('/pedidos', 'administrativo.administrativo-pedidos')->name('administrativo.pedidos');
        Route::view('/almacenes', 'administrativo.administrativo-almacenes')->name('administrativo.almacenes');
        Route::view('/descuentos', 'administrativo.administrativo-descuentos')->name('administrativo.descuentos');
        Route::view('/tarifas', 'administrativo.administrativo-tarifas')->name('administrativo.tarifas');
    });
});

Route::view('/404', 'errors.404')->name('errors.404');

Route::group(['middleware' => 'comercial'], function() {
    // Rutas que comparten el prefijo "comercial"
    Route::prefix('comercial')->group(function() {
        Route::view('/home', 'comercial.comercial-home')->name('comercial.home');
        Route::view('/clientes', 'comercial.comercial-clientes')->name('comercial.clientes');
        Route::view('/catalogos', 'comercial.comercial-catalogos')->name('comercial.catalogos');
        Route::view('/facturas', 'comercial.comercial-facturas')->name('comercial.facturas');
        Route::view('/pedidos', 'comercial.comercial-pedidos')->name('comercial.pedidos');
    });
});

require __DIR__.'/auth.php';

