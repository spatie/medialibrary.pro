const mix = require("laravel-mix");
require("laravel-mix-purgecss");

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

mix.js("resources/js/app.js", "public/js/vue")
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss")])
    .purgeCss({
        whitelistPatterns: [/🖼/],
        whitelistPatternsChildren: [/🖼/]
    })
    .version();

mix.webpackConfig({
    resolve: {
        symlinks: false,
        alias: {
            react: path.resolve("./node_modules/react"),
            vue: path.resolve("./node_modules/vue")
        }
    }
});
