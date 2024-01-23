import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        mytheme: {
            primary: "#4770d0",

            secondary: "#8aa6e8",

            accent: "#4f7de5",

            neutral: "#ffffff",

            "base-100": "#ffffff",

            info: "#ffffff",

            success: "#4fa2e5",

            warning: "#e54f86",

            error: "#e0e54f",
        },
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, require("daisyui")],
};
