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

mix.js("resources/js/app.js", "public/js").postCss(
    "resources/css/app.css",
    "public/css",
    [
        //
    ]
);

const folder = {
  src: 'resources/',               // source files
  src_assets: 'resources/assets/', // source assets files
  dist: 'public/',                 // build files
  dist_assets: 'public/assets/'    // build assets files
};

mix.sass(folder.src + 'scss/contacts.scss', folder.dist + 'css');
