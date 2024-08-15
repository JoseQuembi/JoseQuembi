<div>
    <h2 class="text-2xl font-bold mb-4">Criar Nova Fatura</h2>

    <form wire:submit.prevent="createInvoice">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="project_id" class="block mb-2">Projeto</label>
                <select wire:model="project_id" id="project_id" class="w-full px-3 py-2 border rounded-md">
                    <option value="">Selecione um projeto</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
                @error('project_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="client_id" class="block mb-2">Cliente</label>
                <select wire:model="client_id" id="client_id" class="w-full px-3 py-2 border rounded-md">
                    <option value="">Selecione um cliente</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
                @error('client_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="installment_id" class="block mb-2">Parcela</label>
                <select wire:model="installment_id" id="installment_id" class="w-full px-3 py-2 border rounded-md">
                    <option value="">Selecione uma parcela (opcional)</option>
                    @foreach($installments as $installment)
                        <option value="{{ $installment->id }}">{{ $installment->description }}</option>
                    @endforeach
                </select>
                @error('installment_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="invoice_number" class="block mb-2">Número da Fatura</label>
                <input type="text" wire:model="invoice_number" id="invoice_number" class="w-full px-3 py-2 border rounded-md">
                @error('invoice_number') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="issue_date" class="block mb-2">Data de Emissão</label>
                <input type="date" wire:model="issue_date" id="issue_date" class="w-full px-3 py-2 border rounded-md">
                @error('issue_date') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="due_date" class="block mb-2">Data de Vencimento</label>
                <input type="date" wire:model="due_date" id="due_date" class="w-full px-3 py-2 border rounded-md">
                @error('due_date') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mb-4">
            <h3 class="text-xl font-semibold mb-2">Itens da Fatura</h3>
            @foreach($items as $index => $item)
                <div class="flex items-center space-x-4 mb-2">
                    <input type="text" wire:model="items.{{ $index }}.description" placeholder="Descrição" class="flex-grow px-3 py-2 border rounded-md">
                    <input type="number" wire:model="items.{{ $index }}.quantity" placeholder="Quantidade" class="w-24 px-3 py-2 border rounded-md">
                    <input type="number" wire:model="items.{{ $index }}.unit_price" placeholder="Preço Unitário" class="w-32 px-3 py-2 border rounded-md">
                    <button type="button" wire:click="removeItem({{ $index }})" class="px-3 py-2 bg-red-500 text-white rounded-md">Remover</button>
                </div>
            @endforeach
            <button type="button" wire:click="addItem" class="px-4 py-2 bg-blue-500 text-white rounded-md">Adicionar Item</button>
        </div>

        <div class="mb-4">
            <label for="notes" class="block mb-2">Observações</label>
            <textarea wire:model="notes" id="notes" rows="3" class="w-full px-3 py-2 border rounded-md"></textarea>
            @error('notes') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <p class="text-xl font-bold">Total: R$ {{ number_format($total_amount, 2, ',', '.') }}</p>
        </div>

        <div>
            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md">Criar Fatura</button>
        </div>
    </form>
</div>
