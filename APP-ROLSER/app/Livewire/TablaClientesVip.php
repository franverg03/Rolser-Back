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
            ->select('cliente_nombre_representante', 'cliente_apellidos_representante', 'cliente_telefono_representante', 'cliente_empresa', 'cliente_nif')
            ->addSelect(DB::raw("'VIP' as tipo")) // Campo para diferenciar clientes VIP
            ->get();

        $clientesNoVip = ClienteNoVip::where('cliente_nombre_representante', 'like', '%' . $this->search . '%')
            ->orWhere('cliente_apellidos_representante', 'like', '%' . $this->search . '%')
            ->orWhere('cliente_telefono_representante', 'like', '%' . $this->search . '%')
            ->orWhere('cliente_empresa', 'like', '%' . $this->search . '%')
            ->select('cliente_nombre_representante', 'cliente_apellidos_representante', 'cliente_telefono_representante', 'cliente_empresa', 'cliente_nif')
            ->addSelect(DB::raw("'No VIP' as tipo")) // Campo para diferenciar clientes NO VIP
            ->get();

        // Fusionar ambas colecciones en una sola
        $clientes = $clientesVip->merge($clientesNoVip);

        // Asegurar que los datos están correctamente ordenados (Opcional: puedes ordenarlos por nombre, empresa, etc.)
        $clientes = $clientes->sortBy('cliente_nombre_representante');

        // Obtener la página actual
        $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage();
        $perPage = $this->perPage; // Cantidad de clientes por página

        // Aplicar paginación manual
        $clientesPaginados = new LengthAwarePaginator(
            $clientes->forPage($currentPage, $perPage)->values(), // Importante: `.values()` para resetear índices
            $clientes->count(), // Total de clientes
            $perPage, // Cantidad por página
            $currentPage, // Página actual
            ['path' => request()->url()] // Asegurar que los links de paginación funcionan correctamente
        );

        return view('livewire.tabla-clientes', compact('clientesPaginados'));
    }
}
