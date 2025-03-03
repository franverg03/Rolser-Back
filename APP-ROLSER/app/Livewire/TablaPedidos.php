<?php

namespace App\Livewire;

use App\Models\Pedido;
use Livewire\Component;
use Livewire\WithPagination;

class TablaPedidos extends Component
{
    use WithPagination;

    public $search = ''; // Input de la tabla
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
        $pedidosPaginados = Pedido::with(['clientesVip', 'clientesNoVip'])
            ->where('id_pedido', 'like', '%' . $this->search . '%')
            ->orWhereHas('clientesVip', function ($query) {
                $query->where('cliente_nombre_representante', 'like', '%' . $this->search . '%')
                    ->orWhere('cliente_apellidos_representante', 'like', '%' . $this->search . '%')
                    ->orWhere('cliente_empresa', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('clientesNoVip', function ($query) {
                $query->where('cliente_nombre_representante', 'like', '%' . $this->search . '%')
                    ->orWhere('cliente_apellidos_representante', 'like', '%' . $this->search . '%')
                    ->orWhere('cliente_empresa', 'like', '%' . $this->search . '%');
            })
            ->paginate($this->perPage);

        return view('livewire.tabla-pedidos', compact('pedidosPaginados'));
    }
}
