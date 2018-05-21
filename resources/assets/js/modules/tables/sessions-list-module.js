angular.module('sessionsList', ['ngResource', 'listTable'])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('sessionsTableService', ['$filter', 'sharedDataService', sessionsTableServiceFactory])
    .controller('sessionsListController', ['$scope', '$filter', '$attrs', '$q', 'sessionsService', 'sessionsTableService', editableTableController])
;
