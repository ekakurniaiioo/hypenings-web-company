/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/css/**/*.css",
    ],
 theme: {
    extend: {
      keyframes: {
        'float': {
          '0%, 100%': { transform: 'translateY(0px)' },
          '50%': { transform: 'translateY(-20px)' },
        },
        'pulse-move': {
          '0%, 100%': { transform: 'translate(0, 0) scale(1)' },
          '50%': { transform: 'translate(10px, -10px) scale(1.05)' },
        },
      },
      animation: {
        'float': 'float 6s ease-in-out infinite',
        'pulse-move': 'pulse-move 8s ease-in-out infinite',
      }
    },
  },
}
