const mix = require("laravel-mix");

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

mix.sass("resources/scss/custom.scss", "public/css")
    .sass("resources/scss/animations.scss", "public/css")
    .sass("resources/scss/variables.scss", "public/css")
    .sass("resources/scss/dashboard.scss", "public/css")
    .sass("resources/scss/dashboard_old.scss", "public/css");
