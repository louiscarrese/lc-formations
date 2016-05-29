angular.module('sessionDetail', ['detail', 'myEditable'])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('modulesService', ['$resource', modulesServiceFactory])
    .factory('formateursService', ['$resource', formateursServiceFactory])
    .factory('sessionDetailService', ['sharedDataService', 'modulesService', '$filter', sessionDetailServiceFactory])
    .controller('detailController', ['editModeService', 'sessionsService', 'sessionDetailService', '$q', detailController])
;
