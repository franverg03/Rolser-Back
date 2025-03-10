<?php

namespace App\Livewire;

use App\Models\Comercial;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class TablaComerciales extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    public $id_comercial;
    public $comercial_nombre;
    public $comercial_apellidos;
    public $comercial_dni;
    public $comercial_direccion;
    public $comercial_cp;
    public $comercial_telefono;
    public $comercial_email;
    public $comercial_zona;
    public $id_usuario;

    public $modalMostrar=false;
    public $modalAnyadir = false;
    public $modalModificar = false;
    public $modalEliminar = false;
    public $modalConfirmacionAnyadir = false;
    public $modalConfirmacionModificar = false;

    private function borrarValoresCampos()
    {
        $this->id_comercial = '';
        $this->comercial_nombre = '';
        $this->comercial_apellidos = '';
        $this->comercial_dni = '';
        $this->comercial_direccion = '';
        $this->comercial_cp = '';
        $this->comercial_telefono = '';
        $this->comercial_email = '';
        $this->comercial_zona = '';
        $this->id_usuario = '';

    }

    public function abrirModalMostrar($comercial_id){
        $comercial = Comercial::find($comercial_id);

        if ($comercial) {
            $this->id_comercial = $comercial->id_comercial;
            $this->comercial_nombre = $comercial->comercial_nombre;
            $this->comercial_apellidos = $comercial->comercial_apellidos;
            $this->comercial_dni = $comercial->comercial_dni;
            $this->comercial_direccion = $comercial->comercial_direccion;
            $this->comercial_cp = $comercial->comercial_cp;
            $this->comercial_telefono = $comercial->comercial_telefono;
            $this->comercial_email = $comercial->comercial_email;
            $this->comercial_zona = $comercial->comercial_zona;
            $this->id_usuario = $comercial->id_usuario;
        }
        $this->modalMostrar=true;
    }

    public function cerrarModalMostrar(){
        $this->modalMostrar=false;
    }

    public function abrirModalAnyadir()
    {
        $this->borrarValoresCampos();
        $this->modalAnyadir = true;
    }

    public function abrirModalModificar($comercial_id)
    {
        $comercial = Comercial::find($comercial_id);

        if ($comercial) {
            $this->id_comercial = $comercial->id_comercial;
            $this->comercial_nombre = $comercial->comercial_nombre;
            $this->comercial_apellidos = $comercial->comercial_apellidos;
            $this->comercial_dni = $comercial->comercial_dni;
            $this->comercial_direccion = $comercial->comercial_direccion;
            $this->comercial_cp = $comercial->comercial_cp;
            $this->comercial_telefono = $comercial->comercial_telefono;
            $this->comercial_email = $comercial->comercial_email;
            $this->comercial_zona = $comercial->comercial_zona;
            $this->id_usuario = $comercial->id_usuario;
        }

        $this->modalModificar = true;
    }

    public function abrirModalEliminar($comercial_id)
    {
        $this->id_comercial = $comercial_id;
        $this->modalEliminar = true;
    }

    public function cerrarModalAnyadir()
    {
        $this->modalAnyadir = false;
    }

    public function cerrarModalModificar()
    {
        $this->modalModificar = false;
    }

    public function cerrarModalEliminar()
    {
        $this->modalEliminar = false;
    }

    public function abrirModalConfirmacionAnyadir()
    {
        $this->modalConfirmacionAnyadir = true;
    }

    public function abrirModalConfirmacionModificar()
    {
        $this->modalConfirmacionModificar = true;
    }

    public function cerrarModalConfirmacionAnyadir()
    {
        $this->modalConfirmacionAnyadir = false;
    }

    public function cerrarModalConfirmacionModificar()
    {
        $this->modalConfirmacionModificar = false;
    }

    public function anyadirComercial()
    {
        $user = new User();
        $user->usuario_nombre = $this->comercial_nombre;
        $user->password = bcrypt('123456789');
        $user->usuario_activo= 1;
        $user->usuario_rol='comercial';
        $user->id_administrativo=Auth::user()->id_administrativo;
        $user->save();


        $comercial = new Comercial();
        $comercial->comercial_nombre = $this->comercial_nombre;
        $comercial->comercial_apellidos = $this->comercial_apellidos;
        $comercial->comercial_dni = $this->comercial_dni;
        $comercial->comercial_direccion = $this->comercial_direccion;
        $comercial->comercial_cp = $this->comercial_cp;
        $comercial->comercial_telefono = $this->comercial_telefono;
        $comercial->comercial_email = $this->comercial_email;
        $comercial->comercial_zona = $this->comercial_zona;
        $comercial->id_usuario = $user->id_usuario;
        $comercial->save();

        $this->cerrarModalAnyadir();
    }

    public function modificarComercial()
    {
        $comercial = Comercial::find($this->id_comercial);
        if ($comercial) {
            $comercial->comercial_nombre = $this->comercial_nombre;
            $comercial->comercial_apellidos = $this->comercial_apellidos;
            $comercial->comercial_dni = $this->comercial_dni;
            $comercial->comercial_direccion = $this->comercial_direccion;
            $comercial->comercial_cp = $this->comercial_cp;
            $comercial->comercial_telefono = $this->comercial_telefono;
            $comercial->comercial_email = $this->comercial_email;
            $comercial->comercial_zona = $this->comercial_zona;
            $comercial->save();
        }
        $this->cerrarModalModificar();
    }

    public function eliminarComercial()
    {
        $comercial = Comercial::findOrFail($this->id_comercial);
        $comercial->delete();
        $this->cerrarModalEliminar();
    }

    public function clearSearch()
    {
        $this->search = '';
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




