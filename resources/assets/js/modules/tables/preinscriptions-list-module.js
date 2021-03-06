angular.module('preinscriptionsList', ['ngResource', 'listTable'])
    .factory('preinscriptionsService', ['$resource', preinscriptionsServiceFactory])
    .factory('preinscriptionsTableService', ['$filter', 'sharedDataService', preinscriptionsTableServiceFactory])
    .controller('preinscriptionsListController', ['$scope', '$filter', '$attrs', '$q', 'preinscriptionsService', 'preinscriptionsTableService', editableTableController])
;
