var elixir = require('laravel-elixir');

//require('laravel-elixir-spritesmith');
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

function array_unique(array) {
    for(var i = 0; i < array.length; ++i) {
        for(var j = i + 1; j < array.length; ++j) {
            if(array[i] === array[j])
                array.splice(j, 1);
        }
    }
    return array;
}
var libraries = [
    'vendor/jquery/dist/jquery.min.js',
    'vendor/select2/select2.js',
    'vendor/angular/angular.min.js', 
    'vendor/angular-resource/angular-resource.min.js', 
    'vendor/angular-messages/angular-messages.min.js', 
    'vendor/angular-select2/dist/angular-select2.js',
    'vendor/angular-bootstrap/ui-bootstrap-tpls.js',
    'vendor/angular-dateParser/dist/angular-dateparser.min.js',
    'vendor/angular-timepicker/dist/angular-timepicker.js',
];

var myEditable = [

    'directives/myForceInteger-directive.js',
    'directives/datepickerlocaldate-directive.js',
    'directives/my-editable/myEditable-commons.js',
    'directives/my-editable/myEditableText-directive.js',
    'directives/my-editable/myEditableEmail-directive.js',
    'directives/my-editable/myEditableInteger-directive.js',
    'directives/my-editable/myEditableDate-directive.js',
    'directives/my-editable/myEditableTime-directive.js',
    'directives/my-editable/myEditableTextarea-directive.js',
    'directives/my-editable/myEditableCheckbox-directive.js',
    'directives/my-editable/myEditableDropdown-directive.js',
    'directives/my-editable/myEditableRadio-directive.js',
    'directives/my-editable/myEditableMultiselect-directive.js',
    'modules/my-editable-module.js'
];

var sortableHeaderDirective = [
    'directives/mySortableHeader-directive.js',
    'modules/sortable-header-module.js'
]
var listTable = Array.prototype.concat(
    sortableHeaderDirective,
    [
        'filters/myCustomFilter-filter.js',
        'controllers/editableTable-controller.js',
        'services/shareddata-service.js',
        'modules/list-table-module.js'
    ]
);

var editableTable = Array.prototype.concat(
    myEditable,
    sortableHeaderDirective,
    [
        'filters/myCustomFilter-filter.js',
        'controllers/editableTable-controller.js',
        'services/shareddata-service.js',
        'modules/editable-table-module.js'
    ]
);


var detail = myEditable.concat([
    'services/editmode-service.js',
    'services/shareddata-service.js',
    'controllers/detail-controller.js',
    'modules/detail-module.js'
]);

var parametres = Array.prototype.concat(
    libraries,
    editableTable,
    [
        '/services/data/stagiairetypes-service.js',
        '/services/data/formateurtypes-service.js',
        '/services/data/financeurtypes-service.js',
        '/services/data/tariftypes-service.js',
        '/services/data/lieu-service.js',
        '/services/data/domaineformations-service.js',
        '/services/data/niveauformations-service.js',
    ]
);

var modulesList = Array.prototype.concat(
    libraries,
    listTable,
    [
        'services/data/modules-service.js',
        'modules/tables/modules-list-module.js'
    ]
);

var sessionsList = Array.prototype.concat(
    libraries,
    listTable,
    [
        'services/data/sessions-service.js',
        'services/tables/sessions-service.js',
        'modules/tables/sessions-list-module.js'
    ]
);

var formateursList = Array.prototype.concat(
    libraries,
    listTable,
    [
        'services/data/formateurs-service.js',
        'modules/tables/formateurs-list-module.js'
    ]
);

var financeursList = Array.prototype.concat(
    libraries,
    listTable,
    [
        'services/data/financeurs-service.js',
        'modules/tables/financeurs-list-module.js'
    ]
);

var employeursList = Array.prototype.concat(
    libraries,
    listTable,
    [
        'services/data/employeurs-service.js',
        'modules/tables/employeurs-list-module.js'
    ]
);

