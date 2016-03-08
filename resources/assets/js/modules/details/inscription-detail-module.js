angular.module('inscriptionDetail', ['detail', 'ngResource', 'financeurInscriptionsList'])
    .factory('inscriptionsService', ['$resource', inscriptionsServiceFactory])
    .factory('stagiairesService', ['$resource', stagiairesServiceFactory])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('inscriptionDetailService', ['sharedDataService', 'stagiairesService', 'sessionsService', '$filter', '$q', inscriptionDetailServiceFactory])
    .controller('detailController', ['editModeService', 'inscriptionsService', 'inscriptionDetailService', '$q', detailController])
;
