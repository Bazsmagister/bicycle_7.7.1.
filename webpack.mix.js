const mix = require("laravel-mix");

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

// mix.js("resources/js/app.js", "public/js").sass(
//     "resources/sass/app.scss",
//     "public/css"
// );

// mix.js("resources/js/app.js", "public/js")
//     .js("resources/js/my.js", "public/js")
//     .sass("resources/sass/app.scss", "public/css");

//How to fix the error "You may need an appropriate loader to handle this file type"
//stackoverflow.com/questions/65607153/how-to-fix-the-error-you-may-need-an-appropriate-loader-to-handle-this-file-typ
//https://laravel-mix.com/docs/6.0/upgrade

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/my.js", "public/js")
    .vue()
    .sass("resources/sass/app.scss", "public/css");
//.postCss("resources/css/app.css", "public/css", [
//    //
//]);

//;.sourceMaps();
//added .sourceMaps()
//https://stackoverflow.com/questions/49726204/source-map-error-request-failed-with-status-404-resource-url-http-mywebsite

// mix.scripts(
//     ["public/js/admin.js", "public/js/dashboard.js"],
//     "public/js/all.js"
// );

/*
   mix.styles([
    'public/css/vendor/normalize.css',
    'public/css/vendor/videojs.css'
], 'public/css/all.css');
*/
