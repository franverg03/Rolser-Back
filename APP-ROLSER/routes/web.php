<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clientesAdministrativo', function () {
    return view('clientesAdministrativo');
});

Route::get('/logIn', function () {
    return view('logIn');
});

Route::get('/logInTablet', function () {
    return view('logInTablet');
});

Route::get('/homeAdministrativo', function () {
    return view('homeAdministrativo');
});

Route::get('/usuariosAdministrativo', function () {
    return view('usuariosAdministrativo');
});

Route::get('/pedidosAdministrativo', function () {
    return view('pedidosAdministrativo');
});

Route::get('/almacenesAdministrativo', function () {
    return view('almacenesAdministrativo');
});

Route::get('/descuentosAdministrativo', function () {
    return view('descuentosAdministrativo');
});

Route::get('/tarifasAdministrativo', function () {
    return view('tarifasAdministrativo');
});

Route::get('/homeComercial', function () {
    return view('homeComercial');
});

Route::get('/clientesComercial', function () {
    return view('clientesComercial');
});


