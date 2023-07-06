/** @type {import('tailwindcss').Config} */

export default {
  content: [
    "./resources/**/*.blade.php",
    //"./resources/**/*.js",
    //"./resources/**/*.vue",
  ],
  theme: { 
    extend: {
      keyframes: {
        marquee: {
          'from': {right: '-450px'},
	        'to': {right: '2070px'},
        },
        slideUp: {
          'from': {transform:'translate(0, 90%)'},
          'to': {transform: 'translate(0, 0)'},
        }
      },
      animation: {
      marquee: 'marquee 40s linear infinite',
      splitText: 'slideUp 0.9s',
      },
      colors: {
        main: '#871414',
        light: '#f3e5e0',
      },
      fontSize: {
        '8.5xl': ['5.25rem', '1.15'],
      }
    },
    fontFamily: {
      'sans' : ['ibm plex sans', 'sans-serif'],
    }
  },
  plugins: [],
}

