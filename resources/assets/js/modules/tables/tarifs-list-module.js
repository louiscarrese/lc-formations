angular.module('tarifsList', ['ngResource', 'editableTable'])
    .factory('tarifsService', ['$resource', tarifsServiceFactory])
    .factory('tarifTypesService', ['$resource', tarifTypesServiceFactory])
    .factory('tarifsTableService', ['sharedDataService', 'tarifTypesService', tarifsTableServiceFactory])
    .controller('tarifsController', ['$filter', '$attrs', '$q', 'tarifsService', 'tarifsTableService', editableTableController])
;
