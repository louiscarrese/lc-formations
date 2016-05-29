angular.module('moduleDetail', ['detail', 'ngResource', 'myEditable'])
    //Resource services
    .factory('modulesService', ['$resource', modulesServiceFactory])
    .factory('domaineFormationsService', ['$resource', domaineFormationsServiceFactory])
    .factory('formateursService', ['$resource', formateursServiceFactory])
    .factory('lieuService', ['$resource', lieuServiceFactory])
    //Detail service implementation
    .factory('moduleDetailService', ['$filter', 'sharedDataService', 'domaineFormationsService', 'formateursService', 'lieuService', moduleDetailServiceFactory])

    //Detail controller
    .controller('detailController', ['editModeService', 'modulesService', 'moduleDetailService', '$q', detailController])
;
