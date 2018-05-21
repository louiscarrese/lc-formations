angular.module('employeursList', ['ngResource', 'listTable'])
    .factory('employeursService', ['$resource', employeursServiceFactory])
    .controller('employeursListController', ['$scope', '$filter', '$attrs', '$q', 'employeursService', editableTableController])
;
