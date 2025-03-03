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

    public function render()
{
    // Obtener clientes VIP sin paginar
    $clientesVip = ClienteVip::where(function ($query) {
            $query->where('cliente_nombre_representante', 'like', '%' . $this->search . '%')
                ->orWhere('cliente_apellidos_representante', 'like', '%' . $this->search . '%')
                ->orWhere('cliente_telefono_representante', 'like', '%' . $this->search . '%')
                ->orWhere('cliente_empresa', 'like', '%' . $this->search . '%');
        })
        ->select('*', DB::raw("'VIP' as tipo")) // Agregar columna "tipo"
        ->get(); // ⚠️ Obtener todos los registros, SIN paginar aún

    // Obtener clientes NO VIP sin paginar
    $clientesNoVip = ClienteNoVip::where(function ($query) {
            $query->where('cliente_nombre_representante', 'like', '%' . $this->search . '%')
                ->orWhere('cliente_apellidos_representante', 'like', '%' . $this->search . '%')
                ->orWhere('cliente_telefono_representante', 'like', '%' . $this->search . '%')
                ->orWhere('cliente_empresa', 'like', '%' . $this->search . '%');
        })
        ->select('*', DB::raw("'No VIP' as tipo")) // Agregar columna "tipo"
        ->get(); // ⚠️ Obtener todos los registros, SIN paginar aún

    // Verificar que ambas consultas están devolviendo datos correctamente
    if ($clientesVip->isEmpty() && $clientesNoVip->isEmpty()) {
        return view('livewire.tabla-clientes', ['clientesPaginados' => []]); // Evita errores si no hay datos
    }

    // Unir ambas colecciones
    $clientes = $clientesVip->merge($clientesNoVip);

    // ✅ Verificar cuántos registros hay en la colección
    logger("Total clientes antes de paginar: " . $clientes->count());

    // ✅ Ordenar por nombre del representante para una mejor organización
    $clientes = $clientes->sortBy('cliente_nombre_representante')->values();

    // ✅ Obtener la página actual
    $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage();
    $perPage = $this->perPage;

    // ✅ Aplicar paginación manualmente
    $clientesPaginados = new \Illuminate\Pagination\LengthAwarePaginator(
        $clientes->forPage($currentPage, $perPage)->values(), // Resetear índices con values()
        $clientes->count(), // Total de clientes
        $perPage,
        $currentPage,
        ['path' => request()->url()] // Mantener los links de paginación
    );

    // ✅ Verificar si la paginación está devolviendo los datos correctos
    logger("Clientes en esta página: " . $clientesPaginados->count());

    return view('livewire.tabla-clientes', compact('clientesPaginados'));
}
}
