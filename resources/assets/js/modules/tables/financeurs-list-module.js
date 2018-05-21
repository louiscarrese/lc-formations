angular.module('financeursList', ['ngResource', 'listTable'])
    .factory('financeursService', ['$resource', financeursServiceFactory])
    .controller('financeursListController', ['$scope', '$filter', '$attrs', '$q', 'financeursService', editableTableController])
;
