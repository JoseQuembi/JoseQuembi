<div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-2xl">
    <div class="text-center">
        <x-logo />
        <h2 class="text-4xl font-extrabold text-gray-900">Bem-vindo de volta!</h2>
        <p class="text-sm text-gray-600">Entre para acessar sua conta</p>
    </div>

    <form wire:submit.prevent="login" class="space-y-6">
        @csrf

        <div class="relative">
            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
            <input wire:model.lazy="email" id="email" type="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400" placeholder="voce@exemplo.com" autocomplete="email">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7m0 0l3-3m-3 3l-3-3" />
                </svg>
            </div>
        </div>

        <div class="relative">
            <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
            <input wire:model.lazy="password" id="password" type="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400" placeholder="••••••••" autocomplete="current-password">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v6m0 0l3-3m-3 3l-3-3m6-4a4 4 0 00-8 0v2a4 4 0 008 0v-2z" />
                </svg>
            </div>
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input wire:model.lazy="remember" id="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-900">Lembrar de mim</label>
            </div>

            <a href="#" class="text-sm text-indigo-600 hover:text-indigo-400 transition duration-150 ease-in-out">Esqueceu sua senha?</a>
        </div>

        <div>
            <button type="submit" class="w-full py-3 px-4 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                <div wire:loading.remove>
                    Entrar
                </div>
                <div wire:loading>
                    <svg class="animate-spin h-5 w-5 mx-auto" viewBox="0 0 24 24">
                        <!-- Spinner -->
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.477 0 0 5.477 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 2.579 1.012 4.918 2.709 6.709l1.291-1.418z"></path>
                    </svg>
                </div>
            </button>
        </div>
    </form>

    <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">Não tem uma conta? <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-400 transition duration-150 ease-in-out">Cadastre-se</a></p>
    </div>
</div>