var stagiairesList = Array.prototype.concat(
    libraries,
    listTable,
    [
        'services/data/stagiaires-service.js',
        'modules/tables/stagiaires-list-module.js'
    ]
);

var inscriptionsList = Array.prototype.concat(
    libraries,
    listTable,
    [
        'services/data/inscriptions-service.js',
        'services/tables/inscriptions-service.js',
        'modules/tables/inscriptions-list-module.js'
    ]
);

var financeurInscriptionsList = Array.prototype.concat(
    libraries,
    editableTable,
    [
        'services/data/financeurinscriptions-service.js',
        'services/data/financeurs-service.js',
        'services/tables/financeurinscriptions-service.js',
        'modules/tables/financeurinscriptions-list-module.js'
    ]
);

var preinscriptionsList = Array.prototype.concat(
    libraries,
    listTable,
    [
        'services/data/preinscriptions-service.js',
        'services/tables/preinscriptions-service.js',
        'services/tables/preinscriptions-service.js',
        'modules/tables/preinscriptions-list-module.js'
    ]
);

var moduleDetail = Array.prototype.concat(
    libraries,
    detail,
    [
        'services/data/modules-service.js',
        'services/data/domaineformations-service.js',
        'services/data/formateurs-service.js',
        'services/data/lieu-service.js',
        'services/details/moduledetail-service.js',
        'modules/details/module-detail-module.js'
    ],
    /** Sub-objects */
    editableTable,
    [
        //Tarifs
        'services/data/tarifs-service.js',
        'services/data/tariftypes-service.js',
        'services/tables/tarifs-service.js',
        'modules/tables/tarifs-list-module.js'
    ],
    /** Related objects */
    sessionsList
);

var sessionDetail = Array.prototype.concat(
    libraries,
    detail,
    [
        'services/data/sessions-service.js',
        'services/data/modules-service.js',
        'services/details/sessiondetail-service.js',
        'modules/details/session-detail-module.js'
    ],
    /** Sub-objects */
    editableTable,
    [
        //SessionJours
        'services/data/sessionjours-service.js',
        'services/data/formateurs-service.js',
        'services/data/lieu-service.js',
        'services/tables/sessionjours-service.js',
        'modules/tables/sessionjours-list-module.js'
    ],
    /** Related objects */
    inscriptionsList
);

var formateurDetail = Array.prototype.concat(
    libraries,
    detail,
    [
        'services/data/formateurs-service.js',
        'services/data/formateurtypes-service.js',
        'services/details/formateurdetail-service.js',
        'modules/details/formateur-detail-module.js'
    ]
);

var financeurDetail = Array.prototype.concat(
    libraries,
    detail,
    [
        'services/data/financeurs-service.js',
        'services/data/financeurtypes-service.js',
        'services/details/financeurdetail-service.js',
        'modules/details/financeur-detail-module.js'
    ]
);

var employeurDetail = Array.prototype.concat(
    libraries,
    detail,
    [
        'services/data/employeurs-service.js',
        'services/details/employeurdetail-service.js',
        'modules/details/employeur-detail-module.js'
    ]    
);

var stagiaireDetail = Array.prototype.concat(
    libraries,
    detail,
    [
        'services/data/stagiaires-service.js',
        'services/data/stagiairetypes-service.js',
        'services/data/employeurs-service.js',
        'services/data/niveauformations-service.js',
        'services/details/stagiairedetail-service.js',
        'modules/details/stagiaire-detail-module.js'

    ],
    /** Related objects */
    inscriptionsList
);

var inscriptionDetail = Array.prototype.concat(
    libraries,
    detail,
    [
        'services/data/inscriptions-service.js',
        'services/data/stagiaires-service.js',
        'services/data/sessions-service.js',
        'services/details/inscriptiondetail-service.js',
        'modules/details/inscription-detail-module.js'
    ],
    /** Sub-objects */
    financeurInscriptionsList
);


