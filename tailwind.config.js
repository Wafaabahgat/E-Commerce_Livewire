/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "node_modules/preline/dist/*.js",
    ],
    darkMode: "class",
    theme: {
        extend: {
            colors: {},
            gridTemplateColumns: {
                prod: "repeat(auto-fit, minmax(400px, 1fr))",
                plog: "repeat(auto-fit, minmax(220px, 1fr))",
                plogSm: "repeat(auto-fit, minmax(170px, 1fr))",
                plog1: "repeat(auto-fit, minmax(330px, 1fr))",
            },
        },
    },
    plugins: [require("preline/plugin")],
};
