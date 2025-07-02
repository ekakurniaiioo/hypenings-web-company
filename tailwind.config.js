/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {
      maxHeight: {
        '500': '500px',
      },
    },
  },
  plugins: [],
}
