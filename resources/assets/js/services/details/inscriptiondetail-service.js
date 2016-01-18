function inscriptionDetailServiceFactory($filter, sharedDataService, stagiairesService, sessionsService) {
    return {
        getLinkedData: function() {
            var stagiaire = stagiairesService.query();
            var session = sessionsService.query({}, function() {

                for(var i = 0; i < session.length; i++) {
                    if(session[i].firstDate && session[i].lastDate) {
                        session[i].libelle = '(' + $filter('date')(session[i].firstDate, 'dd/MM/yyyy');
                        session[i].libelle += ' - ' + $filter('date')(session[i].lastDate, 'dd/MM/yyyy') + ')';
                    } else {
                        session[i].libelle = '';
                    }
                }
            });
            return {
                'stagiaire': stagiaire,
                'session': session,
            };
        },

        getInternalKey: function(data) {
            return data.id;
        },

        getSuccess: function(data) {

            sharedDataService.data.inscription_id = data.id;

            var titleText = "Création d'une inscription";
            if(data.id != undefined) {
                titleText = 'Inscription de ' + data.stagiaire.prenom + ' ' + data.stagiaire.nom;
                titleText += ' à la formation ' + data.session.module.libelle;
            }

            //Build the return structure
            return {
                'titleText': titleText
            }

        },

        getListUrl: function() {
            return '/inscriptions';
        },

        validateInscription: function(dataService) {
            var refresh = this.refreshData;
            if(dataService) {
                dataService.validate({inscription_id: sharedDataService.data.inscription_id},
                    function(response) {
                        refresh();
                    }
                );
            }
        },

        cancelInscription: function(dataService) {
            var refresh = this.refreshData;
            if(dataService) {
                dataService.cancel({inscription_id: sharedDataService.data.inscription_id},
                    function(response) {
                        refresh();
                    }
                );
            }
        }

    }
}