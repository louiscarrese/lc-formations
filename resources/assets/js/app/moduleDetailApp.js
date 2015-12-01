angular.module('modulesDetailServices', ['ngResource'])
    .factory('modulesService', ['$resource', modulesServiceFactory])
    .factory('domaineFormationsService', ['$resource', domaineFormationsServiceFactory])
    .factory('editModeService', ['$location', editModeServiceFactory])
;

angular.module('modulesDetailControllers', [])
        .controller('modulesDetailController', ['editModeService', 'modulesService', 'domaineFormationsService', moduleDetailController])
;

angular.module('modulesDetailFilters', [])
    .filter('myCustomFilter', myCustomFilter)
;

//Les directives
angular.module('modulesDetailDirectives', [])
    .directive('myEditable', myEditableDirective)
    .directive('mySortableHeader', mySortableHeaderDirective)
    .directive('myForceInteger', myForceIntegerDirective)
;

//Le module principal
angular.module('modulesDetailApp', 
    ['modulesDetailControllers', 'modulesDetailServices', 'modulesDetailFilters', 'modulesDetailDirectives'])
    .config(function($locationProvider){
        $locationProvider.html5Mode({enabled: true, requireBase: false});
    })
;

