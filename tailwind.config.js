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
        extend: {
            backgroundColor: ['active', 'responsive', 'hover'],

            fontFamily: {
                'Almarai': ['Almarai', 'sans-serif'],
                'Inter': ['Inter', 'sans-serif']


            },
        },
    },

    plugins: [require("daisyui"),forms],

    corePlugins: {
        rtl: true,
    },
};
