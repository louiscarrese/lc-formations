angular.module('stagiairesListServices', ['ngResource'])
    .factory('stagiairesService', ['$resource', stagiairesServiceFactory])
;

angular.module('stagiairesListControllers', [])
    .controller('stagiairesListController', ['$filter', 'stagiairesService', editableTableController])
;

angular.module('stagiairesListFilters', [])
    .filter('myCustomFilter', myCustomFilter)
;

//Les directives
angular.module('stagiairesListDirectives', [])
    .directive('mySortableHeader', mySortableHeaderDirective)

    ;

//Le module principal
angular.module('stagiairesListApp', 
    ['stagiairesListControllers', 'stagiairesListServices', 'stagiairesListFilters', 'stagiairesListDirectives', 'ngMessages']);
