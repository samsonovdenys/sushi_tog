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

// mix.js('resources/js/app.js', 'public/js')
// mix.css('resources/css/reser_styles.css', 'public/css')
// mix.css('resources/css/app.css', 'public/css');

mix.copy('resources/assets/imgs/background.png', 'public/imgs') // Copia l'immagine nella cartella pubblica
    .options({
        processCssUrls: false // Impedisce a Mix di processare automaticamente le URL delle immagini
    });

mix.js('resources/assets/js/app.js', 'public/js')
    .css('resources/assets/css/app.css', 'public/css');

// mix.postCss('resources/assets/css/reset_styles.css', 'public/css');

