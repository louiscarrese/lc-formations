function detailController(editModeService, dataService, detailService) {
    var self = this;

    self.internalKey = 0;

    self.errors = [];
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

    if(detailService != undefined) {
        if(typeof detailService.getLinkedData == 'function')
            self.linkedData = detailService.getLinkedData();
        if(typeof detailService.addListeners == 'function')
            detailService.addListeners(this);
    }

    //Initialize data
    editModeService.initFromUrl(dataService, function(mode, data) {
        //Set mode
        self.mode = mode;
        if(self.mode === 'read') {
            self.editing = false;
        } else {
            self.editing = true;
        }

        //Do something with the data
        self.getSuccess(data);

        //Ok, we can go on
        self.inited = true;
    });

    //CRUD
    function create() {
        self.errors = [];
        if(self['mainForm'].$valid) {
            dataService.save(self.data, 
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
        self.errors = [];
        if(self['mainForm'].$valid) {
            self.data.$update({id:self.internalKey}, 
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
        self.data.$delete({id:self.internalKey},
            function(value, responseHeaders) {
                if(detailService != undefined && typeof detailService.getListUrl == 'function')
                    window.location.href=detailService.getListUrl();
            },
            function(response) {
                self.errors = self.extractErrors(response.data);
            })
    }

    //Utilities
    function getSuccess(data) {
        self.data = data;
        if(detailService != undefined && typeof detailService.getInternalKey == 'function')
            self.internalKey = detailService.getInternalKey(self.data);

        if(detailService != undefined && typeof detailService.getSuccess == 'function') {
            var successData = detailService.getSuccess(self.data);
            self.titleText = successData.titleText;
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