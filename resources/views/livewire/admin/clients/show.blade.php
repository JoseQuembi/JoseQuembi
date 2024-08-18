<div>
    <h2 class="text-2xl font-bold mb-4">Detalhes do Cliente: {{ $client->name }}</h2>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Informações do Cliente
            </h3>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Nome</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $client->name }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $client->email }}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Telefone</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $client->phone }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Endereço</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $client->address }}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Nome da Empresa</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $client->company_name }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Username</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $client->username }}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Token de Acesso</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $client->token_access }}</dd>
                </div>
            </dl>
        </div>
    </div>

    <div class="mb-6">
        <h3 class="text-xl font-bold mb-2">Projetos Recentes</h3>
        @if($projects->isNotEmpty())
            <ul class="list-disc list-inside">
                @foreach($projects as $project)
                    <li>{{ $project->name }}</li>
                @endforeach
            </ul>
        @else
            <p>Nenhum projeto recente.</p>
        @endif
    </div>

    <div>
        <h3 class="text-xl font-bold mb-2">Faturas Recentes</h3>
        @if($invoices->isNotEmpty())
            <ul class="list-disc list-inside">
                @foreach($invoices as $invoice)
                    <li>Fatura #{{ $invoice->id }} - R$ {{ number_format($invoice->total, 2, ',', '.') }}</li>
                @endforeach
            </ul>
        @else
            <p>Nenhuma fatura recente.</p>
        @endif
    </div>
</div>
