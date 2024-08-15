<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="max-w-3xl mx-auto text-center">
        <h1 class="text-3xl font-bold text-gray-800 sm:text-4xl dark:text-white">
            Nossos Planos de Preços
        </h1>
        <p class="mt-4 text-gray-600 dark:text-neutral-400">
            Escolha o plano que melhor se adapta às suas necessidades e comece a utilizar nossos serviços.
        </p>
    </div>

    <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($plans as $plan)
            <div class="flex flex-col border rounded-lg shadow-lg overflow-hidden dark:border-neutral-700 bg-white dark:bg-neutral-800 p-6 text-center">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">{{ $plan['name'] }}</h2>
                <div class="my-4 text-5xl font-bold text-blue-600 dark:text-blue-400">
                    ${{ $plan['price'] }}<span class="text-xl font-medium text-gray-500 dark:text-neutral-400">/{{ $plan['duration'] }}</span>
                </div>
                <ul class="mb-6 space-y-3 text-left">
                    @foreach ($plan['features'] as $feature)
                        <li class="flex items-center text-gray-600 dark:text-neutral-400">
                            <svg class="w-6 h-6 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            {{ $feature }}
                        </li>
                    @endforeach
                </ul>
                <a href="#" class="inline-flex items-center justify-center px-4 py-2 font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:bg-blue-600">
                    {{ $plan['cta'] }}
                </a>
            </div>
        @endforeach
    </div>
</div>
