<!-- resources/views/layouts/guest.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{  $title ?? config('app.name') }} - Autenticação</title>

    <!-- Inclua o arquivo de CSS compilado -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Estilos do Livewire -->
    @livewireStyles
</head>
<body class="flex justify-center items-center min-h-screen bg-gradient-to-br from-indigo-600 to-blue-500">


    <div class="min-h-screen flex flex-col items-center justify-center">
        <!-- Conteúdo dinâmico -->
        <div class="w-full max-w-md mt-8">
            {{ $slot }}
        </div>
    </div>

    <!-- Scripts do Livewire -->
    @livewireScripts
</body>
</html>
