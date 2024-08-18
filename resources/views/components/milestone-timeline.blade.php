<!-- components.milestone-timeline -->
<div class="space-y-4">
    @foreach ($milestones as $milestone)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h4 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $milestone->name }}</h4>
            <p class="text-sm text-gray-600 dark:text-gray-400">Data Prevista: {{ Ajuda::dataCurta($milestone->due_date) }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-400">Status:
                <span class="px-2 py-1 text-xs font-semibold rounded-full
                    @if($milestone->status == 'Concluído') bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900
                    @elseif($milestone->status == 'Em Progresso') bg-yellow-100 text-yellow-800 dark:bg-yellow-200 dark:text-900
                    @else bg-red-100 text-red-800 dark:bg-red-200 dark:text-red-900
                    @endif">
                    {{ $milestone->status }}
                </span>
            </p>
        </div>
    @endforeach
</div>
