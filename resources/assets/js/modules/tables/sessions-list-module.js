angular.module('sessionsList', ['ngResource', 'listTable'])
    .factory('sessionsService', ['$resource', '$http', '$filter', sessionsServiceFactory])
    .factory('sessionsTableService', ['$filter', 'sharedDataService', sessionsTableServiceFactory])
    .controller('sessionsListController', ['$filter', 'sessionsService', 'sessionsTableService', editableTableController])
;
