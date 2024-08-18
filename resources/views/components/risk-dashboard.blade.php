<!-- components.risk-dashboard -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach ($risks as $risk)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $risk->name }}</h4>
            <p class="text-sm text-gray-600 dark:text-gray-400">Probabilidade:
                <span class="font-medium
                    @if($risk->probability < 0.3) text-green-600 dark:text-green-400
                    @elseif($risk->probability < 0.7) text-yellow-600 dark:text-yellow-400
                    @else text-red-600 dark:text-red-400
                    @endif">
                    {{ number_format($risk->probability * 100, 0) }}%
                </span>
            </p>
            <p class="text-sm text-gray-600 dark:text-gray-400">Impacto:
                <span class="font-medium
                    @if($risk->impact < 0.3) text-green-600 dark:text-green-400
                    @elseif($risk->impact < 0.7) text-yellow-600 dark:text-yellow-400
                    @else text-red-600 dark:text-red-400
                    @endif">
                    {{ number_format($risk->impact * 100, 0) }}%
                </span>
            </p>
            <p class="text-sm text-gray-600 dark:text-gray-400">Status: {{ $risk->status }}</p>
        </div>
    @endforeach
</div>
