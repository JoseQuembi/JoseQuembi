<!-- resources/views/livewire/user-menu.blade.php -->
<div class="ml-3 relative z-10" x-data="{ open: false }">
    <div>
        <button @click="open = !open" class="max-w-xs bg-white dark:bg-gray-800 flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu" aria-haspopup="true">
            <span class="sr-only">Open user menu</span>
            <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_image }}" alt="{{ auth()->user()->name }}">
        </button>
    </div>
    <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600" role="menuitem">Seu Perfil</a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600" role="menuitem">Configurações</a>
        <button wire:click="logout" class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600" role="menuitem">Sair</button>
    </div>
</div>
