<div class="bg-gray-100 min-h-screen py-8">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="relative h-48 bg-gradient-to-r from-blue-500 to-purple-600">
            <div class="absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-black/50 to-transparent"></div>
        </div>

        <div class="relative px-6 py-4">
            <div class="absolute -top-16 left-6">
                <img src="{{ $user->profile_image ? $user->profile_image : 'https://via.placeholder.com/150' }}" alt="{{ $user->name }}" class="w-32 h-32 rounded-full border-4 border-green-300 shadow-lg bg-gray-50">
            </div>

            <div class="ml-40">
                <h1 class="text-3xl font-bold text-gray-800">{{ $user->name }}</h1>
                <p class="text-gray-600">{{ '@' . $user->username }}</p>
            </div>

            <div class="mt-6 flex justify-end space-x-4">
                <a href="{{ route('admin.profile.edit') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">Editar Perfil</a>
                <a href="{{ route('admin.profile.update') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition duration-300">Segurança</a>
            </div>
        </div>

        <div class="px-6 py-4">
            <p class="text-gray-700 text-lg mb-4">{{ $profile->bio ?? 'Nenhuma biografia disponível.' }}</p>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Informações de Contato</h2>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            {{ $user->email }}
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            {{ $user->phone ?? 'Não informado' }}
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            {{ $user->address ?? 'Não informado' }}
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Links</h2>
                    <ul class="space-y-2">
                        @if($profile && $profile->website)
                            <li>
                                <a href="{{ $profile->website }}" target="_blank" class="flex items-center text-blue-500 hover:underline">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                                    Website Pessoal
                                </a>
                            </li>
                        @else
                            <li class="text-gray-500">Nenhum site informado</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
