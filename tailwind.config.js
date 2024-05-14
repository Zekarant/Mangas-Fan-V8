/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './assets/**/*.{js,jsx,ts,tsx}',
    './templates/**/*.html.twig'
  ],
  theme: {
    extend: {
      colors: {
        'blackNavbar': '#1E1E1E',
        'blackSearchbarBorder': '#1C1C1C',
        'blackSearchbar': '#1C1C1C',

        'blue': {
          'dark': '#141720'
        },
        'pink': {
          'light': '#F85ED7',
          'scroll': '#FF32F1'
        },
        'grey': {
          'veryLight': '#FEFEFE'
        }
      },
      zIndex: {
        'max': '9999'
      }
    },
    screens: {
      '2xs': '320px',
      'xs': '480px',
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1200px',
      '2xl': '1401px',
      '3xl': '1750px'
    },
    fontFamily: {
      'poppins': ['Poppins, Helvetica, Arial, sans-serif']
    }
  },
  plugins: []
}

