<div>
    <h1>{{ $project->name }} - Cronograma</h1>

    <!-- Timeline Component -->
    <div class="mb-8">
        <h2>Timeline do Projeto</h2>
        @include('components.project-timeline', ['timelineData' => $timelineData])
    </div>

    <!-- Gantt Chart Component -->
    <div class="mb-8">
        <h2>Gráfico de Gantt</h2>
        @include('components.gantt-chart', ['ganttData' => $ganttData])
    </div>

    <!-- Kanban Board Component -->
    <div class="mb-8">
        <h2>Quadro Kanban</h2>
        @include('components.kanban-board', ['kanbanData' => $kanbanData])
    </div>

    <!-- Team Calendar Component -->
    <div class="mb-8">
        <h2>Calendário da Equipe</h2>
        @include('components.team-calendar', ['tasks' => $tasks, 'milestones' => $milestones])
    </div>

    <!-- Project Progress Dashboard -->
    <div class="mb-8">
        <h2>Painel de Progresso do Projeto</h2>
        @include('components.project-progress', ['project' => $project])
    </div>

    <!-- Team Member Profiles -->
    <div class="mb-8">
        <h2>Perfis dos Membros da Equipe</h2>
        @foreach($teamMembers as $member)
            @include('components.team-member-profile', ['member' => $member])
        @endforeach
    </div>

    <!-- Version History -->
    <div class="mb-8">
        <h2>Histórico de Versões</h2>
        @include('components.version-history', ['project' => $project])
    </div>

    <!-- Workflow Diagram -->
    <div class="mb-8">
        <h2>Fluxo de Trabalho</h2>
        @include('components.workflow-diagram', ['project' => $project])
    </div>

    <!-- Responsibility Matrix -->
    <div class="mb-8">
        <h2>Matriz de Responsabilidades</h2>
        @include('components.responsibility-matrix', ['project' => $project, 'teamMembers' => $teamMembers])
    </div>

    <!-- Risk Dashboard -->
    <div class="mb-8">
        <h2>Painel de Riscos</h2>
        @include('components.risk-dashboard', ['risks' => $risks])
    </div>

    <!-- Milestone Timeline -->
    <div class="mb-8">
        <h2>Timeline de Marcos</h2>
        @include('components.milestone-timeline', ['milestones' => $milestones])
    </div>

    <!-- Issue Log -->
    <div class="mb-8">
        <h2>Registro de Problemas</h2>
        @include('components.issue-log', ['issues' => $issues])
    </div>

    <!-- Resource Dashboard -->
    <div class="mb-8">
        <h2>Painel de Recursos</h2>
        @include('components.resource-dashboard', ['resources' => $resources])
    </div>
</div>
