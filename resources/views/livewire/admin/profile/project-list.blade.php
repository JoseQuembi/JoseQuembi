<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Projetos
        </h3>
    </div>
    <div class="border-t border-gray-200">
        <ul class="divide-y divide-gray-200">
            @forelse ($projects as $project)
                <li class="px-4 py-4 sm:px-6">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-indigo-600 truncate">
                            {{ $project->name }}
                        </p>
                        <div class="ml-2 flex-shrink-0 flex">
                            <p class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{ $project->status }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-2 sm:flex sm:justify-between">
                        <div class="sm:flex">
                            <p class="flex items-center text-sm text-gray-500">
                                {{ Ajuda::limitarString($project->description,100) }}
                            </p>
                        </div>
                        <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                            <p>
                                Prazo: <time datetime="{{ $project->end_date }}">{{ Ajuda::dataCurta($project->end_date) }}</time>
                            </p>
                        </div>
                    </div>
                </li>
            @empty
                <li class="px-4 py-4 sm:px-6">
                    <p class="text-sm text-gray-500">Nenhum projeto encontrado.</p>
                </li>
            @endforelse
        </ul>
    </div>
</div>
