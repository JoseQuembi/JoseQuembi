<div>
    <h2 class="text-2xl font-bold mb-4">Detalhes do Marco: {{ $milestone->name }}</h2>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Informações do Marco
            </h3>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Nome</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $milestone->name }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Descrição</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $milestone->description ?: 'Não informada' }}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Data de Vencimento</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ Ajuda::dataCurta($milestone->due_date) }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        @switch($milestone->status)
                            @case('pending')
                                Pendente
                                @break
                            @case('in_progress')
                                Em Progresso
                                @break
                            @case('completed')
                                Concluído
                                @break
                            @default
                                {{ $milestone->status }}
                        @endswitch
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Projeto</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $milestone->project->name }}</dd>
                </div>
            </dl>
        </div>
    </div>

    <div class="mt-6">
        <h3 class="text-xl font-bold mb-2">Tarefas Associadas</h3>
        @if($milestone->project->tasks->isNotEmpty())
            <ul class="list-disc list-inside">
                @foreach($milestone->tasks as $task)
                    <li>{{ $task->name }} - Status: {{ $task->status }}</li>
                @endforeach
            </ul>
        @else
            <p>Nenhuma tarefa associada a este marco.</p>
        @endif
    </div>

    <div class="mt-6">
        <a href="{{ route('admin.milestones.edit', $milestone) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
            Editar Marco
        </a>
        <a href="{{ route('admin.milestones.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Voltar para Lista
        </a>
    </div>
</div>
