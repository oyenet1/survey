import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import preset from "./vendor/filament/support/tailwind.config.preset";

/** @type {import('tailwindcss').Config} */
export default {
    presets: [preset],
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./app/Filament/**/*.php",
        "./resources/views/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                primary: "#73C3E8",
                secondary: "#243c5a",
            },
        },
    },

    // plugins: [forms],
};

// export default {
//     presets: [preset],
//     content: [
//         "./app/Filament/**/*.php",
//         "./resources/views/**/*.blade.php",
//         "./vendor/filament/**/*.blade.php",
//     ],
//     theme: {
//         extend: {
//             colors: {
//                 primary: "#73C3E8",
//                 secondary: "#243c5a",
//             },
//         },
//     },
// };
