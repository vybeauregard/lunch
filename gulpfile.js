var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
        .styles([
            'font-awesome.css',
            'jquery.gritter.css',
            'bootstrap-custom.css',
            'labcoat.css'
        ])
        .scripts([
            'jquery-1.11.3.min.js',
            'mobile-detect.min.js',
            'bootstrap.min.js',
            'jquery.gritter.js',
            'jquery.popconfirm.js',
            'bootstrap-treeview.js',
            'labcoat.js'
        ])
        .version(['public/css/all.css', 'public/js/all.js'])
        .copy('resources/assets/js', 'public/build/js')
        .copy('resources/assets/fonts', 'public/build/fonts');
});
