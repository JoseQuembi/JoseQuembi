<!-- components.resource-dashboard -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach ($resources as $resource)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $resource->name }}</h4>
            <p class="text-sm text-gray-600 dark:text-gray-400">Tipo: {{ $resource->type }}</p>
            <div class="mt-4">
                <p class="text-sm text-gray-600 dark:text-gray-400">Quantidade Disponível: {{ $resource->available_quantity }}</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">Quantidade Alocada: {{ $resource->allocated_quantity }}</p>
                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700 mt-2">
                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ ($resource->allocated_quantity / ($resource->available_quantity + $resource->allocated_quantity)) * 100 }}%"></div>
                </div>
            </div>
        </div>
    @endforeach
</div>
