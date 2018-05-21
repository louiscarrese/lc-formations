angular.module('stagiairesList', ['ngResource', 'listTable'])
    .factory('stagiairesService', ['$resource', stagiairesServiceFactory])
    .controller('stagiairesListController', ['$scope', '$filter', '$attrs', '$q', 'stagiairesService', editableTableController])
;
