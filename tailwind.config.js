const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    mode: 'jit',
    // important: true,
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
            gradientColorStops: theme => ({
                transparent: 'transparent',
                black: '#222',
                white: colors.white,
                gray: colors.coolGray,
                red: colors.red,
                yellow: colors.amber,
                blue: colors.blue,
                golden: {
                    light: '#CAB44B',
                    DEFAULT: '#AC9E3C',
                    dark: '#977124',
                },
            }),
            lineHeight: {
                'normal': '1.6',
            }
            colors: {
                transparent: 'transparent',
                black: '#222',
                white: colors.white,
                gray: colors.coolGray,
                red: colors.red,
                yellow: colors.amber,
                blue: colors.blue,
                green: colors.green,
                golden: {
                    light: '#CAB44B',
                    DEFAULT: '#AC9E3C',
                    dark: '#977124',
                },
            },
        },
        screens: {
            'sm': '640px',
    
            'md': '816px',
    
            'lg': '1024px',
    
            'xl': '1412px',
    
            '2xl': '1536px',
        },
    },

    plugins: [
        require('@tailwindcss/forms'), 
        require('@tailwindcss/typography'),
    ],
};
