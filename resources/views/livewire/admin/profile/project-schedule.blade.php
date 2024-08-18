<div x-data="{ activeTab: 'timeline', activeGroup: 'project' }" class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-8">{{ $project->name }} - Cronograma</h1>

    <div class="flex flex-col md:flex-row gap-8">
        <!-- Navigation Tabs -->
        <div class="w-full md:w-1/4 space-y-4">
            <!-- Project Management Group -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Gestão do Projeto</h3>
                <div class="space-y-2">
                    <button @click="activeTab = 'timeline'; activeGroup = 'project'" :class="{'bg-blue-500 text-white': activeTab === 'timeline', 'bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-300': activeTab !== 'timeline'}" class="w-full px-4 py-2 rounded-md transition duration-300 ease-in-out text-left">
                        Timeline do Projeto
                    </button>
                    <button @click="activeTab = 'gantt'; activeGroup = 'project'" :class="{'bg-blue-500 text-white': activeTab === 'gantt', 'bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-300': activeTab !== 'gantt'}" class="w-full px-4 py-2 rounded-md transition duration-300 ease-in-out text-left">
                        Gráfico de Gantt
                    </button>
                    <button @click="activeTab = 'kanban'; activeGroup = 'project'" :class="{'bg-blue-500 text-white': activeTab === 'kanban', 'bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-300': activeTab !== 'kanban'}" class="w-full px-4 py-2 rounded-md transition duration-300 ease-in-out text-left">
                        Quadro Kanban
                    </button>
                    <button @click="activeTab = 'progress'; activeGroup = 'project'" :class="{'bg-blue-500 text-white': activeTab === 'progress', 'bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-300': activeTab !== 'progress'}" class="w-full px-4 py-2 rounded-md transition duration-300 ease-in-out text-left">
                        Progresso do Projeto
                    </button>
                </div>
            </div>

            <!-- Team and Resources Group -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Equipe e Recursos</h3>
                <div class="space-y-2">
                    <button @click="activeTab = 'calendar'; activeGroup = 'team'" :class="{'bg-blue-500 text-white': activeTab === 'calendar', 'bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-300': activeTab !== 'calendar'}" class="w-full px-4 py-2 rounded-md transition duration-300 ease-in-out text-left">
                        Calendário da Equipe
                    </button>
                    <button @click="activeTab = 'team'; activeGroup = 'team'" :class="{'bg-blue-500 text-white': activeTab === 'team', 'bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-300': activeTab !== 'team'}" class="w-full px-4 py-2 rounded-md transition duration-300 ease-in-out text-left">
                        Perfis da Equipe
                    </button>
                    <button @click="activeTab = 'resources'; activeGroup = 'team'" :class="{'bg-blue-500 text-white': activeTab === 'resources', 'bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-300': activeTab !== 'resources'}" class="w-full px-4 py-2 rounded-md transition duration-300 ease-in-out text-left">
                        Painel de Recursos
                    </button>
                    <button @click="activeTab = 'other'; activeGroup = 'team'" :class="{'bg-blue-500 text-white': activeTab === 'other', 'bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-300': activeTab !== 'other'}" class="w-full px-4 py-2 rounded-md transition duration-300 ease-in-out text-left">
                        Outros
                    </button>
                </div>
            </div>
        </div>

        <!-- Content Sections -->
        <div class="w-full md:w-3/4 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <!-- Project Management Group -->
            <div x-show="activeGroup === 'project'">
                <!-- Timeline Component -->
                <div x-show="activeTab === 'timeline'" class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Timeline do Projeto</h2>
                    @include('components.project-timeline', ['timelineData' => $timelineData])
                </div>

                <!-- Gantt Chart Component -->
                <div x-show="activeTab === 'gantt'" class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Gráfico de Gantt</h2>
                    @include('components.gantt-chart', ['ganttData' => $ganttData])
                </div>

                <!-- Kanban Board Component -->
                <div x-show="activeTab === 'kanban'" class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Quadro Kanban</h2>
                    @include('components.kanban-board', ['kanbanData' => $kanbanData])
                    @if (session()->has('message'))
                    <div class="mt-4 p-4 bg-green-100 text-green-700 rounded">
                        {{ session('message') }}
                    </div>
                @endif
                </div>

                <!-- Project Progress Dashboard -->
                <div x-show="activeTab === 'progress'" class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Painel de Progresso do Projeto</h2>
                    @include('components.project-progress', ['project' => $project])
                </div>
            </div>

            <!-- Team and Resources Group -->
            <div x-show="activeGroup === 'team'">
                <!-- Team Calendar Component -->
                <div x-show="activeTab === 'calendar'" class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Calendário da Equipe</h2>
                    @include('components.team-calendar', ['tasks' => $tasks, 'milestones' => $milestones])
                </div>

                <!-- Team Member Profiles -->
                <div x-show="activeTab === 'team'" class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Perfis dos Membros da Equipe</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($teamMembers as $member)
                            @include('components.team-member-profile', ['member' => $member])
                        @endforeach
                    </div>
                </div>

                <!-- Resource Dashboard -->
                <div x-show="activeTab === 'resources'" class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Painel de Recursos</h2>
                    @include('components.resource-dashboard', ['resources' => $resources])
                </div>

                <!-- Other Components -->
                <div x-show="activeTab === 'other'">
                    <!-- Version History -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Histórico de Versões</h2>
                        @include('components.version-history', ['project' => $project])
                    </div>

                    <!-- Workflow Diagram -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Fluxo de Trabalho</h2>
                        @include('components.workflow-diagram', ['project' => $project])
                    </div>

                    <!-- Responsibility Matrix -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Matriz de Responsabilidades</h2>
                        @include('components.responsibility-matrix', ['project' => $project, 'teamMembers' => $teamMembers])
                    </div>

                    <!-- Risk Dashboard -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Painel de Riscos</h2>
                        @include('components.risk-dashboard', ['risks' => $risks])
                    </div>

                    <!-- Milestone Timeline -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Timeline de Marcos</h2>
                        @include('components.milestone-timeline', ['milestones' => $milestones])
                    </div>

                    <!-- Issue Log -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Registro de Problemas</h2>
                        @include('components.issue-log', ['issues' => $issues])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
