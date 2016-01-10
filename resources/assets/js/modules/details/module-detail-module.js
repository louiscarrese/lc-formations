angular.module('moduleDetail', ['detail', 'ngResource'])
    //Resource services
    .factory('modulesService', ['$resource', modulesServiceFactory])
    .factory('domaineFormationsService', ['$resource', domaineFormationsServiceFactory])
    .factory('formateursService', ['$resource', formateursServiceFactory])
    //Detail service implementation
    .factory('moduleDetailService', ['sharedDataService', 'domaineFormationsService', 'formateursService', moduleDetailServiceFactory])

    //Detail controller
    .controller('detailController', ['editModeService', 'modulesService', 'moduleDetailService', detailController])
;
