angular.module('sessionJoursList', ['editableTable', 'ngResource'])
    .factory('sessionJoursService', ['$resource', sessionJoursServiceFactory])
    .factory('formateursService', ['$resource', formateursServiceFactory])
    .factory('lieuService', ['$resource', lieuServiceFactory])
    .factory('sessionJoursTableService', ['sharedDataService', 'lieuService', 'formateursService', sessionJoursTableServiceFactory])
    .controller('sessionJoursController', ['$filter', 'sessionJoursService', 'sessionJoursTableService', editableTableController])
;
