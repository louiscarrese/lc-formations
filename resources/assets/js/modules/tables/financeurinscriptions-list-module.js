angular.module('financeurInscriptionsList', ['editableTable', 'ngResource'])
    .factory('financeurInscriptionsService', ['$resource', financeurInscriptionsServiceFactory])
    .factory('financeursService', ['$resource', financeursServiceFactory])
    .factory('financeurInscriptionsTableService', ['sharedDataService', 'financeursService', financeurInscriptionsTableServiceFactory])
    .controller('financeurInscriptionsController', ['$filter', 'financeurInscriptionsService', 'financeurInscriptionsTableService', editableTableController])
;
