angular.module('inscriptionsList', ['ngResource', 'listTable'])
    .factory('inscriptionsService', ['$resource', inscriptionsServiceFactory])
    .factory('inscriptionsTableService', ['sharedDataService', inscriptionsTableServiceFactory])
    .controller('inscriptionsListController', ['$filter', 'inscriptionsService', 'inscriptionsTableService', editableTableController])
;
