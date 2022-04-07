const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css/');

mix.copy('resources/assets/images', 'public/images');
// mix.copy('resources/assets/fonts', 'public/fonts');
// mix.copy('node_modules/slick-carousel/slick', 'public/assets/slick');
// mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/assets/js');
// mix.copy('node_modules/slick-carousel/slick/slick.min.js', 'public/assets/js');
// mix.copy('node_modules/slick-carousel/slick/slick.css', 'public/assets/css');
// mix.copy('node_modules/slick-carousel/slick/slick-theme.css', 'public/assets/css');
