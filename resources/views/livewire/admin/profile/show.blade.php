<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Perfil do Usuário</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Informações do Usuário -->
        <div class="col-span-1 bg-white shadow rounded-lg p-6">
            <div class="flex items-center space-x-4 mb-6">
                <img src="{{ $user->profile_image ?? asset('img/default/user.png') }}" alt="{{ $user->name }}" class="w-20 h-20 rounded-full">
                <div>
                    <h2 class="text-2xl font-semibold">{{ $user->roles->first()->name}}</h2>
                </div>
            </div>
            <div class="flex items-center space-x-4 mb-6">
                <div>
                    <h2 class="text-2xl font-semibold">{{ $user->name }}</h2>
                    <p class="text-gray-600">{{ $user->email }}</p>
                </div>
            </div>
            <div class="mb-4">
                <h3 class="font-semibold mb-2">Biografia</h3>
                <p>{{ $user->userProfile->bio ?? 'Nenhuma biografia disponível.' }}</p>
            </div>
            <div class="mb-4">
                <h3 class="font-semibold mb-2">Website</h3>
                <a href="{{ $user->userProfile->website ?? '#' }}" class="text-blue-600 hover:underline">{{ $user->userProfile->website ?? 'Não informado' }}</a>
            </div>
            <div>
                <h3 class="font-semibold mb-2">Contato</h3>
                <p>{{ $user->address ?? 'Endereço não informado' }}</p>
                <p>{{ $user->phone ?? 'Telefone não informado' }}</p>
            </div>
        </div>

        <!-- Projetos Recentes -->
        <div class="col-span-1 bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Projetos Recentes</h2>
            @forelse ($recentProjects as $project)
                <div class="mb-4 last:mb-0">
                    <h3 class="font-semibold">{{ $project->name }}</h3>
                    <p class="text-sm text-gray-600">{{ Ajuda::limitarString($project->description,30) }}</p>
                </div>
            @empty
                <p>Nenhum projeto recente.</p>
            @endforelse
        </div>

        <!-- Tarefas Recentes -->
        <div class="col-span-1 bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Tarefas Recentes</h2>
            @forelse ($recentTasks as $task)
                <div class="mb-4 last:mb-0">
                    <h3 class="font-semibold">{{ $task->title }}</h3>
                    <p class="text-sm text-gray-600">{{ $task->description }}</p>
                    <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">{{ $task->status }}</span>
                </div>
            @empty
                <p>Nenhuma tarefa recente.</p>
            @endforelse
        </div>
    </div>

    <!-- Cronograma de Atividades -->
    <div class="mt-8 bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Cronograma de Atividades</h2>
        <div class="space-y-4">
            @foreach ($activityLog as $activity)
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <span class="inline-block w-3 h-3 rounded-full {{ $activity['type'] === 'project_created' ? 'bg-green-500' : 'bg-blue-500' }}"></span>
                    </div>
                    <div>
                        <p class="font-semibold">{{ $activity['description'] }}</p>
                        <p class="text-sm text-gray-600">{{ $activity['date']->diffForHumans() }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mt-8">
        @livewire('admin.profile.project-list')
    </div>
</div>
