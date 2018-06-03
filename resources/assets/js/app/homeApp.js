angular.module('homeApp', ['ngResource', 'listTable'])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('sessionsTableService', ['$filter', 'sharedDataService', sessionsTableServiceFactory])

    .controller('sessionsListController', ['$scope', '$filter', '$attrs', '$q', 'sessionsService', 'sessionsTableService', editableTableController])

    .factory('inscriptionsService', ['$resource', inscriptionsServiceFactory])
    .factory('inscriptionsTableService', ['$filter', 'sharedDataService', inscriptionsTableServiceFactory])

    .controller('inscriptionsListController', ['$scope', '$filter', '$attrs', '$q', 'inscriptionsService', 'inscriptionsTableService', editableTableController])
;
