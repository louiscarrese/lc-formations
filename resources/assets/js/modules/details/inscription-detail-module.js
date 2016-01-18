angular.module('inscriptionDetail', ['detail', 'ngResource', 'financeurInscriptionsList'])
    .factory('inscriptionsService', ['$resource', inscriptionsServiceFactory])
    .factory('stagiairesService', ['$resource', stagiairesServiceFactory])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('inscriptionDetailService', ['$filter', 'sharedDataService', 'stagiairesService', 'sessionsService', inscriptionDetailServiceFactory])
    .controller('detailController', ['editModeService', 'inscriptionsService', 'inscriptionDetailService', detailController])
;
