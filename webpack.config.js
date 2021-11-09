const path = require('path');
const autoprefixer = require('autoprefixer')
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const isProduction = 'production' === process.env.NODE_ENV;
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const MomentLocalesPlugin = require('moment-locales-webpack-plugin');
const {VueLoaderPlugin} = require('vue-loader')

// Set the build prefix.
let prefix = isProduction ? '.min' : '';
// Add PurgeCSS for production builds.

const config = {
    entry: {
        main: './assets/js/main.js',
        project: './assets/js/project.js'
    },
    output: {
        filename: `[name]${prefix}.js`,
        path: path.resolve(__dirname, 'dist')
    },
    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.esm.js'
        }
    },
    mode: process.env.NODE_ENV,
    module: {
        rules: [
            {
                test: /\.svg$/,
                loader: 'svg-inline-loader'
            },
            {
                test: /\.vue$/,
                loader: 'vue-loader',
                options: {
                    loaders: {
                        scss: 'vue-style-loader!css-loader!sass-loader',
                        sass: 'vue-style-loader!css-loader!sass-loader?indentedSyntax'
                    },
                    postcss: [
                        autoprefixer()
                    ],
                    autoprefixer: false
                }
            },
            {
                test: /\.js$/,
                loader: 'babel-loader',
                options: {
                    presets: [
                        [
                            '@babel/preset-env',
                            {
                                targets: {
                                    esmodules: true,
                                },
                            },
                        ],
                    ],
                }
            },
            {
                test: /\.s[ac]ss$/i,
                use: [
                    'vue-style-loader',
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'sass-loader',
                    {
                        loader: 'postcss-loader',
                        options: {
                            postcssOptions: {
                                plugins: [
                                    require('postcss-import'),
                                    require('tailwindcss')('tailwind.config.js'),
                                    require('postcss-nested'),
                                    require('autoprefixer'),
                                ]
                            }
                        }
                    }
                ],
            },
            {
                test: /\.svg$/,
                loader: 'svg-inline-loader'
            }
        ]
    },
    plugins: [
        new MiniCssExtractPlugin(),
        new MomentLocalesPlugin({
            localesToKeep: ['de-de'],
        }),
        new VueLoaderPlugin()
    ]
}

// Fire up a local server if requested
if (process.env.SERVER) {
    config.plugins.push(
        new BrowserSyncPlugin(
            {
                proxy: 'https://davinci.test',
                https: true,
                files: [
                    '**/*.php',
                    '**/*.scss',
                    '**/*.js'
                ],
                port: 3000,
                notify: false,
            }
        )
    )
}
module.exports = config
