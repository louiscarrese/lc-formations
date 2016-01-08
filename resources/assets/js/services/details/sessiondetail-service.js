function sessionDetailServiceFactory(sharedDataService, modulesService) {
    return {
        getLinkedData: function() {
            var modules = modulesService.query();

            return {
                'modules': modules
            };
        },

        getInternalKey: function(data) {
            return data.id;
        },

        getSuccess: function(data) {

            sharedDataService.data.session_id = data.id;


            //Build the return structure
            return {
                'titleText': data.id != undefined ? data.module.libelle + ' ' + data.libelle : "Création d'une session"
            }

        },

        getListUrl: function() {
            return '/sessions';
        },

        addListeners: function(controller) {
            controller.onModuleChange = function(moduleId) {

                //Get the module
                var modules = controller.linkedData.modules;
                var module = {};
                for(var i = 0; i < modules.length; i++) {
                    if(modules[i].id === moduleId) {
                        module = modules[i];
                    }
                }

                //Copy data
                controller.data.libelle = module.libelle;
                controller.data.nb_jours = module.nb_jours;
                controller.data.heure_debut = module.heure_debut;
                controller.data.heure_fin = module.heure_fin;
                controller.data.effectif_max = module.effectif_max;
                controller.data.objectifs_pedagogiques = module.objectifs_pedagogiques;
                controller.data.materiel = module.materiel;
            }
        }
    }
}