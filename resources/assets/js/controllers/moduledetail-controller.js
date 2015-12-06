function moduleDetailController(editModeService, modulesService, domaineFormationsService) {
    var self = this;

    var urlData = editModeService.initFromUrl(modulesService);

    self.data = urlData.data;

    self.mode = urlData.mode;
    self.editing = urlData.editing;

    self.domaine_formations = domaineFormationsService.query();

    self.create = function() {
        modulesService.save(self.data, self.createSuccess, self.createError);
    };

    self.createSuccess = function(value, responseHeaders) {
        self.data = value;
        self.mode = 'read';
        self.editing = false;
    }

    self.createError = function(httpResponseHeaders) {
        alert('Error ! ');
    }

    self.cancel = function() {
        alert('cancel');
    }

    self.update = function() {
        alert('update');
    }

    self.delete = function() {
        alert('delete');
    }

}