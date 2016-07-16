angular.module('employeursList', ['ngResource', 'listTable'])
    .factory('employeursService', ['$resource', employeursServiceFactory])
    .controller('employeursListController', ['$filter', '$attrs', 'employeursService', editableTableController])
;
