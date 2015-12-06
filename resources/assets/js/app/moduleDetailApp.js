angular.module('modulesDetailServices', ['ngResource'])
    .factory('modulesService', ['$resource', modulesServiceFactory])
    .factory('domaineFormationsService', ['$resource', domaineFormationsServiceFactory])
    .factory('editModeService', [editModeServiceFactory])
    .factory('moduleDetailService', ['domaineFormationsService', moduleDetailServiceFactory])
;

angular.module('modulesDetailControllers', [])
        .controller('detailController', ['editModeService', 'modulesService', 'moduleDetailService', detailController])
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
;

