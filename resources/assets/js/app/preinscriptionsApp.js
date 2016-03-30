angular.module('preinscriptionsApp', ['ngResource', 'ngAnimate', 'ui.bootstrap', 'ui.select', 'ngSanitize', 'jcs-autoValidate'])
    .factory('preinscriptionsService', ['$resource', preinscriptionsServiceFactory])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('niveauFormationsService', ['$resource', niveauFormationsServiceFactory])


    .controller('preinscriptionsController', ['$filter', '$uibModal', 'sessionsService', 'preinscriptionsService', preinscriptionsController])
    
    .directive('recommended', recommendedDirective)

    .config(function(uiSelectConfig) {
        uiSelectConfig.theme = 'bootstrap';
    })

    .factory('elementModifier', [elementModifier])
    .run([
        'validator',
        'elementModifier',
        function (validator, elementModifier) {
            validator.registerDomModifier(elementModifier.key, elementModifier);
            validator.setDefaultElementModifier(elementModifier.key);
        }
    ]);
