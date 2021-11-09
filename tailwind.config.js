module.exports = {
    purge: {
        content : [
            './**/*.php',
            './assets/**/*.vue',
            './assets/**/*.js',
            './*.php',
        ],
        safelist : [
            'md:flex-row',
            'space-x-10',
            'md:space-x-2',
            'grid-cols-5',
            'col-span-4',
            'grid-cols-8',
            'gap-3',
            'border-r',
            'border-b',
            'border-golden',
            'hover:bg-gray-100',
            'bg-clip-content',
            'col-span-2',
            'font-semibold',
            'md:block',
            'col-span-5',
            'md:col-span-4'
        ]
    },
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
