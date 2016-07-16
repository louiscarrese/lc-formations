angular.module('financeursList', ['ngResource', 'listTable'])
    .factory('financeursService', ['$resource', financeursServiceFactory])
    .controller('financeursListController', ['$filter', '$attrs', 'financeursService', editableTableController])
;
