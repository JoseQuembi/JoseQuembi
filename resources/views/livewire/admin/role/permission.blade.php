<div>

    <h2 class="text-2xl font-bold mb-4">Gerenciar Permissões</h2>
    <form wire:submit.prevent="{{ $editingPermissionId ? 'updatePermission' : 'createPermission' }}" class="mb-6">
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nome</label>
            <input type="text" id="name" wire:model="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descrição</label>
            <textarea id="description" wire:model="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            {{ $editingPermissionId ? 'Atualizar' : 'Criar' }} Permissão
        </button>
    </form>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Nome</th>
                <th class="py-2 px-4 border-b">Descrição</th>
                <th class="py-2 px-4 border-b">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $permission->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $permission->description }}</td>
                    <td class="py-2 px-4 border-b">
                        <button wire:click="editPermission({{ $permission->id }})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Editar</button>
                        <button wire:click="deletePermission({{ $permission->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Excluir</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $permissions->links() }}
</div>
