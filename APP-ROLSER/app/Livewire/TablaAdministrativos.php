<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Administrativo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TablaAdministrativos extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search;
    public $id_administrativo;

    public $administrativo_nombre;
    public $administrativo_apellidos;
    public $administrativo_dni;
    public $administrativo_direccion;
    public $administrativo_cp;
    public $administrativo_telefono;
    public $administrativo_email;
    public $administrativo_departamento;

    public $modalMostrar=false;
    public $modalAnyadir = false;
    public $modalModificar = false;
    public $modalEliminar = false;
    public $modalConfirmacionAnyadir = false;
    public $modalConfirmacionModificar = false;

    private function borrarValoresCampos()
    {
        $this->id_administrativo = '';
        $this->administrativo_nombre = '';
        $this->administrativo_apellidos = '';
        $this->administrativo_dni = '';
        $this->administrativo_direccion = '';
        $this->administrativo_cp = '';
        $this->administrativo_telefono = '';
        $this->administrativo_email = '';
        $this->administrativo_departamento = '';
    }

    public function abrirModalAnyadir()
    {
        $this->borrarValoresCampos();
        $this->modalAnyadir = true;
    }

    public function abrirModalModificar($administrativo_id)
    {
        $administrativo = Administrativo::find($administrativo_id);

        if ($administrativo) {
            $this->id_administrativo = $administrativo->id_administrativo;
            $this->administrativo_nombre = $administrativo->administrativo_nombre;
            $this->administrativo_apellidos = $administrativo->administrativo_apellidos;
            $this->administrativo_dni = $administrativo->administrativo_dni;
            $this->administrativo_direccion = $administrativo->administrativo_direccion;
            $this->administrativo_cp = $administrativo->administrativo_cp;
            $this->administrativo_telefono = $administrativo->administrativo_telefono;
            $this->administrativo_email = $administrativo->administrativo_email;
            $this->administrativo_departamento = $administrativo->administrativo_departamento;
        }

        $this->modalModificar = true;
    }

    public function abrirModalMostrar($administrativo_id){

            $administrativo = Administrativo::find($administrativo_id);

            if ($administrativo) {
                $this->id_administrativo = $administrativo->id_administrativo;
                $this->administrativo_nombre = $administrativo->administrativo_nombre;
                $this->administrativo_apellidos = $administrativo->administrativo_apellidos;
                $this->administrativo_dni = $administrativo->administrativo_dni;
                $this->administrativo_direccion = $administrativo->administrativo_direccion;
                $this->administrativo_cp = $administrativo->administrativo_cp;
                $this->administrativo_telefono = $administrativo->administrativo_telefono;
                $this->administrativo_email = $administrativo->administrativo_email;
                $this->administrativo_departamento = $administrativo->administrativo_departamento;
            }
            $this->modalMostrar = true;
    }

    public function abrirModalEliminar($administrativo_id)
    {
        $this->id_administrativo = $administrativo_id;
        $this->modalEliminar = true;
    }

    public function cerrarModalMostrar(){
        $this->modalMostrar=false;
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

    public function anyadirAdministrativo()
    {

        $administrativo = new Administrativo();
        $administrativo->administrativo_nombre = $this->administrativo_nombre;
        $administrativo->administrativo_apellidos = $this->administrativo_apellidos;
        $administrativo->administrativo_dni = $this->administrativo_dni;
        $administrativo->administrativo_direccion = $this->administrativo_direccion;
        $administrativo->administrativo_cp = $this->administrativo_cp;
        $administrativo->administrativo_telefono = $this->administrativo_telefono;
        $administrativo->administrativo_email = $this->administrativo_email;
        $administrativo->administrativo_departamento = $this->administrativo_departamento;
        $administrativo->save();


        $user = new User();
        $user->usuario_nombre = $this->administrativo_dni;
        $user->password = bcrypt('123456789');
        $user->usuario_activo= 1;
        $user->usuario_rol='administrativo';
        $user->id_administrativo=Auth::user()->id_administrativo;
        $user->save();
        $this->cerrarModalAnyadir();
    }

    public function modificarAdministrativo()
    {
        $administrativo = Administrativo::find($this->id_administrativo);
        $administrativo->administrativo_nombre = $this->administrativo_nombre;
        $administrativo->administrativo_apellidos = $this->administrativo_apellidos;
        $administrativo->administrativo_dni = $this->administrativo_dni;
        $administrativo->administrativo_direccion = $this->administrativo_direccion;
        $administrativo->administrativo_cp = $this->administrativo_cp;
        $administrativo->administrativo_telefono = $this->administrativo_telefono;
        $administrativo->administrativo_email = $this->administrativo_email;
        $administrativo->administrativo_departamento = $this->administrativo_departamento;
        $administrativo->save();
        $this->cerrarModalModificar();
    }

    public function eliminarAdministrativo()
    {
        $administrativo = Administrativo::findOrFail($this->id_administrativo);
        $administrativo->delete();
        $this->cerrarModalEliminar();
    }


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
