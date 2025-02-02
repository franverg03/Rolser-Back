<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdministrativoController;
use App\Http\Controllers\ComercialController;
use App\Http\Controllers\ClienteNoVipController;
use App\Http\Controllers\ClienteVipController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\LineaPedidoController;
use App\Http\Controllers\DescuentoController;
use App\Http\Controllers\TarifaController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\LineaFacturaController;




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('login', [UserController::class,'login']);
Route::post('register', [UserController::class,'register']);
Route::group(['middleware' => 'auth:api'], function () {
        Route::get('details', [UserController::class,'details']);
        Route::get('logout', [UserController::class,'logout']);
});


Route::resource('administrativos', AdministrativoController::class);

Route::resource('comerciales', ComercialController::class);

Route::resource('clientes_no_vip', ClienteNoVipController::class);

Route::apiResource('clientes_vip', ClienteVipController::class);

Route::resource('almacenes', AlmacenController::class);

Route::resource('productos', ProductoController::class);

Route::resource('pedidos', PedidoController::class);

Route::resource('lineas_pedidos', LineaPedidoController::class);

Route::resource('descuentos', DescuentoController::class);

Route::resource('tarifas', TarifaController::class);

Route::resource('catalogos', CatalogoController::class);

Route::resource('facturas', FacturaController::class);

Route::resource('lineas_facturas', LineaFacturaController::class);
