<!-- components.version-history -->
<div class="space-y-4">
    @foreach ($project->versions as $version)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Versão {{ $version->number }}</h4>
            <p class="text-sm text-gray-600 dark:text-gray-400">Data: {{ $version->created_at->format('d/m/Y') }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-400">Descrição: {{ $version->description }}</p>
        </div>
    @endforeach
</div>
