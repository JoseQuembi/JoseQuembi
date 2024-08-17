<div>
    <h2 class="text-2xl font-bold mb-4">Criar Nova Fatura</h2>

    <form wire:submit.prevent="createInvoice">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="project_id" class="block mb-2">Projeto</label>
                <select wire:model="project_id" id="project_id" data-hs-select='{
                    "hasSearch": true,
                    "searchPlaceholder": "Pesquisar...",
                    "searchClasses": "block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                    "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                    "placeholder": "Selecione um projeto...",
                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                    "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                    "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
                    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                  }' class="hidden">
                    <option value="">Selecione um projeto</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
                @error('project_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="client_id" class="block mb-2">Cliente</label>
                <select wire:model="client_id" id="client_id" data-hs-select='{
                    "hasSearch": true,
                    "searchPlaceholder": "Pesquisar...",
                    "searchClasses": "block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                    "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                    "placeholder": "Selecione um cliente...",
                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                    "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                    "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
                    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                  }' class="hidden">
                    <option value="">Selecione um cliente</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
                @error('client_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="installment_id" class="block mb-2">Parcela</label>
                <select wire:model="installment_id" id="installment_id" data-hs-select='{
                    "hasSearch": true,
                    "searchPlaceholder": "Pesquisar...",
                    "searchClasses": "block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                    "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                    "placeholder": "Selecione uma parcela...",
                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                    "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                    "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
                    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                  }' class="hidden">
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
