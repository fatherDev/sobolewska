const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Sage application. By default, we are compiling the Sass file
 | for your application, as well as bundling up your JS files.
 |
 */

mix.setPublicPath('./public').browserSync('sobolewska.local');
if (!mix.inProduction()) {
  mix.webpackConfig({
    devtool: 'inline-source-map',
  });
}

mix.sass('resources/styles/app.scss', 'styles').options({
  processCssUrls: false,
});

mix
  .js('resources/scripts/app.js', 'scripts')
  .autoload({ jquery: ['$', 'window.jQuery'] })
  .extract();

mix
  .copyDirectory('resources/images', 'public/images')
  .copyDirectory('resources/fonts', 'public/fonts');

mix.sourceMaps().version();
