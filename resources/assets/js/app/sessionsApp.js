angular.module('sessionsListServices', ['ngResource'])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
;

angular.module('sessionsListControllers', [])
    .controller('sessionsListController', ['$filter', 'sessionsService', editableTableController])
;

angular.module('sessionsListFilters', [])
    .filter('myCustomFilter', myCustomFilter)
;

//Les directives
angular.module('sessionsListDirectives', [])
    .directive('myEditable', myEditableDirective)
    .directive('mySortableHeader', mySortableHeaderDirective)
    .directive('myForceInteger', myForceIntegerDirective)

    ;

//Le module principal
angular.module('sessionsListApp', 
    ['sessionsListControllers', 'sessionsListServices', 'sessionsListFilters', 'sessionsListDirectives', 'ngMessages']);

