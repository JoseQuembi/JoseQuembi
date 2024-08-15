<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="max-w-3xl mx-auto text-center">
        <h1 class="text-3xl font-bold text-gray-800 sm:text-4xl dark:text-white">
            Visão Geral do Sistema
        </h1>
        <p class="mt-4 text-gray-600 dark:text-neutral-400">
            Um resumo dos principais aspectos e atualizações do nosso sistema.
        </p>
    </div>

    <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Estatísticas -->
        @foreach ($statistics as $key => $value)
            <div class="flex flex-col items-center border rounded-lg shadow-lg p-6 bg-white dark:bg-neutral-800 dark:border-neutral-700">
                <span class="text-4xl font-bold text-blue-600 dark:text-blue-400">{{ $value }}</span>
                <span class="mt-2 text-sm font-medium text-gray-500 dark:text-neutral-400">{{ ucfirst(str_replace('_', ' ', $key)) }}</span>
            </div>
        @endforeach
    </div>

    <div class="mt-12">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Destaques Recentes</h2>
        <div class="mt-6 space-y-6">
            @foreach ($highlights as $highlight)
                <div class="border rounded-lg shadow-md p-6 bg-white dark:bg-neutral-800 dark:border-neutral-700">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">{{ $highlight['title'] }}</h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">{{ $highlight['description'] }}</p>
                    <span class="mt-2 block text-sm text-gray-500 dark:text-neutral-500">Data: {{ date('d M Y', strtotime($highlight['date'])) }}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
