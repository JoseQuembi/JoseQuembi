<div class="project-progress">
    <div class="progress-bar">
        <div class="progress" style="width: {{ $project->progress }}%"></div>
    </div>
    <p>Progresso do Projeto: {{ $project->progress }}%</p>
    <p>Data de Início: {{ $project->start_date->format('d/m/Y') }}</p>
    <p>Data de Término Prevista: {{ $project->end_date->format('d/m/Y') }}</p>
</div>
