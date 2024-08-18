<!-- components.issue-log -->
<div class="space-y-4">
    @foreach ($issues as $issue)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h4 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $issue->title }}</h4>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">{{ $issue->description }}</p>
            <div class="mt-4 flex items-center space-x-4">
                <span class="px-2 py-1 text-xs font-semibold rounded-full
                    @if($issue->status == 'Resolvido') bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900
                    @elseif($issue->status == 'Em Progresso') bg-yellow-100 text-yellow-800 dark:bg-yellow-200 dark:text-yellow-900
                    @else bg-red-100 text-red-800 dark:bg-red-200 dark:text-red-900
                    @endif">
                    {{ $issue->status }}
                </span>
                <span class="px-2 py-1 text-xs font-semibold rounded-full
                    @if($issue->priority == 'Alta') bg-red-100 text-red-800 dark:bg-red-200 dark:text-red-900
                    @elseif($issue->priority == 'Média') bg-yellow-100 text-yellow-800 dark:bg-yellow-200 dark:text-yellow-900
                    @else bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900
                    @endif">
                    Prioridade: {{ $issue->priority }}
                </span>
            </div>
        </div>
    @endforeach
</div>
