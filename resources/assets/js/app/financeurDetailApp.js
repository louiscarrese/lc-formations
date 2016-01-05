angular.module('financeursDetailServices', ['ngResource'])
    .factory('financeursService', ['$resource', financeursServiceFactory])
    .factory('financeurTypesService', ['$resource', financeurTypesServiceFactory])
    .factory('sharedDataService', [sharedDataServiceFactory])
    .factory('editModeService', [editModeServiceFactory])
    .factory('financeurDetailService', ['sharedDataService', 'financeurTypesService', financeurDetailServiceFactory])
;

angular.module('financeursDetailControllers', [])
        .controller('detailController', ['editModeService', 'financeursService', 'financeurDetailService', detailController])
;

angular.module('financeursDetailFilters', [])
    .filter('myCustomFilter', myCustomFilter)
;

//Les directives
angular.module('financeursDetailDirectives', [])
    .directive('myEditableText', myEditableDirectiveText)
    .directive('myEditableInteger', myEditableDirectiveInteger)
    .directive('myEditableTextarea', myEditableDirectiveTextarea)
    .directive('myEditableCheckbox', myEditableDirectiveCheckbox)
    .directive('myEditableDropdown', myEditableDirectiveDropdown)
    .directive('myEditableRadio', myEditableDirectiveRadio)
    .directive('mySortableHeader', mySortableHeaderDirective)
    .directive('myForceInteger', myForceIntegerDirective)
;

//Le module principal
angular.module('financeursDetailApp', 
    ['financeursDetailControllers', 'financeursDetailServices', 'financeursDetailFilters', 'financeursDetailDirectives', 'ngMessages', 'rt.select2'])
;
