angular.module('financeurDetail', ['detail', 'ngResource', 'myEditable'])
    .factory('financeursService', ['$resource', financeursServiceFactory])
    .factory('financeurTypesService', ['$resource', financeurTypesServiceFactory])
    .factory('financeurDetailService', ['sharedDataService', 'financeurTypesService', financeurDetailServiceFactory])
    .controller('detailController', ['editModeService', 'financeursService', 'financeurDetailService', '$q', '$rootScope', detailController])
;
