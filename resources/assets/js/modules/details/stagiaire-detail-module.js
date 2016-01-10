angular.module('stagiaireDetail', ['detail', 'ngResource'])
    .factory('stagiairesService', ['$resource', stagiairesServiceFactory])
    .factory('employeursService', ['$resource', employeursServiceFactory])
    .factory('stagiaireTypesService', ['$resource', stagiaireTypesServiceFactory])
    .factory('stagiaireDetailService', ['sharedDataService', 'stagiaireTypesService', 'employeursService', stagiaireDetailServiceFactory])
    .controller('detailController', ['editModeService', 'stagiairesService', 'stagiaireDetailService', detailController])
;
