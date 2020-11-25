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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix.js( 'node_modules/jquery/dist/jquery', 'public/js' );    
mix.js( 'node_modules/popper.js', 'public/js' );    
mix.js( 'node_modules/bootstrap/dist/js/bootstrap.bundle', 'public/js' );    

//require( '../../node_modules/jquery/dist/jquery' );
//require( '../../node_modules/popper.js' );
//require('../../node_modules/bootstrap/dist/js/bootstrap.bundle');

mix.sass( 'resources/css/bootstrap/scss/bootstrap.scss', 'public/css' );    
