<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OportunidadVenta;
use Illuminate\Support\Facades\Auth;
use App\Models\Interaccion;



class TablaOportunidadesTablet extends Component
{
    public $search = '';
    public $id_oportunidad;
    public $importe_estimado;
    public $posibilidad;
    public $fecha_cierre_prevista;
    public $id_interaccion;
    public $cliente;
    public $nombre_empresa;

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
        // Cargamos la oportunidad. Si no existe, evitamos que continúe.
        $oportunidad = OportunidadVenta::find($oportunidad_id);

        if ($oportunidad) {
            $this->id_oportunidad = $oportunidad->id_oportunidad_venta;
            $this->importe_estimado = $oportunidad->importe_estimado;
            $this->posibilidad = $oportunidad->posibilidad;

            // CORRECCIÓN: Parseamos la fecha y aplicamos el formato d-m-Y
            $this->fecha_cierre_prevista = \Carbon\Carbon::parse($oportunidad->fecha_cierre_prevista)->format('d-m-Y');

            $this->id_interaccion = $oportunidad->id_interaccion;

            // Buscamos la interacción asociada usando el ID que ya tenemos
            $interaccion = Interaccion::find($oportunidad->id_interaccion);

            if ($interaccion) {
                if ($interaccion->id_cliente_vip) {
                    $this->cliente = $interaccion->clienteVip;
                    $this->nombre_empresa = $interaccion->clienteVip?->cliente_empresa ?? 'Cliente VIP sin Empresa';
                } elseif ($interaccion->id_cliente_no_vip) {
                    $this->cliente = $interaccion->clienteNoVip;
                    $this->nombre_empresa = $interaccion->clienteNoVip?->cliente_empresa ?? 'Cliente No VIP sin Empresa';
                } else {
                    $this->cliente = null;
                    $this->nombre_empresa = 'Sin cliente asignado';
                }
            } else {
                $this->cliente = null;
                $this->nombre_empresa = 'Sin interacción asociada';
            }

            $this->modalMostrar = true;
        }
    }

    public function cerrarModalMostrar()
    {
        $this->modalMostrar = false;
    }

    public function abrirModalModificar($oportunidad_id)
    {
        $oportunidad = OportunidadVenta::find($oportunidad_id);

        if ($oportunidad) {
            $this->id_oportunidad = $oportunidad->id_oportunidad_venta;
            $this->importe_estimado = $oportunidad->importe_estimado;
            $this->posibilidad = $oportunidad->posibilidad;

            $this->fecha_cierre_prevista = \Carbon\Carbon::parse($oportunidad->fecha_cierre_prevista)->format('Y-m-d');
            $this->id_interaccion = $oportunidad->id_interaccion;

            $interaccion = Interaccion::find($oportunidad->id_interaccion);

            if ($interaccion) {
                if ($interaccion->id_cliente_vip) {
                    $this->cliente = $interaccion->clienteVip;
                    $this->nombre_empresa = $interaccion->clienteVip?->cliente_empresa ?? 'Cliente VIP sin Empresa';
                } elseif ($interaccion->id_cliente_no_vip) {
                    $this->cliente = $interaccion->clienteNoVip;
                    $this->nombre_empresa = $interaccion->clienteNoVip?->cliente_empresa ?? 'Cliente No VIP sin Empresa';
                } else {
                    $this->cliente = null;
                    $this->nombre_empresa = 'Sin cliente asignado';
                }
            } else {
                $this->cliente = null;
                $this->nombre_empresa = 'Sin interacción asociada';
            }

            $this->modalModificar = true;
        }
    }

    public function abrirModalEliminar($oportunidad_id)
    {
        $this->id_oportunidad = $oportunidad_id;
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
        $this->cerrarModalConfirmacionModificar();
    }

    public function eliminarOportunidad()
    {
        $oportunidad = OportunidadVenta::findOrFail($this->id_oportunidad);
        $oportunidad->delete();
        $this->cerrarModalEliminar();
    }

    public function render()
    {
        $idComercialActual = Auth::user()->comercial->id_comercial;

        $oportunidades = OportunidadVenta::whereHas('interaccion', function ($query) use ($idComercialActual) {
            // Seguridad: Solo oportunidades del comercial autenticado
            $query->where('id_comercial', $idComercialActual);
        })
            ->where(function ($query) {
                // Buscador por campos nativos de la oportunidad
                $query->where('importe_estimado', 'like', '%' . $this->search . '%')
                    ->orWhere('posibilidad', 'like', '%' . $this->search . '%')
                    ->orWhere('fecha_cierre_prevista', 'like', '%' . $this->search . '%')
                    ->orWhere('id_interaccion', 'like', '%' . $this->search . '%')
                    ->orWhereHas('interaccion.clienteVip', function ($q) {
                        $q->where('cliente_empresa', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('interaccion.clienteNoVip', function ($q) {
                        $q->where('cliente_empresa', 'like', '%' . $this->search . '%');
                    });
            })
            ->get();

        return view('livewire.tabla-oportunidades-tablet', compact('oportunidades'));
    }
}
