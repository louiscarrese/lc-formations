angular.module('sessionJoursList', ['editableTable', 'ngResource'])
    .factory('sessionJoursService', ['$resource', sessionJoursServiceFactory])
    .factory('formateursService', ['$resource', formateursServiceFactory])
    .factory('lieuService', ['$resource', lieuServiceFactory])
    .factory('sessionJoursTableService', ['$filter', 'sharedDataService', 'lieuService', 'formateursService', sessionJoursTableServiceFactory])
    .controller('sessionJoursController', ['$filter', '$attrs', '$q', 'sessionJoursService', 'sessionJoursTableService', editableTableController])
;
