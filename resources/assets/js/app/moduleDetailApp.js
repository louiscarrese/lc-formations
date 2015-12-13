angular.module('modulesDetailServices', ['ngResource'])
    .factory('modulesService', ['$resource', modulesServiceFactory])
    .factory('domaineFormationsService', ['$resource', domaineFormationsServiceFactory])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('sharedDataService', [sharedDataServiceFactory])
    .factory('editModeService', [editModeServiceFactory])
    .factory('moduleDetailService', ['sharedDataService', 'domaineFormationsService', moduleDetailServiceFactory])
    .factory('sessionsTableService', ['sharedDataService', sessionsTableServiceFactory])
;

angular.module('modulesDetailControllers', [])
        .controller('detailController', ['editModeService', 'modulesService', 'moduleDetailService', detailController])
        .controller('sessionsListController', ['$filter', 'sessionsService', 'sessionsTableService', editableTableController])
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
    ['modulesDetailControllers', 'modulesDetailServices', 'modulesDetailFilters', 'modulesDetailDirectives', 'ngMessages'])
;
