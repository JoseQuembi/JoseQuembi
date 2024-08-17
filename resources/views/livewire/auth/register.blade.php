<div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-2xl">
    <div class="text-center">
        <x-application-logo class="w-40" />
        <h2 class="text-4xl font-extrabold text-gray-900">Crie sua Conta</h2>
        <p class="text-sm text-gray-600">Junte-se a nós e comece a explorar</p>
    </div>

    <form wire:submit.prevent="register" class="space-y-5">
        @csrf

        <div class="relative">
            <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
            <input wire:model.lazy="name" id="name" type="text" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 placeholder-gray-400" placeholder="Seu nome completo" autocomplete="name">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 0012 21a9 9 0 009-9 9 9 0 00-9-9 9 9 0 00-9 9c0 1.79.526 3.437 1.418 4.804M4 21v-4.806A9.036 9.036 0 005.12 17.8M5 13l1-1m5-5l5 5M10 12v9M14 12v9M17 12l-5-5-2-2m-2 2l2 2M21 12h-4" />
                </svg>
            </div>
        </div>

        <div class="relative">
            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
            <input wire:model="email" id="email" type="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 placeholder-gray-400" placeholder="seu@email.com" autocomplete="email">
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
            <input wire:model="password" placeholder="password" type="password" id="hs-strong-password-with-minLength" class="py-3 px-4 block w-full border border-gray-300 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" autocomplete="new-password">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            <div id="hs-strong-password-minLength" data-hs-strong-password='{
                "target": "#hs-strong-password-with-minLength",
                "stripClasses": "hs-strong-password:opacity-100 hs-strong-password-accepted:bg-teal-500 h-2 flex-auto rounded-full bg-blue-500 opacity-50 mx-1",
                "minLength": "8"
              }' class="flex mt-2 -mx-1"></div>
        </div>

        <div class="relative">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirme a Senha</label>
            <input wire:model="password_confirmation" id="password_confirmation" type="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 placeholder-gray-400" placeholder="••••••••" autocomplete="new-password">
        </div>

        <div class="mt-6">
            <button type="submit" class="w-full py-3 px-4 bg-green-600 text-white font-semibold rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150 ease-in-out">
                <div wire:loading.remove>
                    Cadastrar
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
        <p class="text-sm text-gray-600">Já tem uma conta? <a href="{{ route('login') }}" class="text-green-600 hover:text-green-400 transition duration-150 ease-in-out">Entre aqui</a></p>
    </div>
</div>
