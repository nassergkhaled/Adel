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
            fontFamily: {
                'Almarai': ['Almarai', 'sans-serif'],
                'Inter': ['Inter', 'sans-serif']


            },
            colors: {
                'adel-bg': '#f6f6f3',
                'adel-light':'#f9f5f1',
                'adel-Light-hover': '#f5f0ea',
                'adel-Light-active': '#ebdfd4',
                'adel-Normal': '#bf9874',
                'adel-Normal-hover': '#ac8968',
                'adel-Normal-active': '#997a5d',
                'adel-Dark': '#8f7257',
                'adel-Dark-hover': '#735b46',
                'adel-Dark-active': '#564434',
                'adel-Darker': '#433529',
              },
        },
    },

    plugins: [require("daisyui"),forms],

    corePlugins: {
        rtl: true,
    },
};
