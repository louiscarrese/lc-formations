angular.module('inscriptionsList', ['ngResource', 'listTable'])
    .factory('inscriptionsService', ['$resource', inscriptionsServiceFactory])
    .controller('inscriptionsListController', ['$filter', 'inscriptionsService', editableTableController])
;
