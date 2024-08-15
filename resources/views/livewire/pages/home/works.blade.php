<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="max-w-3xl mx-auto text-center">
        <h1 class="text-3xl font-bold text-gray-800 sm:text-4xl dark:text-white">
            Trabalhos Recentes
        </h1>
        <p class="mt-4 text-gray-600 dark:text-neutral-400">
            Aqui estão alguns dos nossos projetos e trabalhos mais recentes.
        </p>
    </div>

    <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($works as $work)
            <div class="flex flex-col border rounded-lg shadow-lg overflow-hidden dark:border-neutral-700">
                <div class="flex-1 p-6 bg-white dark:bg-neutral-800">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">{{ $work['title'] }}</h2>
                    <p class="mt-3 text-sm text-gray-600 dark:text-neutral-400">{{ $work['description'] }}</p>
                </div>
                <div class="p-4 bg-gray-50 dark:bg-neutral-900">
                    <div class="flex items-center justify-between text-sm text-gray-500 dark:text-neutral-400">
                        <span>Status: {{ $work['status'] }}</span>
                        <span>{{ date('d M Y', strtotime($work['date'])) }}</span>
                    </div>
                </div>
                <div class="p-4">
                    <a href="#" class="text-blue-600 hover:underline dark:text-blue-400">Saiba Mais</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-12 text-center">
        <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:bg-blue-600">
            Ver Todos os Trabalhos
        </a>
    </div>
</div>
