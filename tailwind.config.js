/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/Views/**/*.{html,php}"],
  theme: {
    extend: {
      colors: {
        'card-blue': '#4088F4'
      },
      fontFamily: {
        "karla": ["Karla", "sans-serif"]
      }
    },
  },
  plugins: [],
}
