angular.module('listTable', ['sortableHeader'])
    .factory('sharedDataService', sharedDataServiceFactory)
    .filter('myCustomFilter', myCustomFilter)
    .directive('myPaginator', myPaginator)
;
