angular.module('stagiairesDetailServices', ['ngResource'])
    .factory('stagiairesService', ['$resource', stagiairesServiceFactory])
    .factory('stagiaireTypesService', ['$resource', stagiaireTypesServiceFactory])
    .factory('employeursService', ['$resource', employeursServiceFactory])
    .factory('inscriptionsService', ['$resource', inscriptionsServiceFactory])
    .factory('sharedDataService', [sharedDataServiceFactory])
    .factory('inscriptionsTableService', ['sharedDataService', inscriptionsTableServiceFactory])
    .factory('editModeService', [editModeServiceFactory])
    .factory('stagiaireDetailService', ['sharedDataService', 'stagiaireTypesService', 'employeursService', stagiaireDetailServiceFactory])
;

angular.module('stagiairesDetailControllers', [])
    .controller('detailController', ['editModeService', 'stagiairesService', 'stagiaireDetailService', detailController])
    .controller('inscriptionsListController', ['$filter', 'inscriptionsService', 'inscriptionsTableService', editableTableController])
;

angular.module('stagiairesDetailFilters', [])
    .filter('myCustomFilter', myCustomFilter)
;

//Les directives
angular.module('stagiairesDetailDirectives', [])
    .directive('myEditableText', myEditableDirectiveText)
    .directive('myEditableInteger', myEditableDirectiveInteger)
    .directive('myEditableTextarea', myEditableDirectiveTextarea)
    .directive('myEditableCheckbox', myEditableDirectiveCheckbox)
    .directive('myEditableDropdown', myEditableDirectiveDropdown)
    .directive('myEditableRadio', myEditableDirectiveRadio)
    .directive('myEditableDate', myEditableDirectiveDate)
    .directive('mySortableHeader', mySortableHeaderDirective)
    .directive('myForceInteger', myForceIntegerDirective)
    .directive('datepickerLocaldate', datepickerLocaldate)
;

//Le module principal
angular.module('stagiairesDetailApp', 
    ['stagiairesDetailControllers', 'stagiairesDetailServices', 'stagiairesDetailFilters', 'stagiairesDetailDirectives', 'ngMessages', 'rt.select2', 'ui.bootstrap'])
;
