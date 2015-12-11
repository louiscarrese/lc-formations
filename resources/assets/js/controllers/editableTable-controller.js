function editableTableController($filter, dataService, tableService, sharedDataService) {
    var self = this;

    //Functions
    self.orderBy = $filter('orderBy');

    self.setSort = setSort;
    self.getSort = getSort;
    self.sort = sort;

    self.create = create;
    self.cancel = cancel;
    self.update = update;
    self.delete = del;
    self.get = get;

    self.error = error;
    self.getSuccess = getSuccess;

    self.editSubmit = editSubmit;
    self.addSubmit = addSubmit;

    //Data
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

    function setSort(key) {
        if(self.sortProp == key) {
            self.sortReverse = !self.sortReverse;
        } else {
            self.sortProp = key;
            self.sortReverse = false;
        }
        self.sort();
    };

    function getSort(key) {
        if(self.sortProp === key) {
            return self.sortReverse;
        } else {
            return null;
        }
    };

    function sort() {
        self.data = self.orderBy(self.data, self.sortProp, self.sortReverse);
    }

    function getSuccess(value) {
        value.internalKey = value.id;
        if(tableService != undefined) {
            tableService.getSuccess(value);
        }
    }

    function editSubmit(value) {
        //Validation
        var form = self['form_' + value.internalKey];
        if(form.$valid) {
            //Send update
            self.update(value);
        } else  {
            alert('erreur dans le formulaire');
        }
    }

    function addSubmit() {
        //Validation
        var form = self['form_add'];
        if(form.$valid) {
            //Send update
            self.create(self.addObject);
        } else  {
            alert('erreur dans le formulaire');
        }
    }


    /**
     * Update
     */
     function update(type) {
        if(tableService != undefined) {
            tableService.preSend(type);
        }

        type.$update({id: type.internalKey}, 
            function(value, responseHeaders) {

                self.getSuccess(value);
                value.editing = false;
                self.sort();

            }, 
            function(httpResponse) {
                self.error("Erreur à l'enregistrement");
            });
    };

    /**
     * Delete
     */
     function del(type) {
        type.$delete({id: type.internalKey}, 
            function(value, responseHeaders) {
                self.data.splice(self.data.indexOf(value), 1);
            }, 
            function(httpResponse) {
                self.error("Erreur à la suppression");
            });
    };

    /**
     * Add
     */
     function create() {
        if(tableService != undefined) {
            tableService.preSend(self.addObject);
        }
        dataService.save(self.addObject, 
            function(value, responseHeaders) {
                //process value
                self.getSuccess(value);

                //Update data list
                self.data.push(value);
                self.sort();
                self.addObject = {};
            }, 
            function(httpResponse) {
                self.error("Erreur à l'ajout");
            });
    };

    /**
     * Cancel
     */
     function cancel(type) {
        dataService.get({id: type.internalKey}, function(value, responseHeaders) {
            value.editing = false;
            value.internalKey = value.id;
            self.data[self.data.indexOf(type)] = value;
        });
    };

    /** 
     * Get
     */
     function get(type) {
        dataService.get({id: type.id}, function(value, responseHeaders) {
            value.internalKey = value.id;
            self.data[self.data.indexOf(type)] = value;
        });
    };

    /**
     * Utilities
     */
     function error(message) {
        self.errorMessage = message;
    };
} 
