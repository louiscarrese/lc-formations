angular.module('formateursList', ['ngResource', 'listTable'])
    .factory('formateursService', ['$resource', formateursServiceFactory])
    .controller('formateursListController', ['$scope', '$filter', '$attrs', '$q', 'formateursService', editableTableController])
;
