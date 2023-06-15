/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      inset:{
        '100': '100%'
      }
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}