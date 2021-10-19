module.exports = {
    mode: 'jit',
    purge: [
        './**/*.php',
        './resources/assets/**/*.vue',
        './resources/assets/**/*.js',
        './*.php',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        container: {
            center: true,
            screens: {
                'sm': '640px',
                'md': '768px',
                'lg': '1024px',
                'xl': '1280px',
            }
        },
        extend: {
            colors: {
                golden: '#CFA075',
                darkblue: '#162850',
                mediumblue: '#1D5272',
                lightblue: '#1C618B',
                turquise: '#1C6D8B',
            },
            padding: {
                '5625': '56.25%',
                '70': '70%',
                '75': '75%'
            },
            height: {
                'halfscreen': '50vh'
            }
        },
    },
    variants: {
        extend: {}
    },
    plugins: [
        require('@tailwindcss/line-clamp'),
    ],
}
