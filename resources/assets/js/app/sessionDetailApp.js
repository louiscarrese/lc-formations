angular.module('sessionsDetailServices', ['ngResource'])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('modulesService', ['$resource', modulesServiceFactory])
    .factory('sessionDetailService', ['modulesService', sessionDetailServiceFactory])
    .factory('editModeService', [editModeServiceFactory])
;

angular.module('sessionsDetailControllers', [])
        .controller('detailController', ['editModeService', 'sessionsService', 'sessionDetailService', detailController])
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
    ['sessionsDetailControllers', 'sessionsDetailServices', 'sessionsDetailFilters', 'sessionsDetailDirectives'])
;

