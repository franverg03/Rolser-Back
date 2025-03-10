<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ClienteVip;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class TablaClientesVip extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10; // Siempre mostrar 10 registros por página
    public $id_cte_vip;
    public $nombre_cte;
    public $apellidos_cte;
    public $telefono_cte;
    public $email_cte;
    public $empresa_cte;
    public $nif_cte;
    public $direccion_cte;
    public $cuenta_bancaria;
    public $id_usuario;
    public $id_comercial;
    public $modalMostrar=false;
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

    public function abrirModalMostrar($id_cliente_vip){

        $cliente = ClienteVip::find($id_cliente_vip);

        if ($cliente) {
            $this->id_cte_vip = $cliente->id_cliente_vip;
            $this->empresa_cte = $cliente->cliente_empresa;
            $this->nif_cte = $cliente->cliente_nif;
            $this->nombre_cte = $cliente->cliente_nombre_representante;
            $this->apellidos_cte = $cliente->cliente_apellidos_representante;
            $this->telefono_cte = $cliente->cliente_telefono_representante;
            $this->email_cte = $cliente->cliente_email_representante;
            $this->direccion_cte = $cliente->cliente_direccion_empresa;
            $this->cuenta_bancaria = $cliente->cliente_cuenta_bancaria;
            $this->id_usuario = $cliente->id_usuario;
            $this->id_comercial = $cliente->id_comercial;
        }


        $this->modalMostrar=true;
}

    public function cerrarModalMostrar(){
        $this->modalMostrar=false;
    }

    private function borrarValoresCampos()
    {
        $this->id_cte_vip = '';
        $this->nombre_cte = '';
        $this->apellidos_cte = '';
        $this->telefono_cte = '';
        $this->email_cte = '';
        $this->nif_cte = '';
        $this->empresa_cte = '';
        $this->direccion_cte = '';
        $this->cuenta_bancaria = '';
        $this->id_usuario = '';
        $this->id_comercial = '';
    }

    public function abrirModalAnyadir()
    {
        $this->borrarValoresCampos();
        $this->modalAnyadir = true;
    }

    public function abrirModalModificar($cliente_id)
    {
        $cliente = ClienteVip::find($cliente_id);

        if ($cliente) {
            $this->id_cte_vip = $cliente->id_cliente_vip;
            $this->empresa_cte = $cliente->cliente_empresa;
            $this->nif_cte = $cliente->cliente_nif;
            $this->nombre_cte = $cliente->cliente_nombre_representante;
            $this->apellidos_cte = $cliente->cliente_apellidos_representante;
            $this->telefono_cte = $cliente->cliente_telefono_representante;
            $this->email_cte = $cliente->cliente_email_representante;
            $this->direccion_cte = $cliente->cliente_direccion_empresa;
            $this->cuenta_bancaria = $cliente->cliente_cuenta_bancaria;
            $this->id_usuario = $cliente->id_usuario;
            $this->id_comercial = $cliente->id_comercial;
        }

        $this->modalModificar = true;
    }


    public function abrirModalEliminar($cliente_id)
    {
        $this->id_cte_vip=$cliente_id;
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


    public function anyadirCliente()
    {
        $user = new User();
        $user->usuario_nombre = $this->nombre_cte;
        $user->password = bcrypt('123456789');
        $user->usuario_activo= 1;
        $user->usuario_rol='clienteVip';
        $user->id_administrativo=Auth::user()->id_administrativo;
        $user->save();


        $cliente = new ClienteVip();
        $cliente->cliente_empresa = $this->empresa_cte;
        $cliente->cliente_nif = $this->nif_cte;
        $cliente->cliente_nombre_representante = $this->nombre_cte;
        $cliente->cliente_apellidos_representante = $this->apellidos_cte;
        $cliente->cliente_telefono_representante = $this->telefono_cte;
        $cliente->cliente_email_representante = $this->email_cte;
        $cliente->cliente_direccion_empresa = $this->direccion_cte;
        $cliente->cliente_cuenta_bancaria = $this->cuenta_bancaria;
        $cliente->id_usuario = $user->id_usuario;
        $cliente->id_comercial =Auth::user()->comercial->id_comercial;
        $cliente->save();
        $this->cerrarModalAnyadir();
    }

    public function modificarCliente()
    {
        $cliente = ClienteVip::find($this->id_cte_vip);
        $cliente->cliente_empresa = $this->empresa_cte;
        $cliente->cliente_nif = $this->nif_cte;
        $cliente->cliente_nombre_representante = $this->nombre_cte;
        $cliente->cliente_apellidos_representante = $this->apellidos_cte;
        $cliente->cliente_telefono_representante = $this->telefono_cte;
        $cliente->cliente_email_representante = $this->email_cte;
        $cliente->cliente_direccion_empresa = $this->direccion_cte;
        $cliente->cliente_cuenta_bancaria = $this->cuenta_bancaria;
        $cliente->save();
        $this->cerrarModalModificar();
    }

    public function eliminarCliente()
    {
        $cliente = ClienteVip::findOrFail($this->id_cte_vip);
        $cliente->delete();
        $this->cerrarModalEliminar();
    }





    public function render()
    {
        // Obtener todos los clientes (sin paginar aún)
        $clientesVip = ClienteVip::where('cliente_nombre_representante', 'like', '%' . $this->search . '%')
            ->orWhere('cliente_apellidos_representante', 'like', '%' . $this->search . '%')
            ->orWhere('cliente_telefono_representante', 'like', '%' . $this->search . '%')
            ->orWhere('cliente_empresa', 'like', '%' . $this->search . '%')
            ->paginate($this->perPage);

        return view('livewire.tabla-clientes-vip', compact('clientesVip'));
    }
}
