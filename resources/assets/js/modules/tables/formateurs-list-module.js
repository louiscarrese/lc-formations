angular.module('formateursList', ['ngResource', 'listTable'])
    .factory('formateursService', ['$resource', formateursServiceFactory])
    .controller('formateursListController', ['$filter', 'formateursService', editableTableController])
;