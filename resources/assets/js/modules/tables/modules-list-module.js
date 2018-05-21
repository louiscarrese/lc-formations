angular.module('modulesList', ['ngResource', 'listTable'])
    .factory('modulesService', ['$resource', modulesServiceFactory])
    .controller('modulesListController', ['$scope', '$filter', '$attrs', '$q', 'modulesService', editableTableController])
;
