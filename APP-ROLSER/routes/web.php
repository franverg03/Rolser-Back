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



Route::view('/administrativo/usuarios/', 'administrativo.administrativo-usuarios');



Route::view('/administrativo/clientes', 'administrativo.administrativo-clientes');

Route::view('/comercial/home', 'comercial.comercial-home');

Route::view('/comercial/pedidos', 'comercial.comercial-pedidos');

Route::view('/comercial/facturas', 'comercial.comercial-facturas');

Route::view('/comercial/clientes', 'comercial.comercial-clientes');

require __DIR__.'/auth.php';

