<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class GraficaPedidos extends Component
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
        $pedidosVipPorMes = Pedido::select(
            DB::raw('MONTH(created_at) as mes'),
            DB::raw('count(*) as total')
        )
            ->whereYear('created_at', $this->añoActual)
            ->whereNotNull('id_cliente_vip')
            ->where('id_comercial', Auth::user()->comercial->id_comercial)
            ->groupBy('mes')
            ->pluck('total', 'mes')
            ->toArray();

        $pedidosNoVipPorMes = Pedido::select(
            DB::raw('MONTH(created_at) as mes'),
            DB::raw('count(*) as total')
        )
            ->whereYear('created_at', $this->añoActual)
            ->whereNotNull('id_cliente_no_vip')
            ->where('id_comercial', Auth::user()->comercial->id_comercial)
            ->groupBy('mes')
            ->pluck('total', 'mes')
            ->toArray();

        // Array estático de meses
        $meses = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];

        // 3. Rellenamos los arrays para la gráfica
        for ($i = 1; $i <= 12; $i++) {
            $this->labels[] = $meses[$i - 1];
            $this->dataVip[] = $pedidosVipPorMes[$i] ?? 0;
            $this->dataNoVip[] = $pedidosNoVipPorMes[$i] ?? 0;
        }
    }

    public function render()
    {
        return view('livewire.grafica-pedidos');
    }
}
