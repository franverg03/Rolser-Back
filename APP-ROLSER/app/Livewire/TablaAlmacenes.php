<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Almacen;

class TablaAlmacenes extends Component
{
    public $search;
    public $perPage=10;
    public $id_almacen;
    public $almacen_nombre;
    public $almacen_ubicacion;
    public $almacen_capacidad;
    public $almacen_localidad;
    public $almacen_codigo_postal;
    public $modalMostrar=false;
    public $modalAnyadir = false;
    public $modalModificar = false;
    public $modalEliminar = false;
    public $modalConfirmacionAnyadir = false;
    public $modalConfirmacionModificar = false;

    private function borrarValoresCampos()
    {
        $this->id_almacen = '';
        $this->almacen_nombre = '';
        $this->almacen_ubicacion = '';
        $this->almacen_capacidad = '';
        $this->almacen_localidad = '';
        $this->almacen_codigo_postal = '';
    }

    public function abrirModalMostrar($almacen_id){

        $almacen = Almacen::find($almacen_id);

        if ($almacen) {
            $this->id_almacen = $almacen->id_almacen;
            $this->almacen_nombre = $almacen->almacen_nombre;
            $this->almacen_ubicacion = $almacen->almacen_ubicacion;
            $this->almacen_capacidad = $almacen->almacen_capacidad;
            $this->almacen_localidad = $almacen->almacen_localidad;
            $this->almacen_codigo_postal = $almacen->almacen_codigo_postal;
        }

        $this->modalMostrar=true;
}

    public function cerrarModalMostrar(){
        $this->modalMostrar=false;
    }


    public function abrirModalAnyadir()
    {
        $this->borrarValoresCampos();
        $this->modalAnyadir = true;
    }

    public function abrirModalModificar($almacen_id)
    {
        $almacen = Almacen::find($almacen_id);

        if ($almacen) {
            $this->id_almacen = $almacen->id_almacen;
            $this->almacen_nombre = $almacen->almacen_nombre;
            $this->almacen_ubicacion = $almacen->almacen_ubicacion;
            $this->almacen_capacidad = $almacen->almacen_capacidad;
            $this->almacen_localidad = $almacen->almacen_localidad;
            $this->almacen_codigo_postal = $almacen->almacen_codigo_postal;
        }

        $this->modalModificar = true;
    }

    public function abrirModalEliminar($almacen_id)
    {
        $this->id_almacen = $almacen_id;
        $this->modalEliminar = true;
    }

    public function cerrarModalAnyadir()
    {
        $this->modalAnyadir = false;
    }

    public function cerrarModalModificar()
    {
        $this->modalModificar = false;
    }

    public function cerrarModalEliminar()
    {
        $this->modalEliminar = false;
    }

    public function abrirModalConfirmacionAnyadir()
    {
        $this->modalConfirmacionAnyadir = true;
    }

    public function abrirModalConfirmacionModificar()
    {
        $this->modalConfirmacionModificar = true;
    }

    public function cerrarModalConfirmacionAnyadir()
    {
        $this->modalConfirmacionAnyadir = false;
    }

    public function cerrarModalConfirmacionModificar()
    {
        $this->modalConfirmacionModificar = false;
    }

    public function anyadirAlmacen()
    {
        $almacen = new Almacen();
        $almacen->almacen_nombre = $this->almacen_nombre;
        $almacen->almacen_ubicacion = $this->almacen_ubicacion;
        $almacen->almacen_capacidad = $this->almacen_capacidad;
        $almacen->almacen_localidad = $this->almacen_localidad;
        $almacen->almacen_codigo_postal = $this->almacen_codigo_postal;
        $almacen->save();
        $this->cerrarModalAnyadir();
    }

    public function modificarAlmacen()
    {
        $almacen = Almacen::find($this->id_almacen);
        $almacen->almacen_nombre = $this->almacen_nombre;
        $almacen->almacen_ubicacion = $this->almacen_ubicacion;
        $almacen->almacen_capacidad = $this->almacen_capacidad;
        $almacen->almacen_localidad = $this->almacen_localidad;
        $almacen->almacen_codigo_postal = $this->almacen_codigo_postal;
        $almacen->save();
        $this->cerrarModalModificar();
    }

    public function eliminarAlmacen()
    {
        $almacen = Almacen::findOrFail($this->id_almacen);
        $almacen->delete();
        $this->cerrarModalEliminar();
    }

    public function render()
{
    // Obtener todos los almacenes filtrados y paginados
    $almacenes = Almacen::where('almacen_nombre', 'like', '%' . $this->search . '%')
        ->orWhere('almacen_ubicacion', 'like', '%' . $this->search . '%')
        ->orWhere('almacen_localidad', 'like', '%' . $this->search . '%')
        ->orWhere('almacen_codigo_postal', 'like', '%' . $this->search . '%')
        ->paginate($this->perPage); // Recupera los registros paginados

    return view('livewire.tabla-almacenes', compact('almacenes'));
}




}
