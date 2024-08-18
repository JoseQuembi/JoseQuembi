<div>
    <h2 class="text-2xl font-bold mb-4">Gerenciar Funções: {{ $user->name }}</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="updateRoles">
        <div class="mb-4">
            @foreach ($availableRoles as $role)
                <div class="flex items-center mb-2">
                    <input type="checkbox" id="role-{{ $role->id }}" value="{{ $role->id }}" wire:model="selectedRoles" class="form-checkbox h-5 w-5 text-blue-600">
                    <label for="role-{{ $role->id }}" class="ml-2 text-gray-700">{{ $role->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Atualizar Funções
        </button>
    </form>
</div>
