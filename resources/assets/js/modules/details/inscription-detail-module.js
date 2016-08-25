angular.module('inscriptionDetail', ['detail', 'ngResource', 'financeurInscriptionsList', 'myEditable', 'ui.bootstrap'])
    .factory('inscriptionsService', ['$resource', inscriptionsServiceFactory])
    .factory('stagiairesService', ['$resource', stagiairesServiceFactory])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('inscriptionDetailService', ['sharedDataService', 'stagiairesService', 'sessionsService', '$filter', '$q', '$uibModal', inscriptionDetailServiceFactory])
    .controller('detailController', ['editModeService', 'inscriptionsService', 'inscriptionDetailService', '$q', detailController])
;
