<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <h1 class="text-2xl font-semibold text-gray-900">Editar Recurso: {{ $resource->name }}</h1>

        <form wire:submit.prevent="update" class="mt-6 space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                <input wire:model="name" type="text" id="name" class="px-3 py-2 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="type" class="block text-sm font-medium text-gray-700">Tipo</label>
                <select wire:model="type" id="type" class="px-3 py-2 mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                    <option value="">Selecione um tipo</option>
                    <option value="humano">Humano</option>
                    <option value="material">Material</option>
                    <option value="financeiro">Financeiro</option>
                </select>
                @error('type') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantidade</label>
                <input wire:model="quantity" type="number" id="quantity" step="0.01" class="px-3 py-2 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('quantity') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="unit_cost" class="block text-sm font-medium text-gray-700">Custo Unitário</label>
                <input wire:model="unit_cost" type="number" id="unit_cost" step="0.01" class="px-3 py-2 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('unit_cost') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('admin.resources.show', $resource->slug) }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cancelar
                </a>
                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Atualizar Recurso
                </button>
            </div>
        </form>
    </div>
</div>
