function moduleDetailController(editModeService, modulesService, domaineFormationsService) {
    var self = this;

    urlData = editModeService.initFromUrl(modulesService);

    self.data = urlData.data;

    self.mode = urlData.mode;
    self.editing = urlData.editing;

    self.domaine_formations = domaineFormationsService.query();

}