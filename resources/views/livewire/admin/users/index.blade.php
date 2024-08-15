<div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">Gestão de Usuários</h1>
        <a href="{{ route('admin.users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            <i class="fas fa-user-plus mr-2"></i> Novo Usuário
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Foto</th>
                    <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Nome</th>
                    <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Email</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Funções</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm text-right">Ações</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($users as $user)
                <tr class="border-b">
                    <td class="py-3 px-4">
                        <img src="{{ $user->profile_image }}" alt="{{ $user->name }}" class="h-12 w-12 rounded-full">
                    </td>
                    <td class="py-3 px-4">{{ $user->name }}</td>
                    <td class="py-3 px-4">{{ $user->email }}</td>
                    <td class="py-3 px-4">
                        @foreach($user->roles as $role)
                        <span class="bg-gray-200 text-gray-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td class="py-3 px-4 text-right">
                        <a href="{{ route('admin.users.edit', $user->username) }}" class="text-blue-600 hover:text-blue-900 mr-2">
                            Editar
                        </a>
                        <a href="{{ route('admin.users.show', $user->username) }}" class="text-green-600 hover:text-green-900 mr-2">
                            Ver
                        </a>
                        <a href="{{ route('admin.users.roles', $user->username) }}" class="text-yellow-600 hover:text-yellow-900">
                            regras
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
