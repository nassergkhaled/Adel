import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            backgroundColor: ["active", "responsive", "hover"],

            fontFamily: {
                Almarai: ["Almarai", "sans-serif"],
                Inter: ["Inter", "sans-serif"],
            },
            colors: {
                "adel-bg": "#f6f6f3",
                "adel-light": "#f9f5f1",
                "adel-Light-hover": "#f5f0ea",
                "adel-Light-active": "#ebdfd4",
                "adel-Normal": "#bf9874",
                "adel-Normal-hover": "#ac8968",
                "adel-Normal-active": "#997a5d",
                "adel-Dark": "#8f7257",
                "adel-Dark-hover": "#735b46",
                "adel-Dark-active": "#564434",
                "adel-Darker": "#433529",

                "adel-light-blue": "#e6f0f8", // light blue background
                "adel-light-blue-hover": "#d0e2f1", // hover state for light blue
                "adel-light-blue-active": "#b8cfe8", // active state for light blue
                "adel-normal-blue": "#3B5998", // normal blue
                "adel-normal-blue-hover": "#2d4373", // hover state for normal blue
                "adel-normal-blue-active": "#24385e", // active state for normal blue
                "adel-dark-blue": "#1d2b50", // dark blue
                "adel-dark-blue-hover": "#172242", // hover state for dark blue
                "adel-dark-blue-active": "#111933", // active state for dark blue
                "adel-darker-blue": "#0e1326", // darker blue
            },
        },
    },

    plugins: [require("daisyui"), forms],

    corePlugins: {
        rtl: true,
    },
};
