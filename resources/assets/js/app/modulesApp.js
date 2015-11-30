angular.module('modulesListServices', ['ngResource'])
    .factory('modulesService', ['$resource', modulesServiceFactory])
;

angular.module('modulesListControllers', [])
    .controller('modulesListController', ['$filter', 'modulesService', editableTableController])
;

angular.module('modulesListFilters', [])
    .filter('myCustomFilter', myCustomFilter)
;

//Les directives
angular.module('modulesListDirectives', [])
    .directive('myEditable', myEditableDirective)
    .directive('mySortableHeader', mySortableHeaderDirective)
    .directive('myForceInteger', myForceIntegerDirective)

    ;

//Le module principal
angular.module('modulesListApp', 
    ['modulesListControllers', 'modulesListServices', 'modulesListFilters', 'modulesListDirectives']);

