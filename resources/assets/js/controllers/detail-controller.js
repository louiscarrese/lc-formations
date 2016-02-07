function detailController(editModeService, dataService, detailService, $q) {
    var self = this;
    self.inited = false;

    self.internalKey = 0;

    self.errors = [];

    self.dataService = dataService;

    self.refreshData = refreshData;
    self.titleText = titleText;

    //CRUD
    self.create = create;
    self.cancel = cancel;
    self.update = update;
    self.delete = del;

    //Utilities
    self.getSuccess = getSuccess;
    self.setModeRead = setModeRead;
    self.setModeEdit = setModeEdit;

    self.closeAlert = closeAlert;
    self.extractErrors = extractErrors;

    //Just so we don't have 'undefined' in places 
    self.data = {};
    self.linkedData = {};

    initDetail();


    //Calls the service after checking the function exists
    function addListeners() {
        if(detailService != undefined && typeof detailService.addListeners == 'function')
            detailService.addListeners(self);
    }

    //Calls the service after checking the function exists
    function getLinkedData() {
        if(detailService != undefined && typeof detailService.getLinkedData == 'function') {
            return detailService.getLinkedData();
        } else {
            return {};
        }
    }

    //Main initialization function
    function initDetail() {
        //Add custom listeners if any 
        addListeners();

        //Launch all requests and retrieve their promises
        var promises = angular.extend({}, 
            getLinkedData(),
            { 'initData' : editModeService.initFromUrl(dataService) }
        );

        //When all promises succedeed
        $q.all(promises).then(function(responses) {
            //Handle each promise separately
            angular.forEach(responses, function(value, key) {
                if(key == 'initData') {
                    initFromUrl(value);
                } else { //Those we don't know come from getLinkedData()
                    self.linkedData[key] = value;
                }

            });

            //Manually fill the "eager loading" objects
            if(typeof detailService.populateLinkedObjects == 'function') {
                self.data = angular.merge(self.data, detailService.populateLinkedObjects(self.data, self.linkedData));
            }

            //It's almost like we just did a GET...
            self.getSuccess(self.data);

            //We are inited, tell the world !
            self.inited = true;
        });
    }

    //Handles the return from the editModeService
    function initFromUrl(dataFromUrl) {
        //Set mode
        self.mode = dataFromUrl.mode;
        self.editing = !(self.mode === 'read');

        //Copy data we got to our own data
        //We have to copy the whole thing because we want the $resource functions
        self.data = dataFromUrl.data;
    }


    function refreshData() {
        dataService.get({id: self.data.id}, function(response) {
            getSuccess(response);            
        });
    }

    function titleText() {
        if(self.inited && detailService != undefined && typeof detailService.titleText == 'function') {
            return detailService.titleText(self.data);
        } else {
            return "";
        }
    }

    //CRUD
    function create() {
        var toSend = self.data;
        if(detailService != undefined && typeof detailService.preSend == 'function') {
            toSend = detailService.preSend(self.data);
        }

        self.errors = [];
        if(self['mainForm'].$valid) {
            dataService.save(toSend, 
                function(value, responseHeaders) {
                    self.getSuccess(value);
                    self.setModeRead();
                }, 
                function(response) {
                    self.errors = self.extractErrors(response.data);
                }
            );
        }
    };


    function cancel() {
        self.errors = [];
        dataService.get({id:self.internalKey}, function(value, responseHeaders) {
            self.getSuccess(value);
            self.setModeRead();
        });
    }

    function update() {
        var toSend = self.data;
        if(detailService != undefined && typeof detailService.preSend == 'function') {
            toSend = detailService.preSend(self.data);
        }

        self.errors = [];
        if(self['mainForm'].$valid) {
            toSend.$update({id:self.internalKey}, 
                function(value, responseHeaders) {
                    self.getSuccess(value);
                    self.setModeRead();
                },
                function(response) {
                    self.errors = self.extractErrors(response.data);
                }
            );
        }
    }

    function del() {
        self.errors = [];
        if(window.confirm(detailService.deleteMessage())) {
            self.data.$delete({id:self.internalKey},
                function(value, responseHeaders) {
                    if(detailService != undefined && typeof detailService.getListUrl == 'function')
                        window.location.href=detailService.getListUrl();
                },
                function(response) {
                    self.errors = self.extractErrors(response.data);
                })
        }
    }

    //Utilities
    function getSuccess(data) {
        self.data = data;
        if(detailService != undefined && typeof detailService.getInternalKey == 'function')
            self.internalKey = detailService.getInternalKey(self.data);

        if(detailService != undefined && typeof detailService.getSuccess == 'function') {
            detailService.getSuccess(self.data);
        }

    }

    function setModeRead() {

        var urlParse = document.createElement('a');
        urlParse.href = window.location;
        //Remove any url parameter
        urlParse.search = '';
        //If we come from state 'create'
        if(self.mode == 'create') {
            //Replace /create with /id
            urlParse.pathname = urlParse.pathname.replace('/create', '/' + self.internalKey);
        } 
        window.history.replaceState({}, document.title, urlParse.href);

        self.mode = 'read';
        self.editing = false;

    }

    function setModeEdit() {
        var urlParse = document.createElement('a');
        urlParse.href = window.location;

        if(urlParse.search.length == 0) {
            urlParse.search = '?edit=true';
        } else {
            urlParse.search += '&edit=true';
        }

        window.history.replaceState({}, document.title, urlParse.href);

        self.editing = true;
        self.mode = 'edit';


    }

    function closeAlert(index) {
        self.errors.splice(index, 1);
    }

    function extractErrors(data) {
        var ret = [];
        for(field in data) {
            for(i = 0; i < data[field].length; i++) {
                ret.push(data[field][i]);
            }
        }
        return ret;
    }

}