/** @type {import('tailwindcss').Config} */

import preset from "./vendor/filament/support/tailwind.config.preset";

export default {
    presets: [preset],
    content: [
        "./app/Filament/**/*.php",
        "./resources/views/filament/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#73C3E8",
                secondary: "#E8E972",
            },
        },
    },
    plugins: [
        // "tailwindcss/nesting": "postcss-nesting",
        // // tailwindcss: {},
        // // autoprefixer: {},
    ],
};
