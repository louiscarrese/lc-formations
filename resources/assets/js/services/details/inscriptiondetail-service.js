function inscriptionDetailServiceFactory(sharedDataService, stagiairesService, sessionsService, $filter) {

    //It would deserve to factorize with sessionDetailService.titleText
    function buildSessionLibelle(item) {
        var ret = '';
        if(item.firstDate && item.lastDate) {
            ret = '(' + $filter('date')(item.firstDate, 'dd/MM/yyyy');
            ret += ' - ' + $filter('date')(item.lastDate, 'dd/MM/yyyy') + ')';
        }
        return ret;
    };

    return {
        getLinkedData: function() {
            var stagiaire = stagiairesService.query();
            var sessions = sessionsService.query();

            sessions.$promise.then(function(data) {
                angular.forEach(data, function(session) {
                    session.libelle = buildSessionLibelle(session);
                });
            });

            return {
                'stagiaire': stagiaire.$promise,
                'session': sessions.$promise,
            };
        },

        getInternalKey: function(data) {
            return data.id;
        },

        getSuccess: function(data) {
            sharedDataService.data.inscription_id = data.id;

            if(data.session) {
                data.session.libelle = buildSessionLibelle(data.session);
            }
        },

        titleText: function(data) {
            var titleText = "Création d'une inscription";
            if(data.id != undefined) {
                titleText = 'Inscription de ' + data.stagiaire.prenom + ' ' + data.stagiaire.nom;
                titleText += ' à la formation ' + data.session.module.libelle;
            }

            return titleText;
        },

        getListUrl: function() {
            return '/inscriptions';
        },

        addListeners: function(ctrl) {
            ctrl.validateInscription = function() {
                var resource = ctrl.dataService.validate({inscription_id: sharedDataService.data.inscription_id});
                resource.$promise.then(function() {
                    ctrl.refreshData();
                })
            };

            ctrl.cancelInscription = function() {
                var resource = ctrl.dataService.cancel({inscription_id: sharedDataService.data.inscription_id});
                resource.$promise.then(function() {
                    ctrl.refreshData();
                })
            };

            ctrl.withdrawInscription = function(dataService) {
                var resource = ctrl.dataService.withdraw({inscription_id: sharedDataService.data.inscription_id});
                resource.$promise.then(function() {
                    ctrl.refreshData();
                })
            };

        },

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer cette inscription ?';
            message += '\nLes éléments associés suivants seront également supprimés : ';
            message += '\n - Financements ';
            return message;
        },
    }
}