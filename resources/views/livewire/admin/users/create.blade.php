<div class="container mx-auto py-8">
    <div class="w-full max-w-lg mx-auto bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Criar Novo Usuário</h2>
        <form wire:submit.prevent="createUser">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nome</label>
                <input type="text" id="name" wire:model="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Nome Completo">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" wire:model="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Endereço de Email">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Senha</label>
                <input type="password" id="password" wire:model="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Senha">
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="address" class="block text-gray-700">Endereço</label>
                <input type="text" id="address" wire:model="address" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Endereço Completo">
                @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-gray-700">Telefone</label>
                <input type="text" id="phone" wire:model="phone" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Número de Telefone">
                @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-6">
                <label for="profile_image" class="block text-gray-700">Foto de Perfil</label>
                <input type="file" id="profile_image" wire:model="profile_image" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                @error('profile_image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Salvar</button>
                <a href="{{ route('users.index') }}" class="text-gray-700 hover:text-gray-900">Cancelar</a>
            </div>
        </form>
    </div>
</div>
