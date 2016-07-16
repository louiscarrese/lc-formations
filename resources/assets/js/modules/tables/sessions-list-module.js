angular.module('sessionsList', ['ngResource', 'listTable'])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('sessionsTableService', ['$filter', 'sharedDataService', sessionsTableServiceFactory])
    .controller('sessionsListController', ['$filter', '$attrs', 'sessionsService', 'sessionsTableService', editableTableController])
;
