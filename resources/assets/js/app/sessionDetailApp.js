angular.module('sessionsDetailServices', ['ngResource'])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('sessionJoursService', ['$resource', sessionJoursServiceFactory])
    .factory('modulesService', ['$resource', modulesServiceFactory])
    .factory('formateursService', ['$resource', formateursServiceFactory])
    .factory('sessionDetailService', ['sharedDataService', 'modulesService', sessionDetailServiceFactory])
    .factory('lieuService', ['$resource', lieuServiceFactory])
    .factory('editModeService', [editModeServiceFactory])
    .factory('sharedDataService', [sharedDataServiceFactory])
    .factory('sessionJoursTableService', ['sharedDataService', 'lieuService', 'formateursService', sessionJoursTableServiceFactory])
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
    .directive('myEditableText', myEditableDirectiveText)
    .directive('myEditableInteger', myEditableDirectiveInteger)
    .directive('myEditableTextarea', myEditableDirectiveTextarea)
    .directive('myEditableCheckbox', myEditableDirectiveCheckbox)
    .directive('myEditableDropdown', myEditableDirectiveDropdown)
    .directive('myEditableRadio', myEditableDirectiveRadio)
    .directive('myEditableMultiselect', myEditableDirectiveMultiselect)
    .directive('mySortableHeader', mySortableHeaderDirective)
    .directive('myForceInteger', myForceIntegerDirective)
;

//Le module principal
angular.module('sessionsDetailApp', 
    ['sessionsDetailControllers', 'sessionsDetailServices', 'sessionsDetailFilters', 'sessionsDetailDirectives', 'ngMessages', 'rt.select2'])
;
