<div>
    <h1 class="text-2xl font-semibold mb-6">Gerenciar Funções para {{ $user->name }}</h1>
    <form wire:submit.prevent="submit">
        <div class="mb-4">
            @foreach($roles as $role)
                <label class="inline-flex items-center">
                    <input type="checkbox" wire:model="selectedRoles" value="{{ $role->id }}">
                    <span class="ml-2">{{ $role->name }}</span>
                </label>
            @endforeach
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Atualizar Funções</button>
        </div>
    </form>
</div>

