const mix = require('laravel-mix');
var path = require('path');

mix.webpackConfig({
    resolve: {
        alias: {
            '^resources': path.resolve(__dirname, 'resources/js'),
            '^modules': path.resolve(__dirname, 'resources/js/modules'),
            '^components': path.resolve(__dirname, 'resources/js/components')
        }
    }
});
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/modules/products/index.js', 'public/js/modules/products')
    .js('resources/js/modules/products/show.js', 'public/js/modules/products')
    .js('resources/js/modules/products/chart.js', 'public/js/modules/products')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/modules/products/index.scss', 'public/css/modules/products')
    .sass('resources/sass/modules/products/show.scss', 'public/css/modules/products')
    .sass('resources/sass/modules/products/chart.scss', 'public/css/modules/products');
