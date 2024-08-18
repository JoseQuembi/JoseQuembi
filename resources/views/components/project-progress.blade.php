<!-- components.project-progress -->
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Progresso do Projeto</h2>
    <div class="mb-4">
        <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
            <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $project->progress }}%"></div>
        </div>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Progresso: {{ $project->progress }}%</p>
    </div>
    <p class="text-sm text-gray-600 dark:text-gray-400">Data de Início: {{ $project->start_date->format('d/m/Y') }}</p>
    <p class="text-sm text-gray-600 dark:text-gray-400">Data de Término Prevista: {{ $project->end_date->format('d/m/Y') }}</p>
</div>
