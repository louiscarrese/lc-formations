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
;

//Les directives
angular.module('formateursDetailDirectives', [])
    .directive('myEditableText', myEditableDirectiveText)
    .directive('myEditableInteger', myEditableDirectiveInteger)
    .directive('myEditableTextarea', myEditableDirectiveTextarea)
    .directive('myEditableCheckbox', myEditableDirectiveCheckbox)
    .directive('myEditableDropdown', myEditableDirectiveDropdown)
    .directive('myEditableRadio', myEditableDirectiveRadio)
    .directive('myEditableDate', myEditableDirectiveDate)
    .directive('myForceInteger', myForceIntegerDirective)
    .directive('datepickerLocaldate', datepickerLocaldate)
;

//Le module principal
angular.module('formateursDetailApp', 
    ['formateursDetailControllers', 'formateursDetailServices', 'formateursDetailFilters', 'formateursDetailDirectives', 'ngMessages', 'rt.select2', 'ui.bootstrap'])
;
