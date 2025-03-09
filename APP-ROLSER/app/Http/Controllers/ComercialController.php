<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComercialController extends Controller
{
    public function mostrarTablaClientesAsignados(){
        return view('livewire.tabla-clientes-comercial');
    }
}
