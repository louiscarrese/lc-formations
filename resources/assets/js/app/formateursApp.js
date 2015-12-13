angular.module('formateursListServices', ['ngResource'])
    .factory('formateursService', ['$resource', formateursServiceFactory])
;

angular.module('formateursListControllers', [])
    .controller('formateursListController', ['$filter', 'formateursService', editableTableController])
;

angular.module('formateursListFilters', [])
    .filter('myCustomFilter', myCustomFilter)
;

//Les directives
angular.module('formateursListDirectives', [])
    .directive('myEditable', myEditableDirective)
    .directive('mySortableHeader', mySortableHeaderDirective)
    .directive('myForceInteger', myForceIntegerDirective)

    ;

//Le module principal
angular.module('formateursListApp', 
    ['formateursListControllers', 'formateursListServices', 'formateursListFilters', 'formateursListDirectives', 'ngMessages']);

