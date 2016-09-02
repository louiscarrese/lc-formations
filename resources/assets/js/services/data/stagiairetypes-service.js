/*
(function() {
    'use strict';
*/
/*
    angular.module('closedListServices')
        .factory('closedListService', ['$resource', 'closedListResourceUrl', closedListServiceFactory]);

    function closedListServiceFactory($resource, closedListResourceUrl) {
        return $resource(closedListResourceUrl, null, {
            'update': { method:'PUT' }
        });
    }
    */


    function stagiaireTypesServiceFactory($resource) {
        return $resource('/intra/api/stagiaire_type/:id', null, {
            'query' : {method: 'GET', isArray: false}, 
            'update' : { method: 'PUT' }
        });
    }

    /*
})();
*/