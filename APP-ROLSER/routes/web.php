<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hola', function () {
    return view('hola');
});

Route::get('/tabla', function () {
    return view('tabla');
});
