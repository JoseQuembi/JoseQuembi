<div class="p-6 bg-gray-50 dark:bg-gray-900">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Dashboard</h1>

    <!-- Estatísticas Rápidas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Usuários</h2>
            <p class="text-3xl font-bold text-blue-600">{{ $totalUsers }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Projetos</h2>
            <p class="text-3xl font-bold text-green-600">{{ $totalProjects }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Tarefas</h2>
            <p class="text-3xl font-bold text-yellow-600">{{ $totalTasks }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Orçamento Total</h2>
            <p class="text-3xl font-bold text-purple-600">R$ {{ number_format($totalBudget, 2, ',', '.') }}</p>
        </div>
    </div>

    <!-- Gráfico -->
    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-700">Atividade Recente</h2>
            <div>
                <button wire:click="updateTimeframe('week')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 {{ $timeframe === 'week' ? 'bg-gray-200' : '' }}">
                    Semana
                </button>
                <button wire:click="updateTimeframe('month')" class="ml-3 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 {{ $timeframe === 'month' ? 'bg-gray-200' : '' }}">
                    Mês
                </button>
            </div>
        </div>
        <div class="h-64">
            <canvas id="activityChart" x-data x-init="
                new Chart($el, {
                    type: 'line',
                    data: @entangle('chartData'),
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            "></canvas>
        </div>
    </div>

    <!-- Projetos Recentes e Tarefas Próximas -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Projetos Recentes</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($recentProjects as $project)
                    <li class="py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                    <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    {{ $project->name }}
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    {{ $project->user->name }}
                                </p>
                            </div>
                            <div>
                                <a href="{{ route('admin.projects.show', $project->slug) }}" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                    Ver
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Tarefas Próximas</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($upcomingTasks as $task)
                    <li class="py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    {{ $task->name }}
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    {{ $task->project->name }}
                                </p>
                            </div>
                            <div class="ml-4 flex-shrink-0">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ optional($task->due_date)->format('d/m/Y') ?? 'Sem data definida' }}
                                </span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
