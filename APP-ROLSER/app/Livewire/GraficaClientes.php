<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ClienteVip;
use App\Models\ClienteNoVip;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GraficaClientes extends Component
{
    public $labels = [];
    public $dataVip = [];
    public $dataNoVip = [];
    public $añoActual;

    public function mount()
    {
        $this->añoActual = Carbon::now()->year;
        $this->cargarDatos();
    }

    public function cargarDatos()
    {
        $vipsPorMes = ClienteVip::select(
            DB::raw('MONTH(created_at) as mes'),
            DB::raw('count(*) as total')
        )
        ->whereYear('created_at', $this->añoActual)
        ->groupBy('mes')
        ->pluck('total', 'mes')
        ->toArray();

        $noVipsPorMes = ClienteNoVip::select(
            DB::raw('MONTH(created_at) as mes'),
            DB::raw('count(*) as total')
        )
        ->whereYear('created_at', $this->añoActual)
        ->groupBy('mes')
        ->pluck('total', 'mes')
        ->toArray();

        $meses = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];

        for ($i = 1; $i <= 12; $i++) {
            $this->labels[] = $meses[$i - 1];
            $this->dataVip[] = $vipsPorMes[$i] ?? 0;
            $this->dataNoVip[] = $noVipsPorMes[$i] ?? 0;
        }
    }

    public function render()
    {
        return view('livewire.grafica-clientes');
    }
}
