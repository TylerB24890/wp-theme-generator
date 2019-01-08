/**
 * Lexi Webpack Configuration
 *
 * @uses Laravel Mix https://laravel-mix.com
 */

let mix = require('laravel-mix');

mix.js('src/js/app.js', 'dist/js/bundle.js')
   .sass('src/scss/style.scss', 'dist/styles/style.css')
   .then(() => {
     console.log('\n\n\nLexi has finished compiling!\n\n\n')
   })
   .setPublicPath('dist')
   .autoload({
     jquery: ['$', 'window.jQuery']
   })
   .minify(['dist/js/bundle.js', 'dist/styles/style.css'])
   .browserSync({
     proxy: '{%THEME_SLUG%}.local',
     port: 8000,
     files: [
       'dist/styles/{*,**/*}.css',
       'dist/js/{*,**/*}.js',
       '{*,**/*}.php'
     ]
   });
