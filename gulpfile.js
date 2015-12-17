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
        .less('app.less')

        .scripts([
            '/vendor/angular/angular.min.js', 
            '/vendor/angular-resource/angular-resource.min.js', 
            '/vendor/angular-messages/angular-messages.min.js', 
            '/directives/myForceInteger-directive.js',
            '/directives/mySortableHeader-directive.js',
            '/directives/my-editable/myEditable-commons.js',
            '/directives/my-editable/myEditableText-directive.js',
            '/directives/my-editable/myEditableInteger-directive.js',
            '/directives/my-editable/myEditableTextarea-directive.js',
            '/directives/my-editable/myEditableCheckbox-directive.js',
            '/directives/my-editable/myEditableDropdown-directive.js',
            '/directives/my-editable/myEditableRadio-directive.js',
            '/filters/myCustomFilter-filter.js',
            '/services/data/stagiairetypes-service.js',
            '/services/data/formateurtypes-service.js',
            '/services/data/financeurtypes-service.js',
            '/services/data/tariftypes-service.js',
            '/services/data/lieu-service.js',
            '/services/data/domaineformations-service.js',
            '/controllers/editableTable-controller.js',
            '/app/parametresApp.js'
            ], 'public/js/parametres.js')
        .scripts([
            'vendor/angular/angular.min.js', 
            'vendor/angular-resource/angular-resource.min.js', 
            'vendor/angular-messages/angular-messages.min.js', 
            'directives/mySortableHeader-directive.js',
            'filters/myCustomFilter-filter.js',
            'services/data/modules-service.js',
            'controllers/editableTable-controller.js',
            'app/modulesApp.js'
            ], 'public/js/modules-list.js')
        .scripts([
            'vendor/angular/angular.min.js', 
            'vendor/angular-resource/angular-resource.min.js', 
            'vendor/angular-messages/angular-messages.min.js', 
            'directives/mySortableHeader-directive.js',
            'filters/myCustomFilter-filter.js',
            'services/data/sessions-service.js',
            'controllers/editableTable-controller.js',
            'app/sessionsApp.js'
            ], 'public/js/sessions-list.js')
        .scripts([
            'vendor/angular/angular.min.js', 
            'vendor/angular-resource/angular-resource.min.js', 
            'vendor/angular-messages/angular-messages.min.js', 
            'directives/mySortableHeader-directive.js',
            'filters/myCustomFilter-filter.js',
            'services/data/formateurs-service.js',
            'controllers/editableTable-controller.js',
            'app/formateursApp.js'
            ], 'public/js/formateurs-list.js')
        .scripts([
            'vendor/jquery/dist/jquery.min.js',
            'vendor/select2/select2.js',
            'vendor/angular/angular.min.js', 
            'vendor/angular-resource/angular-resource.min.js', 
            'vendor/angular-messages/angular-messages.min.js', 
            'vendor/angular-select2/dist/angular-select2.js',
            'directives/myForceInteger-directive.js',
            'directives/mySortableHeader-directive.js',
            'directives/my-editable/myEditable-commons.js',
            'directives/my-editable/myEditableText-directive.js',
            'directives/my-editable/myEditableInteger-directive.js',
            'directives/my-editable/myEditableTextarea-directive.js',
            'directives/my-editable/myEditableCheckbox-directive.js',
            'directives/my-editable/myEditableDropdown-directive.js',
            'directives/my-editable/myEditableRadio-directive.js',
            'filters/myCustomFilter-filter.js',
            'services/data/modules-service.js',
            'services/data/domaineformations-service.js',
            'services/data/sessions-service.js',
            'services/editmode-service.js',
            'services/shareddata-service.js',
            'services/details/moduledetail-service.js',
            'services/tables/sessions-service.js',
            'controllers/detail-controller.js',
            'controllers/editableTable-controller.js',
            'app/moduleDetailApp.js'
            ], 'public/js/modules-detail.js')
        .scripts([
            'vendor/jquery/dist/jquery.min.js',
            'vendor/select2/select2.js',
            'vendor/angular/angular.js', 
            'vendor/angular-resource/angular-resource.min.js', 
            'vendor/angular-messages/angular-messages.min.js', 
            'vendor/angular-select2/dist/angular-select2.js',
            'directives/myForceInteger-directive.js',
            'directives/mySortableHeader-directive.js',
            'directives/my-editable/myEditable-commons.js',
            'directives/my-editable/myEditableText-directive.js',
            'directives/my-editable/myEditableInteger-directive.js',
            'directives/my-editable/myEditableTextarea-directive.js',
            'directives/my-editable/myEditableCheckbox-directive.js',
            'directives/my-editable/myEditableDropdown-directive.js',
            'directives/my-editable/myEditableRadio-directive.js',
            'directives/my-editable/myEditableMultiselect-directive.js',
            'filters/myCustomFilter-filter.js',
            'services/data/sessions-service.js',
            'services/data/sessionjours-service.js',
            'services/data/modules-service.js',
            'services/data/lieu-service.js',
            'services/data/formateurs-service.js',
            'services/editmode-service.js',
            'services/shareddata-service.js',
            'services/details/sessiondetail-service.js',
            'services/tables/sessionjours-service.js',
            'controllers/detail-controller.js',
            'controllers/editableTable-controller.js',
            'app/sessionDetailApp.js'
            ], 'public/js/sessions-detail.js')
        .scripts([
            'vendor/jquery/dist/jquery.min.js',
            'vendor/select2/select2.js',
            'vendor/angular/angular.js', 
            'vendor/angular-resource/angular-resource.min.js', 
            'vendor/angular-messages/angular-messages.min.js', 
            'vendor/angular-select2/dist/angular-select2.js',
            'directives/myForceInteger-directive.js',
            'directives/mySortableHeader-directive.js',
            'directives/my-editable/myEditable-commons.js',
            'directives/my-editable/myEditableText-directive.js',
            'directives/my-editable/myEditableInteger-directive.js',
            'directives/my-editable/myEditableTextarea-directive.js',
            'directives/my-editable/myEditableCheckbox-directive.js',
            'directives/my-editable/myEditableDropdown-directive.js',
            'directives/my-editable/myEditableRadio-directive.js',
            'filters/myCustomFilter-filter.js',
            'services/data/formateurs-service.js',
            'services/data/formateurtypes-service.js',
            'services/editmode-service.js',
            'services/shareddata-service.js',
            'services/details/formateurdetail-service.js',
            'controllers/detail-controller.js',
            'app/formateurDetailApp.js'
            ], 'public/js/formateurs-detail.js')
/*
    .spritesmith('resources/assets/img/sprites', {
        imgOutput: 'public/images',
        cssOutput: 'resources/assets/sass/theme',
        cssName: '_sprite.scss',
        imgPath: '../images/sprite.png'
    });
*/
});

elixir.Task.find('less').watch('resources/assets/less/**/');
//elixir.Task.find('sprite').watch('resources/assets/img/sprites/**/');