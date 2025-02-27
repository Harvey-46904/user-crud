<?php
namespace App\Livewire;

use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserComponent extends Component
{
    public $userId;
    public $nombre, $apellido, $email, $telefono, $password, $user_id;
    public $isEditing = false;
    public $modalOpen = false;

    protected $rules = [
        'nombre'   => 'required|min:3',
        'apellido' => 'required|min:3',
        'email'    => 'required|email|unique:users,email',
        'telefono' => 'nullable|min:10',
        'password' => 'required|min:6',
    ];
    protected $messages = [
        'email.required' => 'El correo electrónico es obligatorio.',
        'email.email'    => 'Por favor, introduce un correo válido.',
        'email.unique'   => 'Este correo ya está registrado. Intenta con otro.',
    ];

    public function openCreateModal()
    {
        $this->isEditing = false;
        $this->modalOpen = true;
        $this->reset(['nombre', 'apellido', 'email', 'telefono', 'password']);
    }

    public function closeModal()
    {
        $this->modalOpen = false;
    }

    public function store()
    {
        $this->validate([
            'nombre'   => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . ($this->userId ?? 'NULL'),
            'telefono' => 'nullable|string|max:20',
            'password' => $this->isEditing ? 'nullable|min:6' : 'required|min:6',
        ]);

        if ($this->isEditing) {
            // Actualizar usuario
            $user = Users::findOrFail($this->userId);
            $user->update([
                'nombre'   => $this->nombre,
                'apellido' => $this->apellido,
                'email'    => $this->email,
                'telefono' => $this->telefono,
                'password' => $this->password ? bcrypt($this->password) : $user->password,
            ]);

            session()->flash('message', 'Usuario actualizado exitosamente.');
            session()->flash('type', 'warning');

        } else {
            // Crear nuevo usuario
            Users::create([
                'nombre'   => $this->nombre,
                'apellido' => $this->apellido,
                'email'    => $this->email,
                'telefono' => $this->telefono,
                'password' => bcrypt($this->password),
            ]);

            session()->flash('message', 'Usuario registrado exitosamente.');
            session()->flash('type', 'success');
        }

        // Cerrar el modal después de guardar
        $this->closeModal();
    }
    public function openEditModal($userId)
    {
        $this->isEditing = true;
        $this->modalOpen = true;

        // Cargar datos del usuario
        $user = Users::findOrFail($userId);

        $this->userId    = $user->id;
        $this->nombre    = $user->nombre;
        $this->apellido  = $user->apellido;
        $this->email     = $user->email;
        $this->telefono  = $user->telefono;
        $this->isEditing = true;
    }

    

    

    public function delete($id)
    {
        $this->closeModal();
        // Obtén el ID del usuario autenticado
        $authenticatedUserId = auth()->id();

        // Verifica si hay más de un usuario en la base de datos
        if (Users::count() <= 1) {
            session()->flash('message', 'Debe existir al menos un usuario en el sistema. No se puede eliminar.');
            session()->flash('type', 'danger');
            return; // Sale del método si no se puede eliminar
        }

        // Verifica si el usuario que se intenta eliminar es el mismo que el autenticado
        if ($authenticatedUserId == $id) {
            session()->flash('message', 'No puedes eliminar tu propio usuario.');
            session()->flash('type', 'danger');
            return; // Sale del método si intenta eliminarse a sí mismo
        }

        // Si hay más de un usuario y no es el usuario autenticado, se procede a eliminar
        Users::findOrFail($id)->delete();
        session()->flash('message', 'Usuario eliminado exitosamente.');
        session()->flash('type', 'success'); // Cambia el tipo a success para eliminación exitosa
    }
    public function render()
    {
        return view('livewire.user-component', ['users' => Users::all()]);
    }
}
