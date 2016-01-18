angular.module('inscriptionDetail', ['detail', 'ngResource', 'financeurInscriptionsList'])
    .factory('inscriptionsService', ['$resource', inscriptionsServiceFactory])
    .factory('stagiairesService', ['$resource', stagiairesServiceFactory])
    .factory('sessionsService', ['$resource', '$http', '$filter', sessionsServiceFactory])
    .factory('inscriptionDetailService', ['sharedDataService', 'stagiairesService', 'sessionsService', inscriptionDetailServiceFactory])
    .controller('detailController', ['editModeService', 'inscriptionsService', 'inscriptionDetailService', detailController])
;
