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
	.extract(['axios', 'vue', 'bootstrap-vue', 'vue-router', 'lodash', 'popper.js', 'bootstrap', 'toastr/build/toastr.min.js'])
   .sass('resources/sass/app.scss', 'public/css')
   .styles(['node_modules/font-awesome/css/font-awesome.css'],'public/css/font-awesome.css');

mix.copy([
    'node_modules/font-awesome/fonts/'
], 'public/fonts');