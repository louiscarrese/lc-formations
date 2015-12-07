angular.module('modulesDetailServices', ['ngResource'])
    .factory('modulesService', ['$resource', modulesServiceFactory])
    .factory('domaineFormationsService', ['$resource', domaineFormationsServiceFactory])
    .factory('moduleDetailService', ['domaineFormationsService', moduleDetailServiceFactory])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('editModeService', [editModeServiceFactory])
;

angular.module('modulesDetailControllers', [])
        .controller('detailController', ['editModeService', 'modulesService', 'moduleDetailService', detailController])
        .controller('sessionsTableController', ['$filter', 'sessionsService', editableTableController])
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

