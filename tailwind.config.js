/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
  ],
    // enable dark mode via class strategy
    darkMode: 'class',
  theme: {
    extend: {},
  },
  plugins: [
      require('flowbite/plugin')({
          charts: true,
          forms: true,
          tooltips: true
      }),
  ],
}

