angular.module('inscriptionsDetailServices', ['ngResource'])
    .factory('inscriptionsService', ['$resource', inscriptionsServiceFactory])
    .factory('stagiairesService', ['$resource', stagiairesServiceFactory])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('sharedDataService', [sharedDataServiceFactory])
    .factory('editModeService', [editModeServiceFactory])
    .factory('inscriptionDetailService', ['sharedDataService', 'stagiairesService', 'sessionsService', inscriptionDetailServiceFactory])
;

angular.module('inscriptionsDetailControllers', [])
        .controller('detailController', ['editModeService', 'inscriptionsService', 'inscriptionDetailService', detailController])
;

angular.module('inscriptionsDetailFilters', [])
    .filter('myCustomFilter', myCustomFilter)
;

//Les directives
angular.module('inscriptionsDetailDirectives', [])
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
angular.module('inscriptionsDetailApp', 
    ['inscriptionsDetailControllers', 'inscriptionsDetailServices', 'inscriptionsDetailFilters', 'inscriptionsDetailDirectives', 'ngMessages', 'rt.select2'])
;
