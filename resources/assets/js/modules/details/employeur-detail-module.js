angular.module('employeurDetail', ['detail', 'ngResource'])
    .factory('employeursService', ['$resource', employeursServiceFactory])
    .factory('employeurDetailService', ['sharedDataService', employeurDetailServiceFactory])
    .controller('detailController', ['editModeService', 'employeursService', 'employeurDetailService', detailController])
;
