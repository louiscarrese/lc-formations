angular.module('employeursListServices', ['ngResource'])
    .factory('employeursService', ['$resource', employeursServiceFactory])
;

angular.module('employeursListControllers', [])
    .controller('employeursListController', ['$filter', 'employeursService', editableTableController])
;

angular.module('employeursListFilters', [])
    .filter('myCustomFilter', myCustomFilter)
;

//Les directives
angular.module('employeursListDirectives', [])
    .directive('mySortableHeader', mySortableHeaderDirective)

    ;

//Le module principal
angular.module('employeursListApp', 
    ['employeursListControllers', 'employeursListServices', 'employeursListFilters', 'employeursListDirectives', 'ngMessages']);

