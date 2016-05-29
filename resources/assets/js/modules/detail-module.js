//angular.module('detail', ['myEditable'])
angular.module('detail', [])
    .factory('sharedDataService', sharedDataServiceFactory)
    .factory('editModeService', ['$q', editModeServiceFactory]) 
;
