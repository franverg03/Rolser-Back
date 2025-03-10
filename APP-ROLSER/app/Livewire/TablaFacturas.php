<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Factura;

class TablaFacturas extends Component
{
    use WithPagination;

    public $perPage=10;
    public $search;
    public $id_factura;
    public $factura_importe_total;
    public $id_pedido;
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
        $this->factura_importe_total = '';
        $this->id_pedido = '';
        $this->id_cliente_no_vip = '';
        $this->id_cliente_vip = '';
        $this->id_comercial = '';
    }

    public function abrirModalMostrar($factura_id)
    {
        $factura = Factura::find($factura_id);

        if ($factura) {
            $this->id_comercial = $factura->id_comercial;
            $this->factura_importe_total = $factura->factura_importe_total;
            $this->id_pedido = $factura->id_pedido;
            $this->id_cliente_no_vip = $factura->id_cliente_no_vip;
            $this->id_cliente_vip = $factura->id_cliente_vip;
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

    public function abrirModalModificar($factura_id)
    {
        $factura = Factura::find($factura_id);

        if ($factura) {
            $this->id_comercial = $factura->id_comercial;
            $this->factura_importe_total = $factura->factura_importe_total;
            $this->id_pedido = $factura->id_pedido;
            $this->id_cliente_no_vip = $factura->id_cliente_no_vip;
            $this->id_cliente_vip = $factura->id_cliente_vip;
        }

        $this->modalModificar = true;
    }

    public function abrirModalEliminar($factura_id)
    {
        $this->id_comercial = $factura_id;
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

    public function anyadirFactura()
    {

        $factura = new Factura();

        $factura->id_comercial = $this->id_comercial;
        $factura->factura_importe_total = $this->factura_importe_total;
        $factura->id_pedido = $this->id_pedido;
        $factura->id_cliente_no_vip = $this->id_cliente_no_vip;
        $factura->id_cliente_vip = $this->id_cliente_vip;
        $factura->save();

        $this->cerrarModalAnyadir();
    }

    public function modificarFactura()
    {
        $factura = Factura::find(id: $this->id_factura);

        if ($factura) {
            $factura->id_comercial = $this->id_comercial;
            $factura->factura_importr_total = $this->factura_importe_total;
            $factura->id_pedido = $this->id_pedido;
            $factura->id_cliente_no_vip = $this->id_cliente_no_vip;
            $factura->id_cliente_vip = $this->id_cliente_vip;

            $factura->save();
        }
        $this->cerrarModalModificar();
    }

    public function eliminarFactura()
    {
        $comercial = Factura::findOrFail($this->id_factura);
        $comercial->delete();
        $this->cerrarModalEliminar();
    }

    public function clearSearch()
    {
        $this->search = '';
    }

    public function render()
    {
        $facturas = Factura::where('factura_importe_total', 'like', '%' . $this->search . '%')
            ->orWhere('id_pedido', 'like', '%' . $this->search . '%')
            ->orWhere('id_cliente_no_vip', 'like', '%' . $this->search . '%')
            ->orWhere('id_cliente_vip', 'like', '%' . $this->search . '%')
            ->orWhere('id_comercial')
            ->paginate($this->perPage);

        return view('livewire.tabla-facturas', compact('facturas'));
    }
}
