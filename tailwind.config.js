/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    fontFamily: {
      'montserrat' : ['Montserrat', 'sans-serif']
    },
    colors: {
      ...colors,
      'yellow' : '#FDE047',
      'primary-1' : '#079992',
      'primary-2' : '#38ADA9',
      'primary-3' : '#78E08F',
      'primary-4' : '#B8E994',
      'secondary-1' : '#0A3D62',
      'secondary-2' : '#3C6382',
      'secondary-3' : '#60A3BC',
      'secondary-4' : '#82CCDD',
      'card-element-1' : '#0C2461',
      'card-element-2' : '#1E3799',
      'card-element-3' : '#4A69BD',
      'card-element-4' : '#6A89CC',
      'alert-1' : '#B71540',
      'alert-2' : '#EB2F06',
      'alert-3' : '#E55039',
      'alert-4' : '#F8C291',
    },
    extend: {
      backgroundImage: {
        'register-login': "url('/img/register-login.png')",
      },
    },
  },
  plugins: [],
}