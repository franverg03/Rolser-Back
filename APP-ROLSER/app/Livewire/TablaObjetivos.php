<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ObjetivoVenta;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TablaObjetivos extends Component
{
    public $search = '';

    // Propiedades del modelo
    public $id_objetivo_venta;
    public $tipo_objetivo;
    public $descripcion_objetivo;
    public $valor_meta;
    public $valor_actual;
    public $fecha_inicio;
    public $fecha_fin;


    public $modalMostrar = false;

    /**
     * Limpia el campo de búsqueda
     */
    public function clearSearch()
    {
        $this->search = '';
    }

    /**
     * Calcula el porcentaje de progreso de un objetivo.
     */
    public function calcularProgreso($actual, $meta)
    {
        if ($meta <= 0) return 0;

        $progreso = ($actual / $meta) * 100;
        return $progreso > 100 ? 100 : round($progreso, 2);
    }

    public function abrirModalMostrar($id_objetivo_venta)
    {
        $objetivo = ObjetivoVenta::find($id_objetivo_venta);

        if ($objetivo) {
            $this->id_objetivo_venta = $objetivo->id_objetivo_venta;
            $this->tipo_objetivo = $objetivo->tipo_objetivo;
            $this->descripcion_objetivo = $objetivo->descripcion_objetivo;
            $this->valor_meta = $objetivo->valor_meta;
            $this->valor_actual = $objetivo->valor_actual;
            $this->fecha_inicio = Carbon::parse($objetivo->fecha_inicio)->format('d-m-Y');
            $this->fecha_fin = Carbon::parse($objetivo->fecha_fin)->format('d-m-Y');

            $this->modalMostrar = true;
        }
    }

    public function cerrarModalMostrar()
    {
        $this->modalMostrar = false;
    }
    public function render()
    {
        $idComercialActual = Auth::user()->comercial->id_comercial;

        $objetivos = ObjetivoVenta::where('id_comercial', $idComercialActual)
            ->where('completado', false)
            ->where(function ($query) {
                $query->where('tipo_objetivo', 'like', '%' . $this->search . '%')
                    ->orWhere('descripcion_objetivo', 'like', '%' . $this->search . '%')
                    ->orWhere('fecha_fin', 'like', '%' . $this->search . '%');
            })
            ->orderBy('fecha_fin', 'asc') // Ordenamos por los que caducan antes
            ->get();

        return view('livewire.tabla-objetivos', compact('objetivos'));
    }
}
