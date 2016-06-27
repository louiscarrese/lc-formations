function inscriptionDetailServiceFactory(sharedDataService, stagiairesService, sessionsService, $filter, $q) {

    //It would deserve to factorize with sessionDetailService.titleText
    function buildSessionLibelle(item) {
        var ret = '';
        if(item.firstDate || item.lastDate) {
            ret += '(';
            if(item.firstDate) {
                ret += $filter('date')(item.firstDate, 'dd/MM/yyyy');
            }
            if(item.lastDate) {
                ret += ' - ' + $filter('date')(item.lastDate, 'dd/MM/yyyy');
            }
            ret += ')';
        }
        return ret;
    };

    function getInscriptionStatus() {
        return $q.when([
                {id: 'pending', libelle: 'En cours'},
                {id: 'canceled', libelle: 'Annulée'},
                {id: 'validated', libelle: 'Validée'},
                {id: 'withdrawn', libelle: 'Désistée'},
                {id: 'waiting_list', libelle: 'Liste d\'attente'},
                ]
            );
    }

    return {
        getLinkedData: function() {
            var stagiaire = stagiairesService.query();
            var sessions = sessionsService.query();
            var status = getInscriptionStatus();

            sessions.$promise.then(function(data) {
                angular.forEach(data, function(session) {
                    session.libelle = buildSessionLibelle(session);
                });
            });

            return {
                'stagiaire': stagiaire.$promise,
                'session': sessions.$promise,
                'statut': status,
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
            return '/intra/inscriptions';
        },

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer cette inscription ?';
            message += '\nLes éléments associés suivants seront également supprimés : ';
            message += '\n - Financements ';
            return message;
        },
    }
}