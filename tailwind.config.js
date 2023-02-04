/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],
  theme: {
    extend: {
        animation: {
            blob: "blob 10s infinite",
          },
          keyframes: {
            blob: {
              "0%": {
                transform: "translate(0px, 0px) scale(1)",
              },
              "33%": {
                transform: "translate(30px, -50px) scale(1.4)",
              },
              "66%": {
                transform: "translate(-10px, 20px) scale(0.9)",
              },
              "100%": {
                transform: "translate(0px, 0px) scale(1)",
              },
            },
          },
    },
  },
  plugins: [],
}
