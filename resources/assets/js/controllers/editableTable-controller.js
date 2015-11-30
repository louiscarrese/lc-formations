/*
(function() {
    */
/*
    angular.module('stagiaireTypesModule')
        .controller('editableTableController', ['service', editableTableController]);
*/


    function editableTableController($filter, service) {
        var self = this;
        self.orderBy = $filter('orderBy');

        self.data = service.query(function() {
            angular.forEach(self.data, function(value, key) {
                value.internalKey = value.id;
                self.sort();
            });
        });

        self.addObject = {};

        self.errorMessage = "";
        self.filterInput = "";

        self.sortProp = "id";
        self.sortReverse = false;

        self.setSort = function(key) {
            if(self.sortProp == key) {
                self.sortReverse = !self.sortReverse;
            } else {
                self.sortProp = key;
                self.sortReverse = false;
            }
            self.sort();
        };
        self.getSort = function(key) {
            if(self.sortProp === key) {
                return self.sortReverse;
            } else {
                return null;
            }
        };

        self.sort = function() {
            self.data = self.orderBy(self.data, self.sortProp, self.sortReverse);
        }

        /**
         * Update
         */
        self.update = function(type) {
            type.$update({id: type.internalKey}, self.updateSuccess, self.updateError);
        };

        self.updateSuccess = function(value, responseHeaders) {
            value.internalKey = value.id;
            value.editing = false;
            self.sort();

        };

        self.updateError = function(httpResponse) {
            self.error("Erreur à l'enregistrement");
        };

        /**
         * Delete
         */
        self.delete = function(type) {
            type.$delete({id: type.internalKey}, self.deleteSuccess, self.deleteError);
        };

        self.deleteSuccess = function(value, responseHeaders) {
            self.data.splice(self.data.indexOf(value), 1);
        };

        self.deleteError = function(httpResponse) {
            self.error("Erreur à la suppression");
        };
        /**
         * Add
         */
        self.add = function() {
            service.save(self.addObject, self.addSuccess, self.addError);
        };

        self.addSuccess = function(value, responseHeaders) {
            value.internalKey = value.id;
            self.data.push(value);
            self.sort();
            self.addObject = {};
        };

        self.addError  = function(httpResponse) {
            self.error("Erreur à l'ajout");

        };

        /**
         * Cancel
         */
        self.cancel = function(type) {
            service.get({id: type.internalKey}, function(value, responseHeaders) {
                value.editing = false;
                value.internalKey = value.id;
                self.data[self.data.indexOf(type)] = value;
            });
        };

        /** 
         * Get
         */
        self.get = function(type) {
            service.get({id: type.id}, function(value, responseHeaders) {
                value.internalKey = value.id;
                self.data[self.data.indexOf(type)] = value;
            });
        };

        /**
         * Utilities
         */
        self.error = function(message) {
            self.errorMessage = message;
        };
    } 

/*
})(); 
*/
