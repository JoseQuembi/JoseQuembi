<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50 dark:bg-gray-900">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}" type="image/x-icon">
    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('dist/main.css') }}">
    <!-- Livewire Styles -->
    <script src="{{ asset('dist/charts.js') }}"></script>
    @livewireStyles
    @stack('styles')
</head>
<body class="h-full transition-colors duration-300 ease-in-out bg-gray-50/10 dark:bg-gray-900">
    <!-- Sidebar -->
    @include('layouts.partials.aside')
    <!-- End Sidebar -->

    <!-- Content -->
    <div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:pl-72 bg-gray-50 dark:bg-gray-900">
        <!-- Navbar -->
        @include('layouts.partials.header')
        <!-- End Navbar -->
        <!-- Page Content -->
        <main class="bg-gray-50 dark:bg-gray-900">
            <livewire:components.alert-message />
            {{ $slot }}
        </main>
    </div>
    <!-- ========== FOOTER ========== -->
    <footer class="w-full max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="py-6 border-t border-gray-200 dark:border-neutral-700">
            <div class="flex flex-wrap justify-between items-center gap-2">
                <div>
                    <p class="text-xs text-gray-600 dark:text-neutral-400">
                        © {{ date('Y') }} {{ config('app.name') }}.
                    </p>
                </div>
                <!-- End Col -->

                <!-- List -->
                <ul class="flex flex-wrap items-center">
                    <li class="inline-block relative pe-4 text-xs last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-1.5 before:-translate-y-1/2 before:size-[3px] before:rounded-full before:bg-gray-400 dark:text-neutral-500 dark:before:bg-neutral-600">
                        <a class="text-xs text-gray-500 underline hover:text-gray-800 hover:decoration-2 focus:outline-none focus:decoration-2 dark:text-neutral-500 dark:hover:text-neutral-400" href="#">
                            X (Twitter)
                        </a>
                    </li>
                    <li class="inline-block relative pe-4 text-xs last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-1.5 before:-translate-y-1/2 before:size-[3px] before:rounded-full before:bg-gray-400 dark:text-neutral-500 dark:before:bg-neutral-600">
                        <a class="text-xs text-gray-500 underline hover:text-gray-800 hover:decoration-2 focus:outline-none focus:decoration-2 dark:text-neutral-500 dark:hover:text-neutral-400" href="#">
                            Dribbble
                        </a>
                    </li>
                    <li class="inline-block pe-4 text-xs">
                        <a class="text-xs text-gray-500 underline hover:text-gray-800 hover:decoration-2 focus:outline-none focus:decoration-2 dark:text-neutral-500 dark:hover:text-neutral-400" href="#">
                            Github
                        </a>
                    </li>
                    <li class="inline-block">
                        <!-- Dark Mode -->
                        <button type="button" class="hs-dark-mode hs-dark-mode-active:hidden relative flex justify-center items-center size-7 border border-gray-200 text-gray-500 rounded-full hover:bg-gray-200 focus:outline-none focus:bg-gray-200 dark:border-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-theme-click-value="dark">
                            <span class="sr-only">Dark</span>
                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
                            </svg>
                        </button>
                        <button type="button" class="hs-dark-mode hs-dark-mode-active:flex hidden relative flex justify-center items-center size-7 border border-gray-200 text-gray-500 rounded-full hover:bg-gray-200 focus:outline-none focus:bg-gray-200 dark:border-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-theme-click-value="light">
                            <span class="sr-only">Light</span>
                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="4"></circle>
                                <path d="M12 2v2"></path>
                                <path d="M12 20v2"></path>
                                <path d="m4.93 4.93 1.41 1.41"></path>
                                <path d="m17.66 17.66 1.41 1.41"></path>
                                <path d="M2 12h2"></path>
                                <path d="M20 12h2"></path>
                                <path d="m6.34 17.66-1.41 1.41"></path>
                                <path d="m19.07 4.93-1.41 1.41"></path>
                            </svg>
                        </button>
                        <!-- End Dark Mode -->
                    </li>
                </ul>
                <!-- End List -->
            </div>
        </div>
    </footer>
    <!-- ========== END FOOTER ========== -->
    <!-- Livewire Scripts -->
    @livewireScripts
    <!-- Preline UI Scripts -->
    <script src="{{ asset('dist/preline.js') }}"></script>
    <script>
        // Inicializa os componentes do Preline
        HSOverlay.autoInit();
        HSDropdown.autoInit();
        HSCollapse.autoInit();

    </script>
    @stack('scripts')
    <script>
        // Function to set the theme
        function setTheme(theme) {
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
            localStorage.setItem('color-theme', theme);
        }

        // Function to toggle the theme
        function toggleTheme() {
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                setTheme('light');
            } else {
                setTheme('dark');
            }
        }

        // Set the initial theme
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            setTheme('dark');
        } else {
            setTheme('light');
        }

        // Add event listener to the theme toggle button
        document.getElementById('theme-toggle').addEventListener('click', toggleTheme);

        // Update icon visibility
        function updateIcons() {
            const darkIcon = document.getElementById('theme-toggle-dark-icon');
            const lightIcon = document.getElementById('theme-toggle-light-icon');

            if (document.documentElement.classList.contains('dark')) {
                darkIcon.classList.add('hidden');
                lightIcon.classList.remove('hidden');
            } else {
                lightIcon.classList.add('hidden');
                darkIcon.classList.remove('hidden');
            }
        }

        // Update icons on page load and theme change
        updateIcons();
        document.getElementById('theme-toggle').addEventListener('click', updateIcons);

    </script>
</body>
</html>
