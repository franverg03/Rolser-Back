<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ClienteVip;

class TablaClientesVipTablet extends Component
{

    public $search = '';


    public function clearSearch()
    {
        $this->search = ''; // Borra la búsqueda
    }
    // public function updatingSearch()
    // {
    //     $this->resetPage(); // Resetear la paginación cuando se escribe en el input
    // }


    public function render()
    {
        // Obtener todos los clientes filtrados sin paginación
        $clientesVipT = ClienteVip::where('cliente_nombre_representante', 'like', '%' . $this->search . '%')
            ->orWhere('cliente_apellidos_representante', 'like', '%' . $this->search . '%')
            ->orWhere('cliente_telefono_representante', 'like', '%' . $this->search . '%')
            ->orWhere('cliente_empresa', 'like', '%' . $this->search . '%')
            ->get(); // Recupera todos los registros sin paginar

        return view('livewire.tabla-clientes-vip-tablet', compact('clientesVipT'));
    }
}
