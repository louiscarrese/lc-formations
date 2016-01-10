angular.module('sessionDetail', ['detail'])
    .factory('sessionsService', ['$resource', sessionsServiceFactory])
    .factory('modulesService', ['$resource', modulesServiceFactory])
    .factory('formateursService', ['$resource', formateursServiceFactory])
    .factory('sessionDetailService', ['sharedDataService', 'modulesService', sessionDetailServiceFactory])
    .controller('detailController', ['editModeService', 'sessionsService', 'sessionDetailService', detailController])
;
