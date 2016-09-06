angular.module('employeursList', ['ngResource', 'listTable'])
    .factory('employeursService', ['$resource', employeursServiceFactory])
    .controller('employeursListController', ['$filter', '$attrs', '$q', 'employeursService', editableTableController])
;
