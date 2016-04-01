function preinscriptionsPublicController($filter, $uibModal, sessionsService, preinscriptionsService) {
    var self = this;

    /**
     * Member declarations
     */

    /* The main data */
    self.data = {
        preinscription_sessions: [],
    }

    /* External data */
    //Static
    self.externalData = {
        stagiaire_genre: [
            {id: 'Mr', label: 'Mr'},
            {id: 'Mme', label: 'Mme'},
        ],
        stagiaire_adherent: [
            {id: 'true', label: 'Déjà adhérent'},
            {id: 'false', label: 'Nouvel adhérent (un réglement de 16€ vous sera demandé)'},
        ],
        stagiaire_statut: [
            {id: 'salarie', label: 'Salarié'},
            {id: 'demandeur_emploi', label: 'Demandeur d\'emploi'},
            {id: 'intermittent', label: 'Intermittent du spectacle'},
            {id: 'rsa', label: 'RSA'},
            {id: 'etudiant', label: 'Etudiant'},
            {id: 'autre', label: 'Autre'},
        ],
        salarie_types : [
            {id: 'cdi', label: 'CDI'},
            {id: 'cdd', label: 'CDD'},
            {id: 'cui_cae', label: 'CUI/CAE'},
            {id: 'autre', label: 'Autre', freeText: true}
        ],
        demandeur_emploi_types : [
            {id: 'indemnise', label: 'Indemnisé'},
            {id: 'non_indemnise', label: 'Non indemnisé'},
        ],
        financements_types : [
            {id: 'employeur', label: 'Financement par l\'employeur'},
            {id: 'personnel', label: 'Financement personnel'},
            {id: 'afdas', label: 'Financement AFDAS'},
            {id: 'autre', label: 'Autres types de financements'},
        ],
        financement_afdas : [
            {id: 'intermittent', label: 'Je suis demandeur d\'emploi'},
            {id: 'non_intermittent', label: 'Je ne suis pas intermittent mais justifie du nombre de jours de travail requis'},
        ],
        financement_autre : [
            {id: 'conseil_regional', label: 'Conseil régional'},
            {id: 'conseil_general', label: 'Conseil général'},
            {id: 'pole_emploi', label: 'Pôle emploi'},
            {id: 'association', label: 'L\'association dans laquelle je suis bénévole'},
            {id: 'opca', label: 'Autre OPCA', freeText: true},
            {id: 'autre', label: 'Autre', freeText: true},
        ],
        prise_connaissance : [
            {id: 'site_internet', label: 'Site internet du Jadin Moderne'},
            {id: 'site_autre', label: 'Autre site internet', freeText: true},
            {id: 'annonce_adhérents', label: 'Annonce aux adhérents du Jardin Moderne'},
            {id: 'programme', label: 'Programmes bimensuels du Jardin Moderne'},
            {id: 'catalogue', label: 'Notre catalogue de formations'},
            {id: 'medias', label: 'Médias', freeText: true},
            {id: 'bouche_a_oreille', label: 'Bouche à oreille'},
            {id: 'recherche_internet', label: 'Recherche internet'},
            {id: 'affichage', label: 'Affichage dans des lieux', freeText: true},
            {id: 'autre', label: 'Autre', freeText: true},

        ]
    }
    //Dynamic
    self.externalData['sessions'] = sessionsService.query({}, enhanceSessions);

    /* Used by components so we reserve the names */
    //Will store the open status of the date pickers
    self.datepickerstatus = {};
    self.collapsedDivs = [];


    /* Configuration for the datepickers */
    self.datepicker_options = {
        datenaissance: {
            datepickerMode: 'year'
        }
    }


    /* Declare controller functions */
    self.submit = submit;
    self.addInscription = addInscription;
    self.removeInscription = removeInscription;

    self.getValidationMessage = getValidationMessage;

    self.openConditions = openConditions;

    self.toApiModel = toApiModel;

    /**
     * Function implementations
     */
    function submit() {
        console.log('submit');

        //TODO: Check if at least one session

        //TODO: Send data to server 
        preinscriptionsService.save(self.data,
            function(value, responseHeaders) {
                window.location.href="/preinscription/thanks";
            },
            function(response) {
                alert('error');
                console.log(response);
            });
        return true;
    }

    function addInscription(item, model) {
        self.data.preinscription_sessions.push({
            session: self.selectedInscription, 
            session_id: self.selectedInscription.id, 
            collapsed: false});

        self.selectedInscription = null;
    }

    function removeInscription(index) {
        self.data.sessions.splice(index, 1);
    }

    function openConditions() {
        var modalInstance = $uibModal.open({
            templateUrl: 'preinscription/conditions',
            size: 'lg'
        });
    }

    function getValidationMessage(form, input) {
        if(self[form] != undefined && self[form][input] != undefined)
            return self[form][input]['errorMessage'];
    }

    function toApiModel(data) {
    }

    /**
     * Not member functions
     */
     function enhanceSessions(data) {
        angular.forEach(data, function(session) {
            //Session label
            session.label = buildSessionLibelle(session);

            //Tarifs label
            angular.forEach(session.module.tarifs, function(tarif){
                tarif.label = buildTarifLibelle(tarif);
            });
        });
     }

     function buildSessionLibelle(session) {
        var ret = session.module.libelle + ' ';
        if(session.firstDate || session.lastDate) {
            ret += '(';
            if(session.firstDate) {
                ret += $filter('date')(session.firstDate, 'dd/MM/yyyy');
            }
            if(session.lastDate) {
                ret += ' - ' + $filter('date')(session.lastDate, 'dd/MM/yyyy');
            }
            ret += ')';
        }

        return ret;
    }

    function buildTarifLibelle(tarif) {
        var ret = tarif.tarif_type.libelle + ' (' + tarif.montant + ' €)';
        return ret;
    }
}
