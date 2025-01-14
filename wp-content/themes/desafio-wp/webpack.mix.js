const mix = require("laravel-mix");

mix.webpackConfig({
  stats: {
    children: true,
  },
});

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

mix.js(["assets/js/script.js", "assets/js/async.js"], "public/js/script.js");
