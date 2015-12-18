angular.module('modulesDetailServices', ['ngResource'])
    .factory('modulesService', ['$resource', modulesServiceFactory])
    .factory('domaineFormationsService', ['$resource', domaineFormationsServiceFactory])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('sharedDataService', [sharedDataServiceFactory])
    .factory('editModeService', [editModeServiceFactory])
    .factory('dateTimeService', [dateTimeServiceFactory])
    .factory('moduleDetailService', ['sharedDataService', 'domaineFormationsService', 'dateTimeService', moduleDetailServiceFactory])
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
    .directive('myEditableText', myEditableDirectiveText)
    .directive('myEditableInteger', myEditableDirectiveInteger)
    .directive('myEditableTime', ['$filter', myEditableDirectiveTime])
    .directive('myEditableTextarea', myEditableDirectiveTextarea)
    .directive('myEditableCheckbox', myEditableDirectiveCheckbox)
    .directive('myEditableDropdown', myEditableDirectiveDropdown)
    .directive('myEditableRadio', myEditableDirectiveRadio)
    .directive('mySortableHeader', mySortableHeaderDirective)
    .directive('myForceInteger', myForceIntegerDirective)
;

//Le module principal
angular.module('modulesDetailApp', 
    ['modulesDetailControllers', 'modulesDetailServices', 'modulesDetailFilters', 'modulesDetailDirectives', 'ngMessages', 'rt.select2', 'ui.bootstrap'])
;
