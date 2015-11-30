//Les services
angular.module('parametresServices', ['ngResource'])
    .factory('stagiaireTypesService', ['$resource', stagiaireTypesServiceFactory])
    .factory('formateurTypesService', ['$resource', formateurTypesServiceFactory])
    .factory('financeurTypesService', ['$resource', financeurTypesServiceFactory])
    .factory('tarifTypesService', ['$resource', tarifTypesServiceFactory])
;
//Les controllers
angular.module('parametresControllers', [])
    .controller('stagiaireTypesController', ['$filter', 'stagiaireTypesService', editableTableController])
    .controller('formateurTypesController', ['$filter', 'formateurTypesService', editableTableController])
    .controller('financeurTypesController', ['$filter', 'financeurTypesService', editableTableController])
    .controller('tarifTypesController', ['$filter', 'tarifTypesService', editableTableController])
;

//Les filtres
angular.module('parametresFilters', [])
    .filter('myCustomFilter', myCustomFilter)
;

//Les directives
angular.module('parametresDirectives', [])
    .directive('myEditable', myEditableDirective)
    .directive('mySortableHeader', mySortableHeaderDirective)
    .directive('myForceInteger', myForceIntegerDirective)

    ;

//Le module principal
angular.module('parametresApp', 
    ['parametresControllers', 'parametresServices', 'parametresFilters', 'parametresDirectives']);

