<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('app.name') }} - Autenticação</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        @keyframes binary-rain {
            0% { transform: translateY(-100%); opacity: 0; }
            50% { opacity: 1; }
            100% { transform: translateY(100%); opacity: 0; }
        }

        .binary-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
            z-index: 0;
        }

        .binary-background .binary {
            position: absolute;
            color: #0F0;
            font-family: 'Courier New', Courier, monospace;
            font-size: 20px;
            white-space: nowrap;
            user-select: none;
            pointer-events: none;
            animation: binary-rain 10s linear infinite; /* Velocidade aumentada */
            text-shadow: 0 0 5px rgba(0, 255, 0, 0.7);
        }

        .ai-glow {
            animation: ai-pulse 2s infinite;
        }

        @keyframes ai-pulse {
            0%, 100% { box-shadow: 0 0 20px rgba(66, 153, 225, 0.5); }
            50% { box-shadow: 0 0 40px rgba(66, 153, 225, 0.8); }
        }
    </style>
</head>
<body class="flex justify-center items-center min-h-screen bg-gradient-to-br from-indigo-600 to-blue-500">
    <div class="min-h-screen flex flex-col items-center justify-center relative z-10">
        {{ $slot }}
    </div>

    <div class="binary-background" id="binary-background"></div>

    <div id="code-particles" class="fixed inset-0 pointer-events-none"></div>

    @livewireScripts
    <script src="{{ asset('dist/preline.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS('code-particles', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
                color: { value: "#ffffff" },
                shape: { type: "circle" },
                opacity: { value: 0.5, random: true },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 150, color: "#ffffff", opacity: 0.4, width: 1 },
                move: { enable: true, speed: 2, direction: "none", random: true, out_mode: "out" }
            },
            interactivity: {
                detect_on: "canvas",
                events: { onhover: { enable: true, mode: "repulse" }, onclick: { enable: true, mode: "push" } },
                modes: { repulse: { distance: 100, duration: 0.4 }, push: { particles_nb: 4 } }
            },
            retina_detect: true
        });

        // Função para criar números binários e elementos de programação aleatórios
        function generateCodeElements() {
            const binaryContainer = document.getElementById('binary-background');
            const numElements = 350; // Aumentar o número de elementos para mais cobertura
            const codeElements = ['0','Huíla','Place', '1', '&&', '||', '{}', '<>', '/*', '*/', '=>', '!==', '==', '===', 'function', 'var', 'let', 'const', 'return', 'if', 'else', 'for', 'while', 'class', 'interface'];

            for (let i = 0; i < numElements; i++) {
                const div = document.createElement('div');
                div.className = 'binary';
                div.textContent = codeElements[Math.floor(Math.random() * codeElements.length)];
                div.style.top = Math.random() * 100 + 'vh';
                div.style.left = Math.random() * 100 + 'vw';
                div.style.fontSize = Math.random() * 20 + 10 + 'px'; // Font size between 10px and 30px
                div.style.animationDuration = Math.random() * 5 + 5 + 's'; // Animation duration between 5s and 10s
                div.style.color = `rgba(0, 255, 0, ${Math.random()})`; // Variar a cor
                binaryContainer.appendChild(div);
            }
        }

        generateCodeElements();
    </script>
</body>
</html>
