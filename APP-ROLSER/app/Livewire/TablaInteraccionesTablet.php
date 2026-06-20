<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Interaccion;
use App\Models\OportunidadVenta;
use Illuminate\Support\Facades\Auth;
use App\Models\ClienteNoVip;
use App\Models\ClienteVip;

class TablaInteraccionesTablet extends Component
{
    public $search = '';

    // Propiedades de Interacción
    public $id_interaccion;
    public $fecha_interaccion;
    public $medio_contacto;
    public $resumen_contacto;
    public $resultado;
    public $id_comercial;
    public $id_cliente_vip;
    public $id_cliente_no_vip;

    // Propiedad de Cliente vinculada (Como texto, NUNCA modelo público)
    public $nombre_empresa;

    // Propiedades para Oportunidad de Venta
    public $importe_estimado;
    public $posibilidad;
    public $fecha_cierre_prevista;

    // Estados de Modales
    public $modalMostrar = false;
    public $modalAnyadir = false;
    public $modalModificar = false;
    public $modalEliminar = false;
    public $modalConfirmacionAnyadir = false;
    public $modalConfirmacionModificar = false;
    public $modalAnyadirOportunidad = false;

    public function clearSearch()
    {
        $this->search = '';
    }

    public function abrirModalConfirmacionAnyadir()
    {
        $this->modalConfirmacionAnyadir = true;
    }

    public function cerrarModalConfirmacionAnyadir()
    {
        $this->modalConfirmacionAnyadir = false;
    }

    public function abrirModalConfirmacionModificar()
    {
        $this->modalConfirmacionModificar = true;
    }

    public function cerrarModalConfirmacionModificar()
    {
        $this->modalConfirmacionModificar = false;
    }

    public function abrirModalMostrar($interaccion_id)
    {
        $interaccion = Interaccion::with(['clienteVip', 'clienteNoVip'])->find($interaccion_id);

        if ($interaccion) {
            $this->id_interaccion = $interaccion->id_interaccion;
            $this->fecha_interaccion = $interaccion->fecha_interaccion ? \Carbon\Carbon::parse($interaccion->fecha_interaccion)->format('d/m/Y') : '';
            $this->medio_contacto = $interaccion->medio_contacto;
            $this->resumen_contacto = $interaccion->resumen_contacto;
            $this->resultado = $interaccion->resultado;
            $this->id_comercial = $interaccion->id_comercial;
            $this->id_cliente_vip = $interaccion->id_cliente_vip;
            $this->id_cliente_no_vip = $interaccion->id_cliente_no_vip;

            if ($this->id_cliente_no_vip) {
                $clienteModel = ClienteNoVip::find($this->id_cliente_no_vip);
                $this->nombre_empresa = $clienteModel ? $clienteModel->cliente_empresa : 'Sin empresa';
            } else {
                $clienteModel = ClienteVip::find($this->id_cliente_vip);
                $this->nombre_empresa = $clienteModel ? $clienteModel->cliente_empresa : 'Sin empresa';
            }

            $this->modalMostrar = true;
        }
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
        $this->nombre_empresa = '';

        // Limpiamos campos de oportunidad
        $this->importe_estimado = '';
        $this->posibilidad = '';
        $this->fecha_cierre_prevista = '';
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
            $this->id_interaccion = $interaccion->id_interaccion;
            $this->fecha_interaccion = $interaccion->fecha_interaccion ? \Carbon\Carbon::parse($interaccion->fecha_interaccion)->format('Y-m-d') : '';
            $this->medio_contacto = $interaccion->medio_contacto;
            $this->resumen_contacto = $interaccion->resumen_contacto;
            $this->resultado = $interaccion->resultado;
            $this->id_cliente_vip = $interaccion->id_cliente_vip;
            $this->id_cliente_no_vip = $interaccion->id_cliente_no_vip;

            if ($this->id_cliente_no_vip) {
                $clienteModel = ClienteNoVip::find($this->id_cliente_no_vip);
                $this->nombre_empresa = $clienteModel ? $clienteModel->cliente_empresa : 'Sin empresa';
            } else {
                $clienteModel = ClienteVip::find($this->id_cliente_vip);
                $this->nombre_empresa = $clienteModel ? $clienteModel->cliente_empresa : 'Sin empresa';
            }

            $this->modalModificar = true;
        }
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

