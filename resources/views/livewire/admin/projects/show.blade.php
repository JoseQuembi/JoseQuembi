<div class="p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Projeto: {{ $project->name }}</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h3 class="text-lg font-semibold mb-2">Detalhes do Projeto</h3>
            <p><strong>Descrição:</strong> {{ $project->description }}</p>
            <p><strong>Data de Início:</strong> {{ $project->start_date ? $project->start_date->format('d/m/Y') : 'sem data' }}</p>
            <p><strong>Data de Término:</strong> {{ $project->end_date ? $project->end_date->format('d/m/Y')  : 'Sem data definida'}}</p>
            <p><strong>Status:</strong> {{ ucfirst($project->status) }}</p>
            <p><strong>Responsável:</strong> {{ $project->user->name }}</p>
        </div>

        <div>
            <h3 class="text-lg font-semibold mb-2">Resumo do Orçamento</h3>
            <p><strong>Total Orçado:</strong> R$ {{ number_format($project->budget()->sum('amount'), 2, ',', '.') }}</p>
            <!-- Adicione mais informações sobre o orçamento conforme necessário -->
        </div>
    </div>

    <div class="mt-8">
        <h3 class="text-lg font-semibold mb-2">Tarefas</h3>
        @if($project->tasks->count() > 0)
            <ul class="list-disc pl-5">
                @foreach($project->tasks as $task)
                    <li>
                        {{ $task->name }} -
                        <span class="text-sm text-gray-500">{{ ucfirst($task->status) }}</span>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Nenhuma tarefa cadastrada para este projeto.</p>
        @endif
    </div>

    <div class="mt-8 flex space-x-4">
        <a href="{{ route('admin.projects.edit', $project->slug) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Editar Projeto
        </a>
        <a href="{{ route('admin.projects.budget', $project->slug) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Gerenciar Orçamento
        </a>
        <a href="{{ route('admin.projects.task', $project->slug) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
            Gerenciar Tarefas
        </a>
    </div>
</div>
