angular.module('sessionsList', ['ngResource', 'listTable'])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('sessionsTableService', ['sharedDataService', sessionsTableServiceFactory])
    .controller('sessionsListController', ['$filter', 'sessionsService', 'sessionsTableService', editableTableController])
;
