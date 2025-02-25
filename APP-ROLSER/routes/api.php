<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AdministrativoController;
use App\Http\Controllers\API\AlmacenController;
use App\Http\Controllers\API\CatalogoController;
use App\Http\Controllers\API\ClienteNoVipController;
use App\Http\Controllers\API\ClienteVipController;
use App\Http\Controllers\API\ComercialController;
use App\Http\Controllers\API\DescuentoController;
use App\Http\Controllers\API\FacturaController;
use App\Http\Controllers\API\LineaFacturaController;
use App\Http\Controllers\API\LineaPedidoController;
use App\Http\Controllers\API\PedidoController;
use App\Http\Controllers\API\ProductoController;
use App\Http\Controllers\API\TarifaController;
use App\Http\Controllers\API\UserController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource('administrativos', controller: AdministrativoController::class);
Route::resource('almacenes', AlmacenController::class);
Route::resource('catalogos', CatalogoController::class);
Route::resource('clientes-no-vip', ClienteNoVipController::class);
Route::resource('clientes-vip', ClienteVipController::class);
Route::resource('comerciales', ComercialController::class);
Route::resource('descuentos', DescuentoController::class);
Route::resource('facturas', FacturaController::class);
Route::resource('lineas-facturas', LineaFacturaController::class);
Route::resource('lineas-pedidos', LineaPedidoController::class);
Route::resource('pedidos', PedidoController::class);
Route::resource('productos', ProductoController::class);
Route::resource('tarifas', TarifaController::class);
Route::resource('users', UserController::class);
