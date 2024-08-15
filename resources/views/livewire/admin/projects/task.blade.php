<div class="p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Tarefas do Projeto: {{ $project->name }}</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <form wire:submit.prevent="addTask" class="mb-6">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <input wire:model="name" type="text" placeholder="Nome da Tarefa" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300">
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <input wire:model="due_date" type="date" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300">
                @error('due_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mt-4">
            <textarea wire:model="description" placeholder="Descrição da Tarefa" rows="3" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"></textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <select wire:model="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300">
                <option value="pending">Pendente</option>
                <option value="in_progress">Em Progresso</option>
                <option value="completed">Concluída</option>
            </select>
            @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Adicionar Tarefa</button>
        </div>
    </form>

    <div class="space-y-4">
        @foreach($tasks as $task)
            <div class="border p-4 rounded-lg">
                <h3 class="text-lg font-semibold">{{ $task->name }}</h3>
                <p class="text-gray-600">{{ $task->description }}</p>
                <div class="mt-2 flex justify-between items-center">
                    <span class="text-sm text-gray-500">Vencimento: {{ $task->due_date ? $task->due_date->format('d/m/Y') : "Sem data definida"}}</span>
                    <div>
                        <select wire:change="updateTaskStatus({{ $task->id }}, $event.target.value)" class="text-sm border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300">
                            <option value="pending" {{ $task->status === 'pending' ? 'selected' : '' }}>Pendente</option>
                            <option value="in_progress" {{ $task->status === 'in_progress' ? 'selected' : '' }}>Em Progresso</option>
                            <option value="completed" {{ $task->status === 'completed' ? 'selected' : '' }}>Concluída</option>
                        </select>
                        <button wire:click="deleteTask({{ $task->id }})" class="ml-2 text-red-500 hover:text-red-700">
                            Remover
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
