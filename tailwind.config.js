/** @type {import('tailwindcss').Config} */

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
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
        },
        fadeIn: {
          'from': {opacity: '0'},
          'to': {opacity: '1'},
        },
        slideLeftOut: {
          'from': {opacity: 1, transform: 'translateX(0)'},
          'to': {opacity: 0, transform: 'translateX(-130px)'},
        },
        slideRightIn: {
          'from': {opacity: 0, transform: 'translateX(130px)'},
          'to': {opacity: 1, transform: 'translateX(0)'},
        }
      },
      animation: {
      marquee: 'marquee 40s linear infinite',
      splitText: 'slideUp 0.9s',
      fadeIn: 'fadeIn 1s',
      slideLeftOut: 'slideLeftOut 0.7s',
      slideRightIn: 'slideRightIn 0.7s',
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

