angular.module('modulesDetailServices', ['ngResource'])
    .factory('modulesService', ['$resource', modulesServiceFactory])
    .factory('domaineFormationsService', ['$resource', domaineFormationsServiceFactory])
    .factory('formateursService', ['$resource', formateursServiceFactory])
    .factory('tarifsService', ['$resource', tarifsServiceFactory])
    .factory('tarifTypesService', ['$resource', tarifTypesServiceFactory])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('sharedDataService', [sharedDataServiceFactory])
    .factory('editModeService', [editModeServiceFactory])
    .factory('moduleDetailService', ['sharedDataService', 'domaineFormationsService', 'formateursService', moduleDetailServiceFactory])
    .factory('tarifsTableService', ['sharedDataService', 'tarifTypesService', tarifsTableServiceFactory])
    .factory('sessionsTableService', ['sharedDataService', sessionsTableServiceFactory])
;

angular.module('modulesDetailControllers', [])
        .controller('detailController', ['editModeService', 'modulesService', 'moduleDetailService', detailController])
        .controller('tarifsController', ['$filter', 'tarifsService', 'tarifsTableService', editableTableController])
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
    .directive('myEditableMultiselect', myEditableDirectiveMultiselect)
    .directive('mySortableHeader', mySortableHeaderDirective)
    .directive('myForceInteger', myForceIntegerDirective)
    .directive('datepickerLocaldate', datepickerLocaldate)
;

//Le module principal
angular.module('modulesDetailApp', 
    ['modulesDetailControllers', 'modulesDetailServices', 'modulesDetailFilters', 'modulesDetailDirectives', 'ngMessages', 'rt.select2', 'ui.bootstrap'])
;
