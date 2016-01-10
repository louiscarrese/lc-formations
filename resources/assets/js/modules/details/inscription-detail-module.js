angular.module('inscriptionDetail', ['detail', 'ngResource'])
    .factory('inscriptionsService', ['$resource', inscriptionsServiceFactory])
    .factory('stagiairesService', ['$resource', stagiairesServiceFactory])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('inscriptionDetailService', ['sharedDataService', 'stagiairesService', 'sessionsService', inscriptionDetailServiceFactory])
    .controller('detailController', ['editModeService', 'inscriptionsService', 'inscriptionDetailService', detailController])
;
