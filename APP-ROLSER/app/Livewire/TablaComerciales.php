<?php

namespace App\Livewire;

use App\Models\Comercial;
use Livewire\Component;

use Livewire\WithPagination;

class TablaComerciales extends Component
{
    use WithPagination;

    public $search = '';//Input de la tabla
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
        $comerciales = Comercial::where('comercial_nombre', 'like', '%' . $this->search . '%')
            ->orWhere('comercial_apellidos', 'like', '%' . $this->search . '%')
            ->orWhere('comercial_email', 'like', '%' . $this->search . '%')
            ->orWhere('comercial_zona', 'like', '%' . $this->search . '%')
            ->paginate($this->perPage);

        return view('livewire.tabla-comerciales', compact('comerciales'));
    }
}
