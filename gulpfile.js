var elixir = require('laravel-elixir');

require('laravel-elixir-spritesmith');
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
    mix
        .sass('app.scss')

        .scripts([
            'lib/angular.min.js', 
            'lib/angular-resource.min.js', 
            'directives/myForceInteger-directive.js',
            'directives/mySortableHeader-directive.js',
            'directives/myEditable-directive.js',
            'filters/myCustomFilter-filter.js',
            'services/stagiairetypes-service.js',
            'services/formateurtypes-service.js',
            'services/financeurtypes-service.js',
            'services/tariftypes-service.js',
            'services/lieu-service.js',
            'services/domaineformations-service.js',
            'controllers/editableTable-controller.js',
            'app/parametresApp.js'
            ], 'public/js/parametres.js')
        .scripts([
            'lib/angular.min.js',
            'lib/angular-resource.min.js',
            'directives/myForceInteger-directive.js',
            'directives/mySortableHeader-directive.js',
            'directives/myEditable-directive.js',
            'filters/myCustomFilter-filter.js',
            'services/modules-service.js',
            'controllers/editableTable-controller.js',
            'app/modulesApp.js'
            ], 'public/js/modules-list.js')
        .scripts([
            'lib/angular.min.js',
            'lib/angular-resource.min.js',
            'directives/myForceInteger-directive.js',
            'directives/mySortableHeader-directive.js',
            'directives/myEditable-directive.js',
            'filters/myCustomFilter-filter.js',
            'services/modules-service.js',
            'services/domaineformations-service.js',
            'services/editmode-service.js',
            'controllers/moduledetail-controller.js',
            'app/moduleDetailApp.js'
            ], 'public/js/modules-detail.js')
    .spritesmith('resources/assets/img/sprites', {
        imgOutput: 'public/images',
        cssOutput: 'resources/assets/sass/theme',
        cssName: '_sprite.scss',
        imgPath: '../images/sprite.png'
    });
});

elixir.Task.find('sass').watch('resources/assets/sass/**/');
elixir.Task.find('sprite').watch('resources/assets/img/sprites/**/');