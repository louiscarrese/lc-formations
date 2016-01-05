angular.module('financeursListServices', ['ngResource'])
    .factory('financeursService', ['$resource', financeursServiceFactory])
;

angular.module('financeursListControllers', [])
    .controller('financeursListController', ['$filter', 'financeursService', editableTableController])
;

angular.module('financeursListFilters', [])
    .filter('myCustomFilter', myCustomFilter)
;

//Les directives
angular.module('financeursListDirectives', [])
    .directive('mySortableHeader', mySortableHeaderDirective)

    ;

//Le module principal
angular.module('financeursListApp', 
    ['financeursListControllers', 'financeursListServices', 'financeursListFilters', 'financeursListDirectives', 'ngMessages']);
