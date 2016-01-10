angular.module('modulesList', ['ngResource', 'listTable'])
    .factory('modulesService', ['$resource', modulesServiceFactory])
    .controller('modulesListController', ['$filter', 'modulesService', editableTableController])
;
