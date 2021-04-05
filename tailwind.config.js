const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                green: {
                  450: '#2BCB00'
                },
            },
        },
    },


    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    darkMode: 'media',

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
