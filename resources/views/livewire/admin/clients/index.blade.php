<div>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <h1 class="text-2xl font-semibold text-gray-900">Lista de Clientes</h1>

            <div class="mt-4">
                <div class="flex justify-between items-center mb-4">
                    <div class="flex-1 pr-4">
                        <div class="relative md:w-1/3">
                            <input type="search" wire:model.debounce.300ms="search" class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Buscar clientes...">
                            <div class="absolute top-0 left-0 inline-flex items-center p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                    <circle cx="10" cy="10" r="7" />
                                    <line x1="21" y1="21" x2="15" y2="15" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('admin.clients.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Novo Cliente
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                    <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                        <thead>
                            <tr class="text-left">
                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Nome</th>
                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Email</th>
                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Telefone</th>
                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Empresa</th>
                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td class="border-dashed border-t border-gray-200 px-3 py-2">{{ $client->name }}</td>
                                    <td class="border-dashed border-t border-gray-200 px-3 py-2">{{ $client->email }}</td>
                                    <td class="border-dashed border-t border-gray-200 px-3 py-2">{{ $client->phone }}</td>
                                    <td class="border-dashed border-t border-gray-200 px-3 py-2">{{ $client->company_name }}</td>
                                    <td class="border-dashed border-t border-gray-200 px-3 py-2">
                                        <a href="#" class="text-blue-600 hover:text-blue-900 mr-2">Editar</a>
                                        <a href="#" class="text-red-600 hover:text-red-900">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
