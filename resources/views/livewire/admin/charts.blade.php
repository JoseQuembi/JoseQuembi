<div class="p-6 bg-gray-100">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Gráficos e Análises</h1>

    <!-- Gráfico de Projetos -->
    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-700">Criação de Projetos</h2>
            <div>
                <button wire:click="updateProjectTimeframe('week')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 {{ $projectTimeframe === 'week' ? 'bg-gray-200' : '' }}">
                    Semana
                </button>
                <button wire:click="updateProjectTimeframe('month')" class="ml-3 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 {{ $projectTimeframe === 'month' ? 'bg-gray-200' : '' }}">
                    Mês
                </button>
            </div>
        </div>
        @if($projectData->isNotEmpty())
            <div class="h-64" wire:key="project-chart-{{ $projectTimeframe }}">
                <canvas x-data x-init="
                    new Chart($el, {
                        type: 'line',
                        data: {
                            labels: {{ json_encode($projectData->pluck('date')) }},
                            datasets: [{
                                label: 'Projetos Criados',
                                data: {{ json_encode($projectData->pluck('count')) }},
                                borderColor: '#4CAF50',
                                backgroundColor: 'rgba(76, 175, 80, 0.1)',
                                tension: 0.1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    })
                "></canvas>
            </div>
        @else
            <p class="text-center text-gray-500">Nenhum dado de projeto disponível para o período selecionado.</p>
        @endif
    </div>

    <!-- Gráfico de Status das Tarefas -->
    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-700">Status das Tarefas</h2>
            <div>
                <button wire:click="updateTaskTimeframe('week')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 {{ $taskTimeframe === 'week' ? 'bg-gray-200' : '' }}">
                    Semana
                </button>
                <button wire:click="updateTaskTimeframe('month')" class="ml-3 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 {{ $taskTimeframe === 'month' ? 'bg-gray-200' : '' }}">
                    Mês
                </button>
            </div>
        </div>
        @if($taskData->isNotEmpty())
            <div class="h-64" wire:key="task-chart-{{ $taskTimeframe }}">
                <canvas x-data x-init="
                    new Chart($el, {
                        type: 'doughnut',
                        data: {
                            labels: {{ json_encode($taskData->pluck('status')) }},
                            datasets: [{
                                data: {{ json_encode($taskData->pluck('count')) }},
                                backgroundColor: [
                                    '#FF6384',
                                    '#36A2EB',
                                    '#FFCE56',
                                    '#4BC0C0',
                                    '#9966FF'
                                ]
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false
                        }
                    })
                "></canvas>
            </div>
        @else
            <p class="text-center text-gray-500">Nenhum dado de tarefa disponível para o período selecionado.</p>
        @endif
    </div>

    <!-- Gráfico de Atividade dos Usuários -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-700">Atividade dos Usuários (Top 10)</h2>
            <div>
                <button wire:click="updateUserActivityTimeframe('week')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 {{ $userActivityTimeframe === 'week' ? 'bg-gray-200' : '' }}">
                    Semana
                </button>
                <button wire:click="updateUserActivityTimeframe('month')" class="ml-3 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 {{ $userActivityTimeframe === 'month' ? 'bg-gray-200' : '' }}">
                    Mês
                </button>
            </div>
        </div>
        @if($userActivityData->isNotEmpty())
            <div class="h-96" wire:key="user-activity-chart-{{ $userActivityTimeframe }}">
                <canvas x-data x-init="
                    new Chart($el, {
                        type: 'bar',
                        data: {
                            labels: {{ json_encode($userActivityData->pluck('name')) }},
                            datasets: [{
                                label: 'Projetos',
                                data: {{ json_encode($userActivityData->pluck('projects_count')) }},
                                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                borderColor: 'rgb(54, 162, 235)',
                                borderWidth: 1
                            },
                            {
                                label: 'Tarefas',
                                data: {{ json_encode($userActivityData->pluck('tasks_count')) }},
                                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                                borderColor: 'rgb(255, 99, 132)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    })
                "></canvas>
            </div>
        @else
            <p class="text-center text-gray-500">Nenhum dado de atividade de usuário disponível para o período selecionado.</p>
        @endif
    </div>
</div>
