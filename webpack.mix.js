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

// mix.js('resources/js/app.js', 'public/js').postCss('resources/sass/app.scss', 'public/sass', [
//     require('postcss-import'),
//     require('tailwindcss'),
//     require('autoprefixer'),
// ]);

mix.js('resources/js/app.js', 'public/js');
mix.sass('resources/sass/app.scss', 'public/css');
mix.js('resources/js/yandex_map.js', 'public/js');
mix.js('resources/js/yandex_roadmap.js', 'public/js');
mix.js('resources/js/vuejs.js', 'public/js').vue();

mix.copy('resources/js/yandex_main.js', 'public/js');

mix.copyDirectory('resources/images', 'public/images');

if (mix.inProduction()) {
    mix.version();
}
