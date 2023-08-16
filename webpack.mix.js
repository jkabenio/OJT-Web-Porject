const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
// Copy Bootstrap CSS and JavaScript files
// css third party resoures
mix.copy('resources/css/Bootstrapv4.4.1.min.css', 'public/css/Bootstrapv4.4.1.min.css');
mix.copy('resources/css/w3.css', 'public/css/w3.css');
// js third party resources
mix.copy('resources/js/apexcharts.js', 'public/js/apexcharts.js');
mix.copy('resources/js/Bootstrapv4.4.1.min.js', 'public/js/Bootstrapv4.4.1.min.js');
mix.copy('resources/js/jquery-3.6.4.min.js', 'public/js/jquery-3.6.4.min.js');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
