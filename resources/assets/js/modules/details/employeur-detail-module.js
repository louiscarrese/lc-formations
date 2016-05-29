angular.module('employeurDetail', ['detail', 'ngResource', 'myEditable'])
    .factory('employeursService', ['$resource', employeursServiceFactory])
    .factory('employeurDetailService', ['sharedDataService', employeurDetailServiceFactory])
    .controller('detailController', ['editModeService', 'employeursService', 'employeurDetailService', '$q', detailController])
;
