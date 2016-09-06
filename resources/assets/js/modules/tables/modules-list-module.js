angular.module('modulesList', ['ngResource', 'listTable'])
    .factory('modulesService', ['$resource', modulesServiceFactory])
    .controller('modulesListController', ['$filter', '$attrs', '$q', 'modulesService', editableTableController])
;
