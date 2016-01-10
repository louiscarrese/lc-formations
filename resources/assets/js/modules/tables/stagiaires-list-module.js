angular.module('stagiairesList', ['ngResource', 'listTable'])
    .factory('stagiairesService', ['$resource', stagiairesServiceFactory])
    .controller('stagiairesListController', ['$filter', 'stagiairesService', editableTableController])
;