    public function cerrarModalAnyadirOportunidad()
    {
        $this->modalAnyadirOportunidad = false;
    }

    public function cerrarModalModificar()
    {
        $this->modalModificar = false;
    }

    public function cerrarModalEliminar()
    {
        $this->modalEliminar = false;
    }

    public function updatedIdClienteVip($value)
    {
        if ($value) {
            $this->id_cliente_no_vip = null;
        }
    }

    public function updatedIdClienteNoVip($value)
    {
        if ($value) {
            $this->id_cliente_vip = null;
        }
    }

    public function anyadirInteraccion()
    {
        $idComercialActual = Auth::user()->comercial->id_comercial;

        $interaccion = new Interaccion();
        $interaccion->fecha_interaccion = \Carbon\Carbon::parse($this->fecha_interaccion)->format('Y-m-d H:i:s');
        $interaccion->medio_contacto    = $this->medio_contacto;
        $interaccion->resumen_contacto  = $this->resumen_contacto;
        $interaccion->resultado         = $this->resultado;
        $interaccion->id_comercial      = $idComercialActual;

        $interaccion->id_cliente_vip    = $this->id_cliente_vip ?: null;
        $interaccion->id_cliente_no_vip = $this->id_cliente_no_vip ?: null;

        $interaccion->save();

        $this->cerrarModalAnyadir();

        // Disparamos el modal de la oportunidad si es positivo
        if (strtolower($this->resultado) === 'positivo') {
            $this->id_interaccion = $interaccion->id_interaccion; // Se captura el ID recién creado
            $this->modalAnyadirOportunidad = true;
        }
    }

    public function guardarOportunidadManual()
    {
        $oportunidad = new OportunidadVenta();
        $oportunidad->id_interaccion = $this->id_interaccion;
        $oportunidad->importe_estimado = $this->importe_estimado;
        $oportunidad->posibilidad = $this->posibilidad;
        $oportunidad->fecha_cierre_prevista = $this->fecha_cierre_prevista ? \Carbon\Carbon::parse($this->fecha_cierre_prevista)->format('Y-m-d') : null;
        $oportunidad->save();

        $this->cerrarModalConfirmacionAnyadir();
        $this->cerrarModalAnyadirOportunidad();
        $this->borrarValoresCampos();
    }

    public function modificarInteraccion()
    {
        $interaccion = Interaccion::find($this->id_interaccion);

        if ($interaccion) {
            $interaccion->fecha_interaccion = \Carbon\Carbon::parse($this->fecha_interaccion)->format('Y-m-d H:i:s');
            $interaccion->medio_contacto = $this->medio_contacto;
            $interaccion->resumen_contacto = $this->resumen_contacto;
            $interaccion->resultado = $this->resultado;
            $interaccion->id_cliente_vip = $this->id_cliente_vip ?: null;
            $interaccion->id_cliente_no_vip = $this->id_cliente_no_vip ?: null;
            $interaccion->save();
        }

        $this->cerrarModalConfirmacionModificar();
        $this->cerrarModalModificar();
    }

    public function eliminarInteraccion()
    {
        $interaccion = Interaccion::find($this->id_interaccion);
        if ($interaccion) {
            $interaccion->delete();
        }
        $this->cerrarModalEliminar();
    }

    public function render()
    {
        $idComercialActual = Auth::user()->comercial->id_comercial;

        $interacciones = Interaccion::with(['clienteVip', 'clienteNoVip'])
            ->where('id_comercial', $idComercialActual)
            ->where(function ($query) {
                $query->where('fecha_interaccion', 'like', '%' . $this->search . '%')
                    ->orWhere('medio_contacto', 'like', '%' . $this->search . '%')
                    ->orWhere('resumen_contacto', 'like', '%' . $this->search . '%')
                    ->orWhere('resultado', 'like', '%' . $this->search . '%')
                    ->orWhereHas('clienteVip', function ($q) {
                        $q->where('cliente_empresa', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('clienteNoVip', function ($q) {
                        $q->where('cliente_empresa', 'like', '%' . $this->search . '%');
                    });
            })
            ->get();

        $clientes_vip = ClienteVip::where('id_comercial', $idComercialActual)->get();
        $clientes_no_vip = ClienteNoVip::where('id_comercial', $idComercialActual)->get();

        return view('livewire.tabla-interacciones-tablet', compact(
            'interacciones',
            'clientes_vip',
            'clientes_no_vip'
        ));
    }
}
