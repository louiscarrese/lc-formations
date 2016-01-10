angular.module('editableTable', ['myEditable', 'sortableHeader'])
    .factory('sharedDataService', sharedDataServiceFactory)
    .filter('myCustomFilter', myCustomFilter)
;
