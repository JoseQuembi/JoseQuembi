<div>
    <h2 class="text-2xl font-bold mb-4">Marcos</h2>

    <div class="mb-4">
        <input wire:model.debounce.300ms="search" type="text" placeholder="Pesquisar marcos..." class="w-full px-3 py-2 border rounded-md">
    </div>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Nome</th>
                <th class="py-2 px-4 border-b">Projeto</th>
                <th class="py-2 px-4 border-b">Data de Vencimento</th>
                <th class="py-2 px-4 border-b">Status</th>
                <th class="py-2 px-4 border-b">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($milestones as $milestone)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $milestone->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $milestone->project->name }}</td>
                    <td class="py-2 px-4 border-b">{{ Ajuda::dataCurta($milestone->due_date) }}</td>
                    <td class="py-2 px-4 border-b">{{ $milestone->status }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.milestones.show', $milestone) }}" class="text-blue-500 hover:underline">Ver</a>
                        <a href="{{ route('admin.milestones.edit', $milestone) }}" class="text-yellow-500 hover:underline ml-2">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $milestones->links() }}
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.milestones.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Criar Novo Marco
        </a>
    </div>
</div>
