module.exports = {
    content: [
      './resources/views/**/*.blade.php',
      './resources/js/**/*.js',
      './resources/views/components/**/*.blade.php',
      './resources/views/livewire/**/*.blade.php',
      'node_modules/preline/dist/*.js',
    ],
    darkMode: 'class',
    theme: {
      extend: {},
    },
    plugins: [require('preline/plugin'),],
  }
