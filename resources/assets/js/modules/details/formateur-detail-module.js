angular.module('formateurDetail', ['detail', 'ngResource'])
    .factory('formateursService', ['$resource', formateursServiceFactory])
    .factory('formateurTypesService', ['$resource', formateurTypesServiceFactory])
    .factory('formateurDetailService', ['sharedDataService', 'formateurTypesService', formateurDetailServiceFactory])
    .controller('detailController', ['editModeService', 'formateursService', 'formateurDetailService', detailController])
;
