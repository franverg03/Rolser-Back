<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Administrativo;

class TablaAdministrativos extends Component
{
    use WithPagination;

    public $search = ''; //Input de la tabla
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
        $administrativos = Administrativo::where('administrativo_nombre', 'like', '%' . $this->search . '%')
            ->orWhere('administrativo_apellidos', 'like', '%' . $this->search . '%')
            ->orWhere('administrativo_email', 'like', '%' . $this->search . '%')
            ->orWhere('administrativo_departamento', 'like', '%' . $this->search . '%')
            ->paginate($this->perPage);

        return view('livewire.tabla-administrativos', compact('administrativos'));
    }
}
