<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;
use App\Models\Comercial; // Asegúrate de que esté importado

class TablaPedidosTablet extends Component
{
    public $search;

    // Propiedades del Pedido
    public $id_pedido;
    public $pedido_estado;
    public $fecha_creacion;
    public $codigoPedido;
    public $total_pedido;
    public $id_cliente_no_vip;
    public $id_cliente_vip;
    public $id_comercial;

    // Propiedades para la vista
    public $nombre_cte;
    public $apellidos_cte;
    public $nombre_comercial;

    public $modalMostrar = false;
    public $modalAnyadir = false;
    public $modalModificar = false;
    public $modalEliminar = false;
    public $modalConfirmacionAnyadir = false;
    public $modalConfirmacionModificar = false;

    private function borrarValoresCampos()
    {
        $this->id_comercial = '';
        $this->total_pedido = '';
        $this->id_pedido = '';
        $this->id_cliente_no_vip = '';
        $this->id_cliente_vip = '';
        $this->codigoPedido = '';
        $this->pedido_estado = '';
        $this->fecha_creacion = '';
        $this->nombre_cte = '';
        $this->apellidos_cte = '';
        $this->nombre_comercial = '';
    }

    public function abrirModalMostrar($pedido_id)
    {
        $pedido = Pedido::with(['clienteVip', 'clienteNoVip', 'comercial'])->find($pedido_id);

        if ($pedido) {
            $this->id_pedido         = $pedido->id_pedido;
            $this->pedido_estado     = $pedido->pedido_estado;
            $this->id_cliente_vip    = $pedido->id_cliente_vip;
            $this->id_cliente_no_vip = $pedido->id_cliente_no_vip;
            $this->codigoPedido      = $pedido->codigo_Pedido;
            $this->total_pedido      = $pedido->total_Pedido;
            $this->fecha_creacion    = \Carbon\Carbon::parse($pedido->fecha_creacion)->format('d/m/Y');

            if ($pedido->id_cliente_vip) {
                $this->nombre_cte    = $pedido->clienteVip?->cliente_empresa ?? 'Cliente VIP sin Empresa';
                $this->apellidos_cte = '---';
            } elseif ($pedido->id_cliente_no_vip) {
                $this->nombre_cte    = $pedido->clienteNoVip?->cliente_empresa ?? 'Cliente No VIP sin Empresa';
                $this->apellidos_cte = '---';
            } else {
                $this->nombre_cte    = 'Sin cliente asignado';
                $this->apellidos_cte = '---';
            }

            if ($pedido->comercial) {
                $this->id_comercial     = $pedido->id_comercial;
                $this->nombre_comercial = $pedido->comercial->comercial_nombre . ' ' . $pedido->comercial->comercial_apellidos;
            } else {
                $comercialLogueado      = Auth::user()->comercial;
                $this->id_comercial     = $comercialLogueado->id_comercial;
                $this->nombre_comercial = $comercialLogueado->comercial_nombre . ' ' . $comercialLogueado->comercial_apellidos;
            }

            $this->modalMostrar = true;
        }
    }

    public function abrirModalModificar($pedido_id)
    {
        $pedido = Pedido::find($pedido_id);

        if ($pedido) {
            $this->id_pedido         = $pedido->id_pedido;
            $this->pedido_estado     = $pedido->pedido_estado;
            $this->id_comercial      = $pedido->id_comercial ?? Auth::user()->comercial->id_comercial;
            $this->id_cliente_vip    = $pedido->id_cliente_vip;
            $this->id_cliente_no_vip = $pedido->id_cliente_no_vip;
            $this->codigoPedido      = $pedido->codigo_Pedido;
            $this->total_pedido      = $pedido->total_Pedido;
            $this->fecha_creacion    = \Carbon\Carbon::parse($pedido->fecha_creacion)->format('Y-m-d');

            $this->modalModificar = true;
        }
    }

    public function anyadirPedido()
    {
        $pedido = new Pedido();
        $pedido->id_comercial      = Auth::user()->comercial->id_comercial;
        $pedido->total_Pedido      = $this->total_pedido;
        $pedido->id_cliente_no_vip = $this->id_cliente_no_vip ?: null;
        $pedido->id_cliente_vip    = $this->id_cliente_vip ?: null;
        $pedido->codigo_Pedido     = $this->codigoPedido;
        $pedido->pedido_estado     = $this->pedido_estado;
        $pedido->fecha_creacion    = $this->fecha_creacion;
        $pedido->save();

        $this->cerrarModalAnyadir();
    }

    public function modificaPedido()
    {
        $pedido = Pedido::find($this->id_pedido);

        if ($pedido) {
            $pedido->total_Pedido      = $this->total_pedido;
            $pedido->id_cliente_no_vip = $this->id_cliente_no_vip ?: null;
            $pedido->id_cliente_vip    = $this->id_cliente_vip ?: null;
            $pedido->codigo_Pedido     = $this->codigoPedido;
            $pedido->pedido_estado     = $this->pedido_estado;
            $pedido->fecha_creacion    = $this->fecha_creacion;
            $pedido->save();
        }

        $this->cerrarModalModificar();
        $this->cerrarModalConfirmacionModificar();
    }

    public function eliminarPedido()
    {
        $pedido = Pedido::findOrFail($this->id_pedido);
        $pedido->pedido_estado = 'Cancelado';
        $pedido->save();

        $this->cerrarModalEliminar();
    }

    public function render()
    {
        $idComercialActual = Auth::user()->comercial->id_comercial;

        $pedidosT = Pedido::where('id_comercial', $idComercialActual)
            ->where(function ($query) {
                $query->where('total_Pedido', 'like', '%' . $this->search . '%')
                    ->orWhere('id_pedido', 'like', '%' . $this->search . '%')
                    ->orWhere('codigo_Pedido', 'like', '%' . $this->search . '%')
                    ->orWhere('fecha_creacion', 'like', '%' . $this->search . '%')
                    ->orWhere('pedido_estado', 'like', '%' . $this->search . '%');
            })
            ->get();

        return view('livewire.tabla-pedidos-tablet', compact('pedidosT'));
    }

    public function cerrarModalMostrar()
    {
        $this->modalMostrar = false;
    }
    public function abrirModalAnyadir()
    {
        $this->borrarValoresCampos();
        $this->modalAnyadir = true;
    }
    public function cerrarModalAnyadir()
    {
        $this->modalAnyadir = false;
    }
    public function cerrarModalModificar()
    {
        $this->modalModificar = false;
    }
    public function abrirModalEliminar($id_pedido)
    {
        $this->id_pedido = $id_pedido;
        $this->modalEliminar = true;
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
    public function clearSearch()
    {
        $this->search = '';
    }
}
