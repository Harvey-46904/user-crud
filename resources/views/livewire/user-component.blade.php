<div>
    @if (session()->has('message'))
    <div class="bg-{{ session('type') == 'success' ? 'green' : (session('type') == 'warning' ? 'yellow' : 'red') }}-500 text-white p-4 rounded-md mb-4">
        {{ session('message') }}
    </div>
@endif
    
    <button wire:click="openCreateModal" class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-lg">
        Registrar Usuario
    </button>
    <div wire:model="modalOpen" class="{{ $modalOpen ? 'fixed' : 'hidden' }} inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-xl w-96">
            <h2 class="text-xl font-bold mb-4"> {{ $isEditing ? 'Actualizar Usuario' : 'Registrar Usuario' }}</h2>
    
            <form wire:submit.prevent="store">
                <div class="mb-4">
                    <label class="block text-gray-700">Nombre</label>
                    <input type="text" wire:model="nombre" class="mt-1 block w-full border-gray-300 rounded-md" required>
                    @error('nombre') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700">Apellido</label>
                    <input type="text" wire:model="apellido" class="mt-1 block w-full border-gray-300 rounded-md" required>
                    @error('apellido') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700">Email</label>
                    <input type="email" wire:model="email" class="mt-1 block w-full border-gray-300 rounded-md" required>
                    @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700">Teléfono</label>
                    <input type="text" wire:model="telefono" class="mt-1 block w-full border-gray-300 rounded-md">
                    @error('telefono') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700">Contraseña</label>
                    <input type="password" wire:model="password" class="mt-1 block w-full border-gray-300 rounded-md" required>
                    @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
    
                <div class="mt-4 flex justify-end">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                        {{ $isEditing ? 'Actualizar Usuario' : 'Registrar Usuario' }}
                    </button>
                    <button type="button" wire:click="closeModal" class="px-4 py-2 bg-red-500 text-white rounded-lg">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
    

   


    <div class="mt-6">
        <h2 class="text-xl font-bold">Usuarios Registrados</h2>
        <table class="min-w-full mt-2 border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Nombre</th>
                    <th class="border border-gray-300 px-4 py-2">Apellido</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Teléfono</th>
                    <th class="border border-gray-300 px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->nombre }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->apellido }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->telefono }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <button wire:click="openEditModal({{ $user->id }})" class="text-yellow-500 flex items-center">
                            <i class="fas fa-edit mr-1"></i> Editar
                        </button>
                        <button wire:click="delete({{ $user->id }})" class="text-red-500 flex items-center">
                            <i class="fas fa-trash mr-1"></i> Eliminar
                        </button>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const editButtons = document.getElementsByClassName("updateModal");

        for (let button of editButtons) {
            button.addEventListener("click", function() {
                document.getElementById("modal").classList.remove("hidden");
            });
        }
    });
</script>

<script>
    document.getElementById("openModal").addEventListener("click", function() {
        document.getElementById("modal").classList.remove("hidden");
    });
   

    document.getElementById("closeModal").addEventListener("click", function() {
        document.getElementById("modal").classList.add("hidden");
    });

    // Cerrar modal si se hace clic fuera del contenido
   /* window.addEventListener("click", function(event) {
        const modal = document.getElementById("modal");
        if (event.target === modal) {
            modal.classList.add("hidden");
        }
    });
*/
    // Escuchar el evento de Livewire para cerrar el modal
    document.addEventListener("modalClosed", function() {
        document.getElementById("modal").classList.add("hidden");
    });
</script>