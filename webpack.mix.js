let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

const purger = require('@fullhuman/postcss-purgecss')({
    content: [
        './templates/**/*.twig',
        './assets/**/*.vue',
        // etc.
    ],

    defaultExtractor: content => content.match(/[A-Za-z0-9-_:/]+/g) || [],

    whitelist: [
        'menu-item',
        'logo'
    ]
})

mix.postCss('assets/styles/main.css', 'dist/styles/main.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('postcss-color-function'),
    require('postcss-nested'),
    require('postcss-preset-env')({stage: 1}),
    ...(process.env.NODE_ENV === 'production')
        ? [purger]
        : []
])
    .js('assets/vue/app.js', 'dist/scripts/elements.vue.js')
