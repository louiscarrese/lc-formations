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
        return $resource('http://192.168.33.10/laravel/public/api/stagiaire_type/:id', null, {
            'update' : { method: 'PUT' }
        });
    }

    /*
})();
*/