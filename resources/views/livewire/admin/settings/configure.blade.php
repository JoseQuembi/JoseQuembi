<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-8">
            <h1 class="text-2xl font-semibold text-center text-gray-800 mb-8">Configurar Sistema</h1>

            <form wire:submit.prevent="save" class="space-y-6">
                <!-- Campos do formulário -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <!-- Nome do Sistema -->
                    <div>
                        <label for="system_name" class="block text-sm font-medium text-gray-700">Nome do Sistema</label>
                        <input wire:model="system_name" id="system_name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('system_name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- Tagline -->
                    <div>
                        <label for="tagline" class="block text-sm font-medium text-gray-700">Tagline</label>
                        <input wire:model="tagline" id="tagline" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('tagline') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Descrição -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
                    <textarea wire:model="description" id="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    @error('description') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Outros campos (email, telefone, endereço) seguem o mesmo padrão -->

                <!-- Upload de arquivos -->
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Logo</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="logo" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Upload um arquivo</span>
                                        <input id="logo" wire:model="logo" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">ou arraste e solte</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF até 1MB</p>
                            </div>
                        </div>
                        @error('logo') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- Favicon segue o mesmo padrão -->
                </div>

                <!-- Redes Sociais -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">Redes Sociais</h3>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <!-- Facebook, Twitter, LinkedIn, Instagram inputs -->
                    </div>
                </div>

                <!-- Texto do Rodapé -->
                <div>
                    <label for="footer_text" class="block text-sm font-medium text-gray-700">Texto do Rodapé</label>
                    <textarea wire:model="footer_text" id="footer_text" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    @error('footer_text') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Botão de Salvar -->
                <div class="pt-5">
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Salvar Configurações
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (session()->has('message'))
    <div class="fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg">
        {{ session('message') }}
    </div>
@endif