var preinscription = Array.prototype.concat(
    libraries,
    [
        'vendor/angular-ui-select/dist/select.min.js',
        'vendor/angular-sanitize/angular-sanitize.min.js',
        'vendor/angular-animate/angular-animate.min.js',
        'vendor/angular-auto-validate/dist/jcs-auto-validate.min.js',
        'autovalidate/errorMessageResolver.js',
        'autovalidate/elementModifier.js',
        'directives/recommended-directive.js',
        'directives/datepickerlocaldate-directive.js',
        'services/data/preinscriptions-service.js',
        'services/data/niveauformations-service.js',
        'services/data/sessions-service.js',
        'controllers/preinscriptions-controller.js',
        'app/preinscriptionsPublicApp.js'
    ]
);

var home = Array.prototype.concat(
    libraries
);

elixir(function(mix) {
    mix
        .less('app.less')
        .less('print/emargement.less')
        .less('print/suivi-session.less')

        .scripts(array_unique(Array.prototype.concat(
            parametres,
            ['app/parametresApp.js']
        )), 'public/js/parametres.js')
        .scripts(array_unique(Array.prototype.concat(
            modulesList,
            ['app/modulesApp.js']
        )), 'public/js/modules-list.js')
        .scripts(array_unique(Array.prototype.concat(
            sessionsList,
            ['app/sessionsApp.js']
        )), 'public/js/sessions-list.js')
        .scripts(array_unique(Array.prototype.concat(
            formateursList,
            ['app/formateursApp.js']
        )), 'public/js/formateurs-list.js')
        .scripts(array_unique(Array.prototype.concat(
            financeursList,
            ['app/financeursApp.js']
        )), 'public/js/financeurs-list.js')
        .scripts(array_unique(Array.prototype.concat(
            employeursList,
            ['app/employeursApp.js']
        )), 'public/js/employeurs-list.js')
        .scripts(array_unique(Array.prototype.concat(
            stagiairesList,
            ['app/stagiairesApp.js']
        )), 'public/js/stagiaires-list.js')
        .scripts(array_unique(Array.prototype.concat(
            inscriptionsList,
            ['app/inscriptionsApp.js']
        )), 'public/js/inscriptions-list.js')
        .scripts(array_unique(Array.prototype.concat(
            preinscriptionsList,
            ['app/preinscriptionsApp.js']
        )), 'public/js/preinscriptions-list.js')
        .scripts(array_unique(Array.prototype.concat(
            moduleDetail,
            ['app/moduleDetailApp.js']
        )), 'public/js/modules-detail.js')
        .scripts(array_unique(Array.prototype.concat(
            sessionDetail,
            ['app/sessionDetailApp.js']
        )), 'public/js/sessions-detail.js')
        .scripts(array_unique(Array.prototype.concat(
            formateurDetail,
            ['app/formateurDetailApp.js']
        )), 'public/js/formateurs-detail.js')
        .scripts(array_unique(Array.prototype.concat(
            financeurDetail,
            ['app/financeurDetailApp.js']
        )), 'public/js/financeurs-detail.js')
        .scripts(array_unique(Array.prototype.concat(
            employeurDetail,
            ['app/employeurDetailApp.js']
        )), 'public/js/employeurs-detail.js')
        .scripts(array_unique(Array.prototype.concat(
            stagiaireDetail,
            ['app/stagiaireDetailApp.js']
        )), 'public/js/stagiaires-detail.js')
        .scripts(array_unique(Array.prototype.concat(
            inscriptionDetail,
            ['app/inscriptionDetailApp.js']
        )), 'public/js/inscriptions-detail.js')
        .scripts(preinscription, 'public/js/preinscriptions.js')
        .scripts(home, 'public/js/home.js')

});

elixir.Task.find('less').watch('resources/assets/less/**/');
