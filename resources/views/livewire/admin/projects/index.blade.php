<div class="p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Projetos</h2>

    <div class="mb-4 flex justify-between items-center">
        <div>
            <input wire:model.debounce.300ms="search" type="text" placeholder="Buscar projetos..." class="px-4 py-2 border rounded-lg">
        </div>
        <a href="{{ route('admin.projects.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            Novo Projeto
        </a>
    </div>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 bg-gray-100 font-semibold text-gray-600 border-b cursor-pointer" wire:click="sortBy('name')">
                    Nome
                    @if ($sortField === 'name')
                    @if ($sortDirection === 'asc')
                    &#9650;
                    @else
                    &#9660;
                    @endif
                    @endif
                </th>
                <th class="py-2 px-4 bg-gray-100 font-semibold text-gray-600 border-b cursor-pointer" wire:click="sortBy('status')">
                    Status
                    @if ($sortField === 'status')
                    @if ($sortDirection === 'asc')
                    &#9650;
                    @else
                    &#9660;
                    @endif
                    @endif
                </th>
                <th class="py-2 px-4 bg-gray-100 font-semibold text-gray-600 border-b cursor-pointer" wire:click="sortBy('created_at')">
                    Data de Criação
                    @if ($sortField === 'created_at')
                    @if ($sortDirection === 'asc')
                    &#9650;
                    @else
                    &#9660;
                    @endif
                    @endif
                </th>
                <th class="py-2 px-4 bg-gray-100 font-semibold text-gray-600 border-b">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('admin.projects.show', $project->slug) }}">{{ Ajuda::limitarString($project->name, 50) }}</a>
                </td>
                <td class="py-2 px-4 border-b">
                    <span>{{ $project->status }}</span>
                </td>
                <td class="py-2 px-4 border-b">{{ Ajuda::humanoData($project->created_at) }}</td>
                <td class="py-2 px-4 border-b">
                    <div class="hs-dropdown relative inline-flex">
                        <button id="hs-dropdown-transform-style" type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            Opção
                            <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" /></svg>
                        </button>

                        <div class="hs-dropdown-menu w-72 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden z-10" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-transform-style">
                            <div class="hs-dropdown-open:ease-in hs-dropdown-open:opacity-100 hs-dropdown-open:scale-100 transition ease-out opacity-0 scale-95 duration-200 mt-2 origin-top-left min-w-60 bg-white shadow-md rounded-lg p-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700" data-hs-transition>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="{{ route('admin.projects.show', $project->slug) }}">
                                    Detalhar projeto
                                </a>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="{{ route('admin.projects.edit', $project->slug) }}">
                                    Editar Projeto
                                </a>
                                <button wire:click="delete({{ $project->id }} )" class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                                    Eliminar Projeto
                                </button>
                            </div>
                        </div>
                    </div
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $projects->links() }}
    </div>
</div>
