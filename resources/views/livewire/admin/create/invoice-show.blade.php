<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Fatura #{{ $invoice->invoice_number }}
            </h3>
            <button wire:click="print" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Imprimir Fatura
            </button>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0" id="printable-area">
            <div class="sm:divide-y sm:divide-gray-200">
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <div class="col-span-3 mb-6">
                        <img src="{{ $systemSettings->logo ?? asset('img/logo/logo.webp') }}" alt="{{ $systemSettings->system_name }}" class="h-12">
                        <h2 class="mt-2 text-2xl font-bold text-gray-900">{{ $systemSettings->system_name }}</h2>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $systemSettings->tagline }}</p>
                    </div>
                    <div class="col-span-2">
                        <dt class="text-sm font-medium text-gray-500">Cliente</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $invoice->client->name }}</dd>
                        <dd class="mt-1 text-sm text-gray-900">{{ $invoice->client->email }}</dd>
                        <dd class="mt-1 text-sm text-gray-900">{{ $invoice->client->phone }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Detalhes da Fatura</dt>
                        <dd class="mt-1 text-sm text-gray-900">Data de Emissão: {{ $invoice->issue_date->format('d/m/Y') }}</dd>
                        <dd class="mt-1 text-sm text-gray-900">Data de Vencimento: {{ $invoice->due_date->format('d/m/Y') }}</dd>
                        <dd class="mt-1 text-sm text-gray-900">Status: {{ ucfirst($invoice->status) }}</dd>
                    </div>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500 col-span-3">Itens da Fatura</dt>
                    <dd class="mt-1 text-sm text-gray-900 col-span-3">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descrição</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Quantidade</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Preço Unitário</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($invoice->items as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->description }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right">{{ $item->quantity }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right">{{ Ajuda::Moeda($item->unit_price) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right">{{ Ajuda::Moeda($item->quantity * $item->unit_price) }}</td>
                                </tr>
                                @php
                                    $total += $item->quantity * $item->unit_price;
                                @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right">Total:</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right">{{ Ajuda::Moeda($invoice->total_amount + $total) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Notas</dt>
                    <dd class="mt-1 text-sm text-gray-900 col-span-2">{{ $invoice->notes }}</dd>
                </div>
                <div class="py-4 sm:py-5 sm:px-6">
                    <p class="text-sm text-gray-500">{{ $systemSettings->footer_text }}</p>
                    <div class="mt-4 flex space-x-4">
                        @if($systemSettings->social_facebook)
                            <a href="{{ $systemSettings->social_facebook }}" target="_blank" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Facebook</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        @endif
                        @if($systemSettings->social_twitter)
                            <a href="{{ $systemSettings->social_twitter }}" target="_blank" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Twitter</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                </svg>
                            </a>
                        @endif
                        <!-- Adicione outros ícones de redes sociais conforme necessário -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:initialized', () => {
        @this.on('print-invoice', () => {
            const printContents = document.getElementById('printable-area').innerHTML;
            const originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;

            // Recarrega o Livewire após a impressão
            Livewire.restart();
        });
    });
</script>
