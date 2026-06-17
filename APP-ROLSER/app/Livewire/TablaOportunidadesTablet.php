<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OportunidadVenta;
use Illuminate\Support\Facades\Auth;



class TablaOportunidadesTablet extends Component
{
    public $search = '';
    public $id_oportunidad;
    public $importe_estimado;
    public $posibilidad;
    public $fecha_cierre_prevista;
    public $id_interaccion;

    public $modalMostrar = false;

    public $modalModificar = false;
    public $modalEliminar = false;
    public $modalConfirmacionModificar = false;



    /**
     * Método para limpiar el campo de búsqueda
     */
    public function clearSearch()
    {
        $this->search = '';
    }

    public function abrirModalMostrar($oportunidad_id)
    {

        $oportunidad = OportunidadVenta::find($oportunidad_id);

        if ($oportunidad) {
            $this->id_oportunidad = $oportunidad->id_oportunidad_venta;
            $this->importe_estimado = $oportunidad->importe_estimado;
            $this->posibilidad = $oportunidad->posibilidad;
            $this->fecha_cierre_prevista = $oportunidad->fecha_cierre_prevista;
            $this->id_interaccion = $oportunidad->id_interaccion;
        }

        $this->modalMostrar = true;
    }

    public function cerrarModalMostrar()
    {
        $this->modalMostrar = false;
    }

    private function borrarValoresCampos()
    {
        $this->id_oportunidad = '';
        $this->importe_estimado = '';
        $this->posibilidad = '';
        $this->fecha_cierre_prevista = '';
        $this->id_interaccion = '';
    }



    public function abrirModalModificar($oportunidad_id)
    {
        $oportunidad = OportunidadVenta::find($oportunidad_id);

        if ($oportunidad) {
            $this->id_oportunidad = $oportunidad->id_oportunidad_venta;
            $this->importe_estimado = $oportunidad->importe_estimado;
            $this->posibilidad = $oportunidad->posibilidad;
            $this->fecha_cierre_prevista = $oportunidad->fecha_cierre_prevista;
            $this->id_interaccion = $oportunidad->id_interaccion;
        }

        $this->modalModificar = true;
    }


    public function abrirModalEliminar($oportunidad_id)
    {
        $this->id_interaccion = $oportunidad_id;
        $this->modalEliminar = true;
    }



    public function cerrarModalModificar()
    {
        $this->modalModificar = false;
    }

    public function cerrarModalEliminar()
    {
        $this->modalEliminar = false;
    }

    public function abrirModalConfirmacionModificar()
    {
        $this->modalConfirmacionModificar = true;
    }

    public function cerrarModalConfirmacionModificar()
    {
        $this->modalConfirmacionModificar = false;
    }

    public function modificarOportunidad()
    {
        $oportunidad = OportunidadVenta::find($this->id_oportunidad);
        $oportunidad->importe_estimado = $this->importe_estimado;
        $oportunidad->posibilidad = $this->posibilidad;
        $oportunidad->fecha_cierre_prevista = $this->fecha_cierre_prevista;
        $oportunidad->save();

        $this->cerrarModalModificar();
    }

    public function eliminarCliente()
    {
        $oportunidad = OportunidadVenta::findOrFail($this->id_oportunidad);
        $oportunidad->delete();
        $this->cerrarModalEliminar();
    }

    public function render()
    {
        $oportunidades = OportunidadVenta::where('id_comercial', Auth::user()->comercial->id_comercial)
            ->where(function ($query) {
                $query->where('importe_estimado', 'like', $this->search)
                    ->orWhere('posibilidad', 'like', $this->search)
                    ->orWhere('fecha_cierre_prevista', 'like', '%' . $this->search . '%')
                    ->orWhere('id_interaccion', 'like', $this->search);
            })
            ->get();

        return view('livewire.tabla-oportunidades-tablet', compact('oportunidades'));
    }
}
