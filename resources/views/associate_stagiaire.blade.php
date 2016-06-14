<div>
<h2>Association du stagiaire</h2>
<div class="association">
    <div class="left-column">        
        <h3>Préinscription</h3>
        <div class="search invisible">
            <form editable-form shown="true" name="associationCtrl.searchForm" id="searchForm" novalidate="novalidate">
                @include('components.xeditable.select', [
                    'id' =>'recherche',
                    'label' => 'Recherche',
                    'model' => 'associationCtrl.dbSearch',
                    'name' => 'associationCtrl.dbSearch',
                    'displayed' => 'nom',
                    'match_displayed' => 'associationCtrl.searchMatchDisplayed($select.selected, $select.search)',
                    'choices_displayed' => 'associationCtrl.searchChoicesDisplayed(item)',
                    'refresh' => 'associationCtrl.refreshList($select.search)',
                    'form' => 'associationCtrl.searchForm',
                    'datasource' => 'associationCtrl.dbSearchList',
                    'no_reset_search_input' => true,
                    'search_prefill' => "@{{associationCtrl.preinscriptionData.nom + ' ' + associationCtrl.preinscriptionData.prenom}}",
                    'search_placeholder' => true,
                    'filter_props' => "'nom':'prenom'",
                ])
            </form>
        </div>
        <form editable-form shown="true" name="associationCtrl.sourceDataForm" novalidate="novalidate">
            <div class="xeditable-container">
                @include('components.xeditable.radio', [
                    'id' => 'sexe',
                    'label' => 'Sexe',
                    'model' => 'associationCtrl.preinscriptionData.sexe',
                    'datasource' => 'associationCtrl.parentController.linkedData.sexe',
                    'displayed' => 'associationCtrl.parentController.staticData.sexe.label(associationCtrl.parentController.data.sexe)',
                    'inline' => true,
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.text', [
                    'id' => 'nom',
                    'label' => 'Nom',
                    'model' => 'associationCtrl.preinscriptionData.nom',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.text', [
                    'id' => 'prenom',
                    'label' => 'Prénom',
                    'model' => 'associationCtrl.preinscriptionData.prenom',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default">&gt;</button>
                </div>
            </div>  
            <div class="form-inline xeditable-container">
                @include('components.xeditable.date', [
                    'id' => 'date_naissance',
                    'label' => 'Date de naissance',
                    'model' => 'associationCtrl.preinscriptionData.date_naissance',
                    'openFlag' => 'ctrl.openedDatePicker.date_naissance',
                    'openFunction' => 'ctrl.openDatePicker($event, \'date_naissance\')',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.textarea', [
                    'id' => 'adresse',
                    'label' => 'Adresse',
                    'model' => 'associationCtrl.preinscriptionData.adresse',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.text', [
                    'id' => 'code_postal',
                    'label' => 'Code postal',
                    'model' => 'associationCtrl.preinscriptionData.code_postal',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container">
                @include ('components.xeditable.text', [
                    'id' => 'ville',
                    'label' => 'Ville',
                    'model' => 'associationCtrl.preinscriptionData.ville',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.text', [
                    'id' => 'tel_fixe',
                    'label' => 'Téléphone fixe',
                    'model' => 'associationCtrl.preinscriptionData.tel_fixe',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.text', [
                    'id' => 'tel_portable',
                    'label' => 'Téléphone portable',
                    'model' => 'associationCtrl.preinscriptionData.tel_portable',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container">
                @include ('components.xeditable.email', [
                    'id' => 'email',
                    'label' => 'Email',
                    'model' => 'associationCtrl.preinscriptionData.email',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.radio', [
                    'id' => 'adherent',
                    'label' => 'Adhérent',
                    'model' => 'associationCtrl.preinscriptionData.adherent',
                    'datasource' => 'associationCtrl.parentController.linkedData.adherent',
                    'displayed' => 'associationCtrl.parentController.staticData.adherent.label(associationCtrl.preinscriptionData.adherent)',
                    'inline' => true,
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.select', [
                    'id' =>'statut',
                    'label' => 'Statut',
                    'model' => 'associationCtrl.preinscriptionData.statut',
                    'form' => 'associationCtrl.sourceDataForm',
                    'name' => 'statut',
                    'displayed' => 'associationCtrl.parentController.staticData.statut_stagiaire.label(associationCtrl.preinscriptionData.statut)',
                    'match_displayed' => '$select.selected.label',
                    'choices_displayed' => 'item.label',
                    'singleProperty' => 'id',
                    'datasource' => 'associationCtrl.parentController.linkedData.statut_stagiaire',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container" ng-show="associationCtrl.preinscriptionData.statut == 'salarie'">
                @include('components.xeditable.radio-precision', [
                    'id' => 'salarie_type',
                    'label' => 'Type de contrat',
                    'model' => 'associationCtrl.preinscriptionData.salarie_type',
                    'datasource' => 'associationCtrl.parentController.linkedData.salarie_type',
                    'displayed' => 'associationCtrl.parentController.staticData.salarie_type.label(associationCtrl.preinscriptionData.salarie_type, associationCtrl.preinscriptionData.salarie_type_precision)',
                    'precision_model' => 'associationCtrl.preinscriptionData.salarie_type_precision',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container" ng-show="associationCtrl.preinscriptionData.statut == 'demandeur_emploi'">
                @include('components.xeditable.radio', [
                    'id' => 'demandeur_emploi_type',
                    'model' => 'associationCtrl.preinscriptionData.demandeur_emploi_type',
                    'datasource' => 'associationCtrl.parentController.linkedData.demandeur_emploi_type',
                    'displayed' => 'associationCtrl.parentController.staticData.demandeur_emploi_type.label(associationCtrl.preinscriptionData.demandeur_emploi_type)',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container" ng-show="associationCtrl.preinscriptionData.statut == 'etudiant'">
                @include('components.xeditable.text', [
                    'id' => 'etudiant_etudes',
                    'label' => 'Etudes',
                    'model' => 'associationCtrl.preinscriptionData.etudiant_etudes',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container" ng-show="associationCtrl.preinscriptionData.statut == 'autre'">
                @include ('components.xeditable.text', [
                    'id' => 'type_autre',
                    'model' => 'associationCtrl.preinscriptionData.type_autre',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default">&gt;</button>
                </div>
            </div>
        </form>
    </div>

    <div class="right-column">
        <h3>Base de données</h3>
        <div class="search">
            <form editable-form shown="true" name="associationCtrl.searchForm" id="searchForm" novalidate="novalidate">
                <div class="xeditable-container">
                    <div class="merge-left">&nbsp;</div>
                    @include('components.xeditable.select', [
                        'id' =>'recherche',
                        'label' => 'Recherche',
                        'model' => 'associationCtrl.dbSearch',
                        'name' => 'associationCtrl.dbSearch',
                        'displayed' => 'nom',
                        'match_displayed' => 'associationCtrl.searchMatchDisplayed($select.selected, $select.search)',
                        'choices_displayed' => 'associationCtrl.searchChoicesDisplayed(item)',
                        'refresh' => 'associationCtrl.refreshList($select.search)',
                        'form' => 'associationCtrl.searchForm',
                        'datasource' => 'associationCtrl.dbSearchList',
                        'no_reset_search_input' => true,
                        'search_prefill' => "@{{associationCtrl.preinscriptionData.nom + ' ' + associationCtrl.preinscriptionData.prenom}}",
                        'search_placeholder' => true,
                        'filter_props' => "'nom':'prenom'",
                    ])
                </div>
            </form>
        </div>
        <form editable-form shown="true" name="associationCtrl.dbDataForm" novalidate="novalidate" ng-show="associationCtrl.dbSearch != null">
            <div class="xeditable-container">
                <div class="merge-left">
                    <button class="btn btn-default">&lt;</button>
                </div>
                @include('components.xeditable.radio', [
                    'id' => 'sexe',
                    'label' => 'Sexe',
                    'model' => 'associationCtrl.dbSearch.sexe',
                    'datasource' => 'associationCtrl.parentController.linkedData.sexe',
                    'displayed' => 'associationCtrl.parentController.staticData.sexe.label(associationCtrl.parentController.data.sexe)',
                    'inline' => true,
                ])
            </div>
            <div class="xeditable-container">
                <div class="merge-left">
                    <button class="btn btn-default">&lt;</button>
                </div>
                @include('components.xeditable.text', [
                    'id' => 'nom',
                    'label' => 'Nom',
                    'model' => 'associationCtrl.dbSearch.nom',
                ])
            </div>
            <div class="xeditable-container">
                <div class="merge-left">
                    <button class="btn btn-default">&lt;</button>
                </div>
                @include('components.xeditable.text', [
                    'id' => 'prenom',
                    'label' => 'Prénom',
                    'model' => 'associationCtrl.dbSearch.prenom',
                ])
            </div>  
            <div class="form-inline xeditable-container">
                <div class="merge-left">
                    <button class="btn btn-default">&lt;</button>
                </div>
                @include('components.xeditable.date', [
                    'id' => 'date_naissance',
                    'label' => 'Date de naissance',
                    'model' => 'associationCtrl.dbSearch.date_naissance',
                    'openFlag' => 'ctrl.openedDatePicker.date_naissance',
                    'openFunction' => 'ctrl.openDatePicker($event, \'date_naissance\')',
                ])
            </div>
            <div class="xeditable-container">
                <div class="merge-left">
                    <button class="btn btn-default">&lt;</button>
                </div>
                @include('components.xeditable.textarea', [
                    'id' => 'adresse',
                    'label' => 'Adresse',
                    'model' => 'associationCtrl.dbSearch.adresse',
                ])
            </div>
            <div class="xeditable-container">
                <div class="merge-left">
                    <button class="btn btn-default">&lt;</button>
                </div>
                @include('components.xeditable.text', [
                    'id' => 'code_postal',
                    'label' => 'Code postal',
                    'model' => 'associationCtrl.dbSearch.code_postal',
                ])
            </div>
            <div class="xeditable-container">
                <div class="merge-left">
                    <button class="btn btn-default">&lt;</button>
                </div>
                @include ('components.xeditable.text', [
                    'id' => 'ville',
                    'label' => 'Ville',
                    'model' => 'associationCtrl.dbSearch.ville',
                ])
            </div>
            <div class="xeditable-container">
                <div class="merge-left">
                    <button class="btn btn-default">&lt;</button>
                </div>
                @include('components.xeditable.text', [
                    'id' => 'tel_fixe',
                    'label' => 'Téléphone fixe',
                    'model' => 'associationCtrl.dbSearch.tel_fixe',
                ])
            </div>
            <div class="xeditable-container">
                <div class="merge-left">
                    <button class="btn btn-default">&lt;</button>
                </div>
                @include('components.xeditable.text', [
                    'id' => 'tel_portable',
                    'label' => 'Téléphone portable',
                    'model' => 'associationCtrl.dbSearch.tel_portable',
                ])
            </div>
            <div class="xeditable-container">
                <div class="merge-left">
                    <button class="btn btn-default">&lt;</button>
                </div>
                @include ('components.xeditable.email', [
                    'id' => 'email',
                    'label' => 'Email',
                    'model' => 'associationCtrl.dbSearch.email',
                ])
            </div>
            <div class="xeditable-container">
                <div class="merge-left">
                    <button class="btn btn-default">&lt;</button>
                </div>
                @include('components.xeditable.radio', [
                    'id' => 'adherent',
                    'label' => 'Adhérent',
                    'model' => 'associationCtrl.dbSearch.adherent',
                    'datasource' => 'associationCtrl.parentController.linkedData.adherent',
                    'displayed' => 'associationCtrl.parentController.staticData.adherent.label(associationCtrl.dbSearch.adherent)',
                    'inline' => true,
                ])
            </div>
            <div class="xeditable-container">
                <div class="merge-left">
                    <button class="btn btn-default">&lt;</button>
                </div>
                @include('components.xeditable.select', [
                    'id' =>'statut',
                    'label' => 'Statut',
                    'model' => 'associationCtrl.dbSearch.statut',
                    'form' => 'associationCtrl.dbDataForm',
                    'name' => 'statut',
                    'displayed' => 'associationCtrl.parentController.staticData.statut_stagiaire.label(associationCtrl.dbSearch.statut)',
                    'match_displayed' => '$select.selected.label',
                    'choices_displayed' => 'item.label',
                    'singleProperty' => 'id',
                    'datasource' => 'associationCtrl.parentController.linkedData.statut_stagiaire',
                ])
            </div>
            <div class="xeditable-container" ng-show="associationCtrl.dbSearch.statut == 'salarie'">
                <div class="merge-left">
                    <button class="btn btn-default">&lt;</button>
                </div>
                @include('components.xeditable.radio-precision', [
                    'id' => 'salarie_type',
                    'label' => 'Type de contrat',
                    'model' => 'associationCtrl.dbSearch.salarie_type',
                    'datasource' => 'associationCtrl.parentController.linkedData.salarie_type',
                    'displayed' => 'associationCtrl.parentController.staticData.salarie_type.label(associationCtrl.dbSearch.salarie_type, associationCtrl.dbSearch.salarie_type_precision)',
                    'precision_model' => 'associationCtrl.dbSearch.salarie_type_precision',
                ])
            </div>
            <div class="xeditable-container" ng-show="associationCtrl.dbSearch.statut == 'demandeur_emploi'">
                <div class="merge-left">
                    <button class="btn btn-default">&lt;</button>
                </div>
                @include('components.xeditable.radio', [
                    'id' => 'demandeur_emploi_type',
                    'model' => 'associationCtrl.dbSearch.demandeur_emploi_type',
                    'datasource' => 'associationCtrl.parentController.linkedData.demandeur_emploi_type',
                    'displayed' => 'associationCtrl.parentController.staticData.demandeur_emploi_type.label(associationCtrl.dbSearch.demandeur_emploi_type)',
                ])
            </div>
            <div class="xeditable-container" ng-show="associationCtrl.dbSearch.statut == 'etudiant'">
                <div class="merge-left">
                    <button class="btn btn-default">&lt;</button>
                </div>
                @include('components.xeditable.text', [
                    'id' => 'etudiant_etudes',
                    'label' => 'Etudes',
                    'model' => 'associationCtrl.dbSearch.etudiant_etudes',
                ])
            </div>
            <div class="xeditable-container" ng-show="associationCtrl.dbSearch.statut == 'autre'">
                <div class="merge-left">
                    <button class="btn btn-default">&lt;</button>
                </div>
                @include ('components.xeditable.text', [
                    'id' => 'type_autre',
                    'model' => 'associationCtrl.dbSearch.type_autre'
                ])
            </div>
        </form>
    </div>

</div>
<div class="buttons clearfix">
    <div class="pull-left">
        <div ng-show="associationCtrl.preinscriptionData.stagiaire_id == null">
            <button type="button" class="btn btn-default" ng-click="">Créer</button>
            <button type="button" class="btn btn-default" ng-click="">Associer</button>
        </div>
        <div ng-show="associationCtrl.preinscriptionData.stagiaire_id != null">
            <button type="button" class="btn btn-default" ng-click="">Enregistrer</button>
        </div>
    </div>
    <div class="pull-right">
        <button type="button" class="btn btn-default" ng-click="associationCtrl.modalInstance.close()">Fermer</button>
    </div>
</div>
