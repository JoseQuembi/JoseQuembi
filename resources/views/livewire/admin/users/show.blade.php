<div class="container mx-auto py-8">
    <div class="w-full max-w-lg mx-auto bg-white shadow-lg rounded-lg p-8">
        <div class="flex items-center mb-6">
            <img src="{{ $user->profile_image }}" alt="{{ $user->name }}" class="h-24 w-24 rounded-full mr-6">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">{{ $user->name }}</h2>
                <p class="text-gray-600">{{ $user->email }}</p>
            </div>
        </div>
        <div class="mb-6">
            <h3 class="text-xl font-semibold text-gray-700">Informações Pessoais</h3>
            <p class="mt-2 text-gray-700">Endereço: {{ $user->address }}</p>
            <p class="mt-2 text-gray-700">Telefone: {{ $user->phone }}</p>
        </div>
        <div>
            <h3 class="text-xl font-semibold text-gray-700">Funções</h3>
            <div class="mt-2">
                @foreach($user->roles as $role)
                <span class="bg-gray-200 text-gray-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded">{{ $role->name }}</span>
                @endforeach
            </div>
        </div>
    </div>
</div>
