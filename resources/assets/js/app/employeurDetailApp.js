angular.module('employeursDetailServices', ['ngResource'])
    .factory('employeursService', ['$resource', employeursServiceFactory])
    .factory('sharedDataService', [sharedDataServiceFactory])
    .factory('editModeService', [editModeServiceFactory])
    .factory('employeurDetailService', ['sharedDataService', employeurDetailServiceFactory])
;

angular.module('employeursDetailControllers', [])
        .controller('detailController', ['editModeService', 'employeursService', 'employeurDetailService', detailController])
;

angular.module('employeursDetailFilters', [])
;

//Les directives
angular.module('employeursDetailDirectives', [])
    .directive('myEditableText', myEditableDirectiveText)
    .directive('myEditableInteger', myEditableDirectiveInteger)
    .directive('myEditableTextarea', myEditableDirectiveTextarea)
    .directive('myEditableCheckbox', myEditableDirectiveCheckbox)
    .directive('myEditableDropdown', myEditableDirectiveDropdown)
    .directive('myEditableRadio', myEditableDirectiveRadio)
    .directive('myForceInteger', myForceIntegerDirective)
;

//Le module principal
angular.module('employeursDetailApp', 
    ['employeursDetailControllers', 'employeursDetailServices', 'employeursDetailFilters', 'employeursDetailDirectives', 'ngMessages', 'rt.select2'])
;
