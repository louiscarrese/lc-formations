angular.module('detail', ['myEditable'])
    .factory('sharedDataService', sharedDataServiceFactory)
    .factory('editModeService', ['$q', editModeServiceFactory]) 
;
