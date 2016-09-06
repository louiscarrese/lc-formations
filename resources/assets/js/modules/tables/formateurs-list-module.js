angular.module('formateursList', ['ngResource', 'listTable'])
    .factory('formateursService', ['$resource', formateursServiceFactory])
    .controller('formateursListController', ['$filter', '$attrs', '$q', 'formateursService', editableTableController])
;
