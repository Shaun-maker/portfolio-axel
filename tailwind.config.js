/** @type {import('tailwindcss').Config} */

export default {
  content: [
    "./resources/**/*.blade.php",
    //"./resources/**/*.js",
    //"./resources/**/*.vue",
  ],
  theme: { 
    extend: {
      colors: {
        main: '#871414',
        light: '#f3e5e0',
      },
    },
    fontFamily: {
      'sans' : ['ibm plex sans', 'sans-serif'],
    }
  },
  plugins: [],
}

