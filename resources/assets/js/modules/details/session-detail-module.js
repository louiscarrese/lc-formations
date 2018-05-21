angular.module('sessionDetail', ['detail', 'myEditable'])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('modulesService', ['$resource', modulesServiceFactory])
    .factory('formateursService', ['$resource', formateursServiceFactory])
    .factory('sessionDetailService', ['sharedDataService', 'modulesService', '$filter', '$uibModal', sessionDetailServiceFactory])
    .controller('detailController', ['editModeService', 'sessionsService', 'sessionDetailService', '$q', '$rootScope', detailController])
;
