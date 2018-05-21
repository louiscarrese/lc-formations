angular.module('stagiaireDetail', ['detail', 'ngResource', 'myEditable'])
    .factory('stagiairesService', ['$resource', stagiairesServiceFactory])
    .factory('employeursService', ['$resource', employeursServiceFactory])
    .factory('stagiaireTypesService', ['$resource', stagiaireTypesServiceFactory])
    .factory('niveauFormationsService', ['$resource', niveauFormationsServiceFactory])
    .factory('stagiaireDetailService', ['sharedDataService', 'stagiaireTypesService', 'employeursService', 'niveauFormationsService', stagiaireDetailServiceFactory])
    .controller('detailController', ['editModeService', 'stagiairesService', 'stagiaireDetailService', '$q', '$rootScope', detailController])
;
