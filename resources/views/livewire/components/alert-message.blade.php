<!-- resources/views/livewire/components/alert-message.blade.php -->
<div class="fixed top-4 right-4 z-50 space-y-4 w-full max-w-sm sm:max-w-md md:max-w-sm">
    @foreach ($alerts as $alert)
    <div
        x-data="{ show: false, progress: 100 }"
        x-init="
            $nextTick(() => { show = true });
            let duration = {{ $alert['duration'] ?? 5000 }};
            let interval = setInterval(() => {
                progress -= 100 / (duration / 100);
                if (progress <= 0) {
                    clearInterval(interval);
                    show = false;
                    setTimeout(() => $wire.removeAlert('{{ $alert['id'] }}'), 300);
                }
            }, 100);
        "
        x-show="show"
        x-transition:enter="transform ease-out duration-300 transition"
        x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="w-full bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-neutral-800 dark:border-neutral-700 overflow-hidden relative"
        role="alert"
    >
        <div class="absolute bottom-0 left-0 h-1 bg-blue-500 dark:bg-blue-400 transition-all duration-100 ease-out" :style="{ width: `${progress}%` }"></div>
        <div class="flex items-start p-4">
            <div class="flex-shrink-0">
                @if(isset($alertIcons[$alert['type']]))
                    <x-dynamic-component :component="'heroicon-o-' . $alertIcons[$alert['type']]" class="w-6 h-6 {{ $alertColors[$alert['type']] ?? 'text-gray-400' }}" />
                @endif
            </div>
            <div class="ml-3 flex-1 pt-0.5">
                <p class="text-sm font-medium text-gray-900 dark:text-white">
                    {{ ucfirst($alert['type']) }}
                </p>
                <p class="mt-1 text-sm text-gray-500 dark:text-neutral-400">
                    {{ $alert['message'] }}
                </p>
                @if(isset($alert['actions']) && is_array($alert['actions']))
                <div class="mt-3 flex flex-wrap gap-2">
                    @foreach($alert['actions'] as $action)
                    <button
                        type="button"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:text-blue-300 dark:bg-blue-900 dark:hover:bg-blue-800"
                        wire:click="handleAlertAction('{{ $alert['id'] }}', '{{ $action['name'] }}')"
                    >
                        {{ $action['label'] }}
                    </button>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="ml-4 flex-shrink-0 flex">
                <button
                    type="button"
                    class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:bg-neutral-800 dark:text-neutral-500 dark:hover:text-neutral-400"
                    @click="show = false; setTimeout(() => $wire.removeAlert('{{ $alert['id'] }}'), 300);"
                >
                    <span class="sr-only">Fechar</span>
                    <x-heroicon-o-x-mark class="h-5 w-5" />
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>
