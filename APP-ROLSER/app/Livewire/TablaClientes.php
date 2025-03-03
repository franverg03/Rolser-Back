<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ClienteVip;
use App\Models\ClienteNoVip;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class TablaClientes extends Component
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

    //La funcion addSelect(DB::raw) Lo que va a hacer es añadir una columna más a la select. Con el DB:raw() añadimos la columna Tipo con el valor VIP  o No VIP segun el usuario y así añadimos un dato a la tabla si necesidad de almacenarlo en la BD.

    public function render(){

        // Obtener todos los clientes (sin paginar aún)
        $clientesNoVip = ClienteNoVip::where('cliente_nombre_representante', 'like', '%' . $this->search . '%')
            ->orWhere('cliente_apellidos_representante', 'like', '%' . $this->search . '%')
            ->orWhere('cliente_telefono_representante', 'like', '%' . $this->search . '%')
            ->orWhere('cliente_empresa', 'like', '%' . $this->search . '%')
            ->paginate($this->perPage);

        return view('livewire.tabla-clientes', compact('clientesNoVip'));
    }

}
