<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 100">
    <defs>
      <style>
        .primary { fill: #4285F4; }
        .secondary { fill: #34A853; }
        .accent { fill: #EA4335; }
        .text { fill: #3C4043; }
        @media (prefers-color-scheme: dark) {
          .primary { fill: #dfe4ec; }
          .secondary { fill: #81C995; }
          .accent { fill: #F28B82; }
          .text { fill: #E8EAED; }
        }
      </style>
    </defs>

    <!-- Símbolo de código simplificado -->
    <path class="primary" d="M30,50 L50,30 L45,25 L20,50 L45,75 L50,70 Z" />
    <path class="secondary" d="M70,50 L50,30 L55,25 L80,50 L55,75 L50,70 Z" />

    <!-- Símbolo de "H" estilizado -->
    <path class="accent" d="M90,25 V75 M90,50 H110 M110,25 V75" stroke-width="8" stroke-linecap="round" />

    <!-- Ponto para o "i" de Huila -->
    <circle class="accent" cx="120" cy="30" r="5" />

    <!-- Texto "Huila Place" -->
    <text x="140" y="55" font-family="Arial, sans-serif" font-size="24" font-weight="bold" class="text">
      Huíla Place
    </text>

    <!-- Símbolos de desenvolvimento -->
    <g transform="translate(140, 65) scale(0.5)">
      <path class="primary" d="M0,0 H30 V5 H0 Z M0,10 H20 V15 H0 Z M0,20 H25 V25 H0 Z" /> <!-- Código -->
      <path class="secondary" d="M40,0 H70 V30 H40 Z M45,5 H65 V25 H45 Z" /> <!-- Tela -->
      <path class="accent" d="M80,5 L95,20 L110,5 M80,25 H110" /> <!-- Gráfico -->
    </g>
  </svg>
