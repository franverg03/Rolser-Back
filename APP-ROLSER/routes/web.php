<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\TablaAdministrativos;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/logIn', 'administrativo.logIn')->name('administrativo.logIn');
Route::view('/logInTablet', 'comercial.logInTablet')->name('comercial.logInTablet');
Route::view('/404', 'errors.404')->name('errors.404');



Route::view('/administrativo/home', 'administrativo.administrativo-home')->name('administrativo.home');
Route::view('/administrativo/clientes', 'administrativo.administrativo-clientes')->name('administrativo.clientes');
Route::view('/administrativo/usuarios', 'administrativo.administrativo-usuarios')->name('administrativo.usuarios');
Route::view('/administrativo/pedidos', 'administrativo.administrativo-pedidos')->name('administrativo.pedidos');
Route::view('/administrativo/almacenes', 'administrativo.administrativo-almacenes')->name('administrativo.almacenes');
Route::view('/administrativo/descuentos', 'administrativo.administrativo-descuentos')->name('administrativo.descuentos');
Route::view('/administrativo/tarifas', 'administrativo.administrativo-tarifas')->name('administrativo.tarifas');


Route::view('/comercial/home', 'comercial.comercial-home')->name('comercial.home');
Route::view('/comercial/clientes', 'comercial.comercial-clientes')->name('comercial.clientes');
Route::view('/comercial/catalogos', 'comercial.comercial-catalogos')->name('comercial.catalogos');
Route::view('/comercial/facturas', 'comercial.comercial-facturas')->name('comercial.facturas');
Route::view('/comercial/pedidos', 'comercial.comercial-pedidos')->name('comercial.pedidos');

require __DIR__.'/auth.php';
