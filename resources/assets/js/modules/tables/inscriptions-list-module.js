angular.module('inscriptionsList', ['ngResource', 'listTable'])
    .factory('inscriptionsService', ['$resource', inscriptionsServiceFactory])
    .factory('inscriptionsTableService', ['$filter', 'sharedDataService', inscriptionsTableServiceFactory])
    .controller('inscriptionsListController', ['$filter', '$attrs', '$q', 'inscriptionsService', 'inscriptionsTableService', editableTableController])
;
