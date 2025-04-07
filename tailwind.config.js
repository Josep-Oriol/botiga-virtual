import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/categorias/*.blade.php",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/main/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
                body: ["Poppins", "sans-serif"],
            },
            colors: {
                primary: {
                    DEFAULT: "#3B82F6", // Azul principal
                    light: "#D1D5DB", // Gris claro
                },
                secondary: {
                    DEFAULT: "#EC4899", // Rosa vibrante
                },
                custom: {
                    dark1: "#111827", // Negro azulado oscuro
                    dark2: "#18202F", // Azul oscuro
                    dark3: "#1F2937", // Azul grisáceo oscuro
                },
            },
        },
    },
    plugins: [require("tailwindcss-scrollbar")],
};
