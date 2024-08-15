<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="text-gray-900 antialiased">
    <x-menu-navbar />

    <main class="container mx-auto py-8">
        {{ $slot }}
    </main>

    <footer class="bg-gray-900 mt-10 py-6">
        <div class="container mx-auto flex justify-between items-center text-gray-600">
            <div>
                &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Todos os direitos reservados.
            </div>
            <div class="flex space-x-4">
                <a href="#" class="hover:text-indigo-600 transition">Política de Privacidade</a>
                <a href="#" class="hover:text-indigo-600 transition">Termos de Serviço</a>
            </div>
        </div>
    </footer>

    @livewireScripts
    <script src="{{ asset('dist/preline.js') }}"></script>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

    </script>
</body>
</html>
