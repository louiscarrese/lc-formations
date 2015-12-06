function moduleDetailController(editModeService, modulesService, domaineFormationsService) {
    var self = this;

    var urlData = editModeService.initFromUrl(modulesService, function(mode, data) {
        //Store computed data
        self.data = data;
        self.mode = mode;

        //Are we editing ?
        if(self.mode === 'read') {
            self.editing = false;
        } else {
            self.editing = true;
        }

        //Ease up label retrieval
        if(self.data.domaine_formation_id != undefined) {
            self.data.module_formation_label = self.data.domaine_formation.libelle;
        }
    });

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