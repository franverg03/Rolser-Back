<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ClienteVip;
use App\Models\ClienteNoVip;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;


class TablaClientesVip extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10; // Siempre mostrar 10 registros por página

    public function clearSearch()
    {
        $this->search = ''; // Borra la búsqueda
    }
    public function updatingSearch()
    {
        $this->resetPage(); // Resetear la paginación cuando se escribe en el input
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
