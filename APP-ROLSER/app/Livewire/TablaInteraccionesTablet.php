<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Interaccion;
use App\Models\OportunidadVenta;
use Illuminate\Support\Facades\Auth;



class TablaInteraccionesTablet extends Component
{
    public $search = '';
    public $id_interaccion;
    public $fecha_interaccion;
    public $medio_contacto;
    public$resumen_contacto;
    public $resultado;
    public $id_comercial;
    public $id_cliente_vip;
    public $id_cliente_no_vip;

    public $modalMostrar = false;
    public $modalAnyadir = false;
    public $modalModificar = false;
    public $modalEliminar = false;
    public $modalConfirmacionAnyadir = false;
    public $modalConfirmacionModificar = false;



    /**
     * Método para limpiar el campo de búsqueda
     */
    public function clearSearch()
    {
        $this->search = '';
    }

    public function abrirModalMostrar($interaccion_id)
    {

        $interaccion = Interaccion::find($interaccion_id);

        if ($interaccion) {
            $this->id_interaccion = $interaccion->id_interaccion;
            $this->fecha_interaccion = $interaccion->fecha_interaccion;
            $this->medio_contacto = $interaccion->medio_contacto;
            $this->resumen_contacto = $interaccion->resumen_contacto;
            $this->resultado = $interaccion->resultado;
            $this->id_comercial = $interaccion->id_comercial;
            $this->id_cliente_vip = $interaccion->id_cliente_vip;
            $this->id_cliente_no_vip = $interaccion->id_cliente_no_vip;
        }

        $this->modalMostrar = true;
    }

    public function cerrarModalMostrar()
    {
        $this->modalMostrar = false;
    }

    private function borrarValoresCampos()
    {
        $this->id_interaccion = '';
        $this->fecha_interaccion = '';
        $this->medio_contacto = '';
        $this->resumen_contacto = '';
        $this->resultado = '';
        $this->id_comercial = '';
        $this->id_cliente_vip = '';
        $this->id_cliente_no_vip = '';
    }



    public function abrirModalAnyadir()
    {
        $this->borrarValoresCampos();
        $this->modalAnyadir = true;
    }

    public function abrirModalModificar($interaccion_id)
    {
        $interaccion = Interaccion::find($interaccion_id);

        if ($interaccion) {
            $this->fecha_interaccion = $interaccion->fecha_interaccion;
            $this->medio_contacto = $interaccion->medio_contacto;
            $this->resumen_contacto = $interaccion->resumen_contacto;
            $this->resultado = $interaccion->resultado;
            $this->id_cliente_vip = $interaccion->id_cliente_vip;
            $this->id_cliente_no_vip = $interaccion->id_cliente_no_vip;
        }

        $this->modalModificar = true;
    }


    public function abrirModalEliminar($interaccion_id)
    {
        $this->id_interaccion = $interaccion_id;
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



    public function anyadirInteraccion()
    {
        $interaccion = new Interaccion();
        $interaccion->id_interaccion = $this->id_interaccion;
        $interaccion->fecha_interaccion = $this->fecha_interaccion;
        $interaccion->medio_contacto = $this->medio_contacto;
        $interaccion->resumen_contacto = $this->resumen_contacto;
        $interaccion->resultado = $this->resultado;
        $interaccion->id_comercial = $this->id_comercial;
        $interaccion->id_cliente_vip = $this->id_cliente_vip;
        $interaccion->id_cliente_no_vip = $this->id_cliente_no_vip;
        $interaccion->save();

        if ($this->resultado == 'positivo'){
            $oportunidad = new OportunidadVenta();
            $oportunidad->id_interaccion = $this->id_interaccion;
            $oportunidad->importe_estimado = $this->importe_estimado;
            $oportunidad->posibilidad = $this->posibilidad;
            $oportunidad->fecha_cierre_prevista = $this->fecha_cierre_prevista;
            $oportunidad->save();
        }
        $this->cerrarModalAnyadir();
    }

    public function modificarInteraccion()
    {
        $interaccion = Interaccion::find($this->id_interaccion);
        $interaccion->fecha_interaccion = $this->fecha_interaccion;
        $interaccion->medio_contacto = $this->medio_contacto;
        $interaccion->resumen_contacto = $this->resumen_contacto;
        $interaccion->resultado = $this->resultado;
        $interaccion->id_comercial = $this->id_comercial;
        $interaccion->id_cliente_vip = $this->id_cliente_vip;
        $interaccion->id_cliente_no_vip = $this->id_cliente_no_vip;
        $interaccion->save();
        $this->cerrarModalModificar();
    }

    public function eliminarCliente()
    {
        $interaccion = Interaccion::findOrFail($this->id_interaccion);
        $interaccion->delete();
        $this->cerrarModalEliminar();
    }

    public function render()
    {
        $interacciones = Interaccion::where('id_comercial', Auth::user()->comercial->id_comercial)
            ->where(function ($query) {
                $query->where('fecha_interaccion', 'like', $this->search)
                    ->orWhere('medio_contacto', 'like', $this->search)
                    ->orWhere('resumen_contacto', 'like', '%' . $this->search . '%')
                    ->orWhere('resultado', 'like', $this->search);
            })
            ->get();

        return view('livewire.tabla-interacciones-tablet', compact('interacciones'));
    }
}
