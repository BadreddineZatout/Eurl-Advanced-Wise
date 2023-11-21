/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            color: {
                stone: {
                    50: "rgb(250, 250, 249)",
                    100: "rgb(245, 245, 244)",
                    200: "rgb(231, 229, 228)",
                    300: "rgb(214, 211, 209)",
                    400: "rgb(168, 162, 158)",
                    500: "rgb(120, 113, 108)",
                    600: "rgb(87, 83, 78)",
                    700: "rgb(68, 64, 60)",
                    800: "rgb(41, 37, 36)",
                    900: "rgb(28, 25, 23)",
                    950: "rgb(12, 10, 9)",
                },
            },
        },
    },
    plugins: [],
};
