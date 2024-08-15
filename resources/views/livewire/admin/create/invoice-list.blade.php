<div>
    <h2 class="text-2xl font-semibold mb-4">Lista de Faturas</h2>

    @if (session()->has('message'))
        <div class="text-green-500 mb-4">
            {{ session('message') }}
        </div>
    @endif

    <table class="w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">Número da Fatura</th>
                <th class="px-4 py-2">Projeto</th>
                <th class="px-4 py-2">Cliente</th>
                <th class="px-4 py-2">Data de Emissão</th>
                <th class="px-4 py-2">Total</th>
                <th class="px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td class="border px-2 py-2"><a href="{{ route('admin.invoices.show',$invoice->slug) }}">{{ $invoice->invoice_number }}</a></td>
                    <td class="border px-3 py-2"><a href="{{ route('admin.projects.show', $invoice->project->slug) }}">{{ Ajuda::limitarString($invoice->project->name, 15) }}</a></td>
                    <td class="border px-3 py-2">{{ $invoice->client->name }}</td>
                    <td class="border px-3 py-2 text-center">{{ Ajuda::dataCurta($invoice->issue_date) }}</td>
                    <td class="border px-3 py-2">{{ Ajuda::Moeda($invoice->total_amount) }}</td>
                    <td class="border px-3 py-2">
                        <div class="hs-dropdown relative inline-flex">
                            <button id="hs-dropdown-transform-style" type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                              Opção
                              <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                            </button>

                            <div class="hs-dropdown-menu w-72 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden z-10" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-transform-style">
                              <div class="hs-dropdown-open:ease-in hs-dropdown-open:opacity-100 hs-dropdown-open:scale-100 transition ease-out opacity-0 scale-95 duration-200 mt-2 origin-top-left min-w-60 bg-white shadow-md rounded-lg p-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700" data-hs-transition>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="{{ route('admin.invoices.edit', $invoice->slug) }}">
                                  Editar Factura
                                </a>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="{{ route('admin.invoices.show',$invoice->slug) }}">
                                  Detalhe da Factura
                                </a>
                              </div>
                            </div>
                          </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
