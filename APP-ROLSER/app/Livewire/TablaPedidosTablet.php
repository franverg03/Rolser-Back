<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;
class TablaPedidosTablet extends Component
{
    public $search;

    public $id_pedido;
    public $pedido_estado;

    public $fecha_creacion;

    public $codigoPedido;
    public $total_pedido;
    public $id_cliente_no_vip;
    public $id_cliente_vip;
    public $id_comercial;
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
        $this->id_comercial = '';
        $this->fecha_creacion='';
        $this->codigoPedido='';
        $this->pedido_estado='';
        $this->fecha_creacion='';
    }

    public function abrirModalMostrar($pedido_id)
    {
        $pedido = Pedido::find($pedido_id);

        if ($pedido) {
            $this->id_comercial = $pedido->id_comercial;
            $this->total_pedido = $pedido->pedido_total_pedido;
            $this->id_pedido = $pedido->id_pedido;
            $this->id_cliente_no_vip = $pedido->id_cliente_no_vip;
            $this->id_cliente_vip = $pedido->id_cliente_vip;
            $this->codigoPedido=$pedido->codigo_Pedido;
            $this->pedido_estado=$pedido->pedido_estado;
            $this->fecha_creacion=$pedido->fecha_creacion;
        }
        $this->modalMostrar = true;
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

    public function abrirModalModificar($pedido_id)
    {
        $pedido = pedido::find($pedido_id);

        if ($pedido) {
            $this->id_comercial = $pedido->id_comercial;
            $this->total_pedido = $pedido->pedido_importr_total;
            $this->id_pedido = $pedido->id_pedido;
            $this->id_cliente_no_vip = $pedido->id_cliente_no_vip;
            $this->id_cliente_vip = $pedido->id_cliente_vip;
            $this->codigoPedido=$pedido->codigo_Pedido;
            $this->pedido_estado=$pedido->pedido_estado;
            $this->fecha_creacion=$pedido->fecha_creacion;
        }

        $this->modalModificar = true;
    }

    public function abrirModalEliminar($pedido_id)
    {
        $this->id_comercial = $pedido_id;
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

    public function anyadirPedido()
    {

        $pedido = new pedido();

        $pedido->id_comercial = $this->id_comercial;
        $pedido->total_pedido = $this->total_pedido;
        $pedido->id_pedido = $this->id_pedido;
        $pedido->id_cliente_no_vip = $this->id_cliente_no_vip;
        $pedido->id_cliente_vip = $this->id_cliente_vip;
        $pedido->codigo_Pedido=$this->codigoPedido;
        $pedido->pedido_estado=$this->pedido_estado;
        $pedido->fecha_creacion=$this->fecha_creacion;

        $pedido->save();

        $this->cerrarModalAnyadir();
    }

    public function modificaPedido()
    {
        $pedido = Pedido::find(id: $this->id_pedido);

        if ($pedido) {
            $pedido->id_comercial = $this->id_comercial;
            $pedido->pedido_importe_total = $this->total_pedido;
            $pedido->id_pedido = $this->id_pedido;
            $pedido->id_cliente_no_vip = $this->id_cliente_no_vip;
            $pedido->id_cliente_vip = $this->id_cliente_vip;
            $pedido->codigo_Pedido=$this->codigoPedido;
            $pedido->pedido_estado=$this->pedido_estado;
            $pedido->fecha_creacion=$this->fecha_creacion;

            $pedido->save();
        }
        $this->cerrarModalModificar();
    }

    public function eliminarPedido()
    {
        $pedido = pedido::findOrFail($this->id_pedido);
        $pedido->delete();
        $this->cerrarModalEliminar();
    }

    public function clearSearch()
    {
        $this->search = '';
    }

    public function render()
    {
        $pedidosT = Pedido::where('id_comercial', Auth::user()->comercial->id_comercial)
        ->where(function ($query) {
            $query->where('total_pedido', 'like', '%' . $this->search . '%')
            ->orWhere('id_pedido', 'like', '%' . $this->search . '%')
            ->orWhere('id_cliente_no_vip', 'like', '%' . $this->search . '%')
            ->orWhere('id_cliente_vip', 'like', '%' . $this->search . '%')
            ->orWhere('fecha_creacion', 'like', '%' . $this->search . '%')
            ->orWhere('pedido_estado', 'like', '%' . $this->search . '%');
        })
            ->get();

            return view('livewire.tabla-pedidos-tablet');
    }
}

