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
        'red': {
          'light': '#F9AAA4',
          'dark': '#870F3F'
        },
        'pink': {
          'light': '#F85ED7',
          'normal': '#FF32F1'
        },
        'grey': {
          'veryLight': '#FEFEFE',
          'inactive': '#474751',
          'input': '#191924',
          'section': '#1C1C28'
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
      '2xl': '1401px'
    },
    fontFamily: {
      'poppins': ['Poppins, Helvetica, Arial, sans-serif']
    }
  },
  plugins: []
}

