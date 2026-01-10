<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Factura;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\FacturaMail;

class TablaFacturasTablet extends Component
{


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
    public $id_factura_seleccionada;
    public $modalEnviarCorreo = false;
    public $email_destino;

    public function mostrarFactura($id)
{
    // Buscamos la factura con todas sus relaciones para evitar errores en el PDF
    $factura = Factura::with(['lineasDeFactura', 'clienteVip', 'clienteNoVip'])->findOrFail($id);

    // Cargamos la vista de la plantilla que creamos antes
    $pdf = Pdf::loadView('pdf.factura_template', compact('factura'));

    // Devolvemos el stream.
    // Al ser llamado desde un iframe, el navegador lo renderizará automáticamente.
    return response()->stream(
        function () use ($pdf) {
            echo $pdf->stream();
        },
        200,
        [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="factura.pdf"',
        ]
    );
}

    public function descargarPDF($id)
{
    $factura = Factura::findOrFail($id);
    $pdf = Pdf::loadView('pdf.factura_template', compact('factura'));
    return response()->streamDownload(function () use ($pdf) {
        echo $pdf->stream();
    }, "factura_{$id}.pdf");
}

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
        $factura = Factura::findOrFail($factura_id);

        $this->id_factura_seleccionada = $factura_id; // Guardamos el ID
        $this->id_pedido = $factura->id_pedido;
        $this->factura_importe_total = $factura->factura_importe_total;
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

    public function abrirModalEnviarCorreo($id_factura)
    {
        $this->id_factura_seleccionada = $id_factura;
        $this->email_destino = ''; // Reset email
        $this->modalEnviarCorreo = true;
    }

    public function cerrarModalEnviarCorreo()
    {
        $this->modalEnviarCorreo = false;
    }

    public function enviarCorreo()
    {
        $this->validate([
            'email_destino' => 'required|email',
        ]);

        $factura = Factura::findOrFail($this->id_factura_seleccionada);
        $pdf = Pdf::loadView('pdf.factura_template', compact('factura'));

        try {
            Mail::to($this->email_destino)->send(new FacturaMail($factura, $pdf->output()));
            $this->cerrarModalEnviarCorreo();
            // Optionally flash a success message
            // session()->flash('message', 'Correo enviado correctamente.');
        } catch (\Exception $e) {
            // Handle error
            // session()->flash('error', 'Error al enviar el correo: ' . $e->getMessage());
        }
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
        $facturasT = Factura::where('id_comercial', Auth::user()->comercial->id_comercial)
        ->where(function ($query) {
            $query->where('factura_importe_total', 'like', '%' . $this->search . '%')
            ->orWhere('id_pedido', 'like', '%' . $this->search . '%')
            ->orWhere('id_cliente_no_vip', 'like', '%' . $this->search . '%')
            ->orWhere('id_cliente_vip', 'like', '%' . $this->search . '%')
            ->orWhere('id_comercial');
        })
            ->get();

        return view('livewire.tabla-facturas-tablet', compact('facturasT'));
    }
}
