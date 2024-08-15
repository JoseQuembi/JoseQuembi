<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="max-w-3xl mx-auto text-center">
        <h1 class="text-3xl font-bold text-gray-800 sm:text-4xl dark:text-white">
            Plataformas Suportadas
        </h1>
        <p class="mt-4 text-gray-600 dark:text-neutral-400">
            Nosso sistema está disponível em várias plataformas para garantir que você possa acessá-lo onde quer que esteja.
        </p>
    </div>

    <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($platforms as $platform)
            <div class="flex flex-col items-center border rounded-lg shadow-lg overflow-hidden dark:border-neutral-700 bg-white dark:bg-neutral-800 p-6 text-center">
                <img src="{{ $platform['icon'] }}" alt="{{ $platform['name'] }}" class="w-16 h-16 rounded-full mb-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">{{ $platform['name'] }}</h2>
                <p class="mt-3 text-sm text-gray-600 dark:text-neutral-400">{{ $platform['description'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-12 text-center">
        <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:bg-blue-600">
            Ver Todas as Plataformas
        </a>
    </div>
</div>
