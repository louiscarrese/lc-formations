angular.module('stagiairesList', ['ngResource', 'listTable'])
    .factory('stagiairesService', ['$resource', stagiairesServiceFactory])
    .controller('stagiairesListController', ['$filter', '$attrs', 'stagiairesService', editableTableController])
;
