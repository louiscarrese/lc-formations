angular.module('homeApp', ['ngResource', 'listTable'])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('sessionsTableService', ['$filter', 'sharedDataService', sessionsTableServiceFactory])

    .controller('sessionsListController', ['$filter', '$attrs', 'sessionsService', 'sessionsTableService', editableTableController])

    .factory('inscriptionsService', ['$resource', inscriptionsServiceFactory])
    .factory('inscriptionsTableService', ['$filter', 'sharedDataService', inscriptionsTableServiceFactory])

    .controller('inscriptionsListController', ['$filter', '$attrs', 'inscriptionsService', 'sessionsTableService', editableTableController])
;