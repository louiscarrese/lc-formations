angular.module('formateursDetailServices', ['ngResource'])
    .factory('formateursService', ['$resource', formateursServiceFactory])
    .factory('formateurTypesService', ['$resource', formateurTypesServiceFactory])
    .factory('sharedDataService', [sharedDataServiceFactory])
    .factory('editModeService', [editModeServiceFactory])
    .factory('formateurDetailService', ['sharedDataService', 'formateurTypesService', formateurDetailServiceFactory])
;

angular.module('formateursDetailControllers', [])
        .controller('detailController', ['editModeService', 'formateursService', 'formateurDetailService', detailController])
;

angular.module('formateursDetailFilters', [])
    .filter('myCustomFilter', myCustomFilter)
;

//Les directives
angular.module('formateursDetailDirectives', [])
    .directive('myEditable', myEditableDirective)
    .directive('mySortableHeader', mySortableHeaderDirective)
    .directive('myForceInteger', myForceIntegerDirective)
;

//Le module principal
angular.module('formateursDetailApp', 
    ['formateursDetailControllers', 'formateursDetailServices', 'formateursDetailFilters', 'formateursDetailDirectives', 'ngMessages'])
;
