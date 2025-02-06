<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdministrativoController;
use Illuminate\Support\Facades\Http;

Route::get('/datatable/lang/Spanish', function () {
    $response = Http::get('https://cdn.datatables.net/plug-ins/1.11.5/i18n/Spanish.json');
    return response($response->body(), 200)->header('Content-Type', 'application/json');
});

// Route::get('/administrativo', function () {
//     return view('administrativo.index');
// })->name('administrativo.index');

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hola', function () {
    return view('hola');
});


// Route::get('/tabla', function () {
//     return view('tabla');
// });

Route::view('administrativoTabla', 'administrativo.index');
