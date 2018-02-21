let mix = require('laravel-mix');

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

mix.styles([
	    'resources/assets/css/bootstrap.min.css',
	    'resources/assets/css/style.css',
	    'resources/assets/css/responsive.css',
	    'resources/assets/css/flaticon.css',
	    'resources/assets/css/bootstrap-select.min.css',
	    'resources/assets/css/hover.css',
	    'resources/assets/css/animate.min.css',
	    'resources/assets/css/flaticon.css',
	    'resources/assets/css/font-awesome.css',
	    'resources/assets/css/font-awesome.css',
	], 'public/css/frontend.css')
	.styles([
	    'resources/assets/css/select2.min.css',
	    'resources/assets/css/dataTables.bootstrap.min.css',
	    'resources/assets/css/perfect-scrollbar.min.csss',
	    'resources/assets/css/backend-main.css'
	], 'public/css/backend.css')
	.js('resources/assets/js/frontend.js', 'public/js')
	.js('resources/assets/js/backend.js', 'public/js')
	.js('resources/assets/js/home.js', 'public/js')
	.js('resources/assets/js/confirmation.js', 'public/js')
	.js('resources/assets/js/select_contribution.js', 'public/js')
	.js('resources/assets/js/calculator.js', 'public/js');
