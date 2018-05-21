angular.module('formateurDetail', ['detail', 'ngResource', 'myEditable'])
    .factory('formateursService', ['$resource', formateursServiceFactory])
    .factory('formateurTypesService', ['$resource', formateurTypesServiceFactory])
    .factory('formateurDetailService', ['sharedDataService', 'formateurTypesService', formateurDetailServiceFactory])
    .controller('detailController', ['editModeService', 'formateursService', 'formateurDetailService', '$q', '$rootScope', detailController])
;
