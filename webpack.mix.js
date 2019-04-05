let mix = require('laravel-mix');

mix.options({publicPath: 'public'});
mix.copyDirectory('resources/images', 'public/images')
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/app.login.js', 'public/js')
    .js('resources/js/user.js', 'public/js')
    .js('resources/js/data.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/app.login.scss', 'public/css')
    .version().disableNotifications();
