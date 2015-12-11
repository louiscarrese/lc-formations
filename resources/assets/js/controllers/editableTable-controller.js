/*
(function() {
    */
/*
    angular.module('stagiaireTypesModule')
        .controller('editableTableController', ['dataService', editableTableController]);
*/


    function editableTableController($filter, dataService, tableService, sharedDataService) {
        var self = this;
        self.orderBy = $filter('orderBy');

        self.data = dataService.query(function() {
            angular.forEach(self.data, function(value, key) {
                self.getSuccess(value);
                self.sort();
            });
        });

        self.addObject = {};

        self.errorMessage = "";
        self.filterInput = "";

        self.sortProp = "id";
        self.sortReverse = false;

        if(tableService != undefined) {
            self.linkedData = tableService.getLinkedData();
        }

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

        self.getSuccess = function(value) {
            value.internalKey = value.id;
            if(tableService != undefined) {
                tableService.getSuccess(value);
            }
        }

        self.editSubmit = function(value) {
            //Validation
            console.log(self);
            console.log('form_' + value.internalKey);
            var form = self['form_' + value.internalKey];
            if(form.$valid) {
                //Send update
                self.update(value);
            } else  {
                alert('erreur dans le formulaire');
            }
        }
        self.addSubmit = function() {
            //Validation
            console.log(self);
            console.log('form_' + value.internalKey);
            var form = self['form_add'];
            if(form.$valid) {
                //Send update
                self.add(self.addObject);
            } else  {
                alert('erreur dans le formulaire');
            }
        }


        /**
         * Update
         */
        self.update = function(type) {
            if(tableService != undefined) {
                tableService.preSend(type);
            }
            type.$update({id: type.internalKey}, self.updateSuccess, self.updateError);
        };

        self.updateSuccess = function(value, responseHeaders) {

            self.getSuccess(value);
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
            if(tableService != undefined) {
                tableService.preSend(self.addObject);
            }
            dataService.save(self.addObject, self.addSuccess, self.addError);
        };

        self.addSuccess = function(value, responseHeaders) {
            self.getSuccess(value);
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
            dataService.get({id: type.internalKey}, function(value, responseHeaders) {
                value.editing = false;
                value.internalKey = value.id;
                self.data[self.data.indexOf(type)] = value;
            });
        };

        /** 
         * Get
         */
        self.get = function(type) {
            dataService.get({id: type.id}, function(value, responseHeaders) {
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
