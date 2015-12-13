angular.module('sessionsDetailServices', ['ngResource'])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('sessionJoursService', ['$resource', sessionJoursServiceFactory])
    .factory('modulesService', ['$resource', modulesServiceFactory])
    .factory('sessionDetailService', ['sharedDataService', 'modulesService', sessionDetailServiceFactory])
    .factory('lieuService', ['$resource', lieuServiceFactory])
    .factory('editModeService', [editModeServiceFactory])
    .factory('sharedDataService', [sharedDataServiceFactory])
    .factory('sessionJoursTableService', ['sharedDataService', 'lieuService', sessionJoursTableServiceFactory])
;

angular.module('sessionsDetailControllers', [])
        .controller('detailController', ['editModeService', 'sessionsService', 'sessionDetailService', detailController])
        .controller('sessionJoursController', ['$filter', 'sessionJoursService', 'sessionJoursTableService', editableTableController])
;

angular.module('sessionsDetailFilters', [])
    .filter('myCustomFilter', myCustomFilter)
;

//Les directives
angular.module('sessionsDetailDirectives', [])
    .directive('myEditable', myEditableDirective)
    .directive('mySortableHeader', mySortableHeaderDirective)
    .directive('myForceInteger', myForceIntegerDirective)
;

//Le module principal
angular.module('sessionsDetailApp', 
    ['sessionsDetailControllers', 'sessionsDetailServices', 'sessionsDetailFilters', 'sessionsDetailDirectives', 'ngMessages'])
;

