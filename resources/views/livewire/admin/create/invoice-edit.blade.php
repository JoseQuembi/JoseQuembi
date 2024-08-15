<div class="max-w-4xl mx-auto py-8">
    <h2 class="text-3xl font-bold mb-8 text-gray-800">Editar Fatura</h2>

    <form wire:submit.prevent="updateInvoice" class="space-y-6">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <label for="project_id" class="block text-sm font-medium text-gray-700">Projeto</label>
                <select id="project_id" wire:model="project_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Selecione um projeto</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
                @error('project_id') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="client_id" class="block text-sm font-medium text-gray-700">Cliente</label>
                <select id="client_id" wire:model="client_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Selecione um cliente</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
                @error('client_id') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="grid grid-cols-3 gap-6">
            <div>
                <label for="invoice_number" class="block text-sm font-medium text-gray-700">Número da Fatura</label>
                <input type="text" id="invoice_number" disabled wire:model="invoice_number" class="px-3 py-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                @error('invoice_number') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="issue_date" class="block text-sm font-medium text-gray-700">Data de Emissão</label>
                <input type="date" id="issue_date" wire:model="issue_date" class="px-3 py-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                @error('issue_date') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="due_date" class="block text-sm font-medium text-gray-700">Data de Vencimento</label>
                <input type="date" id="due_date" wire:model="due_date" class="px-3 py-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                @error('due_date') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <h3 class="text-lg font-medium text-gray-700 mb-2">Itens da Fatura</h3>
            @foreach($items as $index => $item)
                <div class="grid grid-cols-12 gap-4 mb-4">
                    <div class="col-span-6">
                        <input type="text" wire:model="items.{{ $index }}.description" title="Quantidade" placeholder="Descrição" class="px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="col-span-2">
                        <input type="number" wire:model="items.{{ $index }}.quantity" title="Quantidades" placeholder="Quantidade" class="px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="col-span-2">
                        <input type="number" wire:model="items.{{ $index }}.unit_price" title="Preço unitário" placeholder="Preço Unitário" class="px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="col-span-2">
                        <button type="button" wire:click="removeItem({{ $index }})" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Remover
                        </button>
                    </div>
                </div>
            @endforeach
            <button type="button" wire:click="addItem" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Adicionar Item
            </button>
        </div>

        <div>
            <label for="notes" class="block text-sm font-medium text-gray-700">Notas</label>
            <textarea id="notes" wire:model="notes" rows="3" class="px-3 py-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
            @error('notes') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-between items-center">
            <div class="text-2xl font-bold text-gray-700">
                Total: R$ {{ number_format($total_amount, 2, ',', '.') }}
            </div>
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Atualizar Fatura
            </button>
        </div>
    </form>
</div>
