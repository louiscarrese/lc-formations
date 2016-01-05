angular.module('inscriptionsListServices', ['ngResource'])
    .factory('inscriptionsService', ['$resource', inscriptionsServiceFactory])
;

angular.module('inscriptionsListControllers', [])
    .controller('inscriptionsListController', ['$filter', 'inscriptionsService', editableTableController])
;

angular.module('inscriptionsListFilters', [])
    .filter('myCustomFilter', myCustomFilter)
;

//Les directives
angular.module('inscriptionsListDirectives', [])
    .directive('mySortableHeader', mySortableHeaderDirective)

    ;

//Le module principal
angular.module('inscriptionsListApp', 
    ['inscriptionsListControllers', 'inscriptionsListServices', 'inscriptionsListFilters', 'inscriptionsListDirectives', 'ngMessages']);

