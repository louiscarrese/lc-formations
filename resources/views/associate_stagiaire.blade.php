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
                    'search_prefill' => "@{{associationCtrl.parentController.data.nom + ' ' + associationCtrl.parentController.data.prenom}}",
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
                    'model' => 'associationCtrl.parentController.data.sexe',
                    'datasource' => 'associationCtrl.parentController.linkedData.sexe',
                    'displayed' => 'associationCtrl.parentController.staticData.sexe.label(associationCtrl.parentController.data.sexe)',
                    'inline' => true,
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default" ng-click="associationCtrl.mergeData('sexe');">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.text', [
                    'id' => 'nom',
                    'label' => 'Nom',
                    'model' => 'associationCtrl.parentController.data.nom',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default" ng-click="associationCtrl.mergeData('nom');">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.text', [
                    'id' => 'prenom',
                    'label' => 'Prénom',
                    'model' => 'associationCtrl.parentController.data.prenom',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default" ng-click="associationCtrl.mergeData('prenom');">&gt;</button>
                </div>
            </div>  
            <div class="form-inline xeditable-container">
                @include('components.xeditable.date', [
                    'id' => 'date_naissance',
                    'label' => 'Date de naissance',
                    'model' => 'associationCtrl.parentController.data.date_naissance',
                    'openFlag' => 'ctrl.openedDatePicker.date_naissance',
                    'openFunction' => 'ctrl.openDatePicker($event, \'date_naissance\')',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default" ng-click="associationCtrl.mergeData('date_naissance');">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.textarea', [
                    'id' => 'adresse',
                    'label' => 'Adresse',
                    'model' => 'associationCtrl.parentController.data.adresse',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <intput type="button" class="btn btn-default" ng-click="associationCtrl.mergeData('adresse');">&gt;</input>
                </div>
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.text', [
                    'id' => 'code_postal',
                    'label' => 'Code postal',
                    'model' => 'associationCtrl.parentController.data.code_postal',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default" ng-click="associationCtrl.mergeData('code_postal');">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container">
                @include ('components.xeditable.text', [
                    'id' => 'ville',
                    'label' => 'Ville',
                    'model' => 'associationCtrl.parentController.data.ville',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default" ng-click="associationCtrl.mergeData('ville');">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.text', [
                    'id' => 'tel_fixe',
                    'label' => 'Téléphone fixe',
                    'model' => 'associationCtrl.parentController.data.tel_fixe',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default" ng-click="associationCtrl.mergeData('tel_fixe');">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.text', [
                    'id' => 'tel_portable',
                    'label' => 'Téléphone portable',
                    'model' => 'associationCtrl.parentController.data.tel_portable',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default" ng-click="associationCtrl.mergeData('tel_portable');">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container">
                @include ('components.xeditable.email', [
                    'id' => 'email',
                    'label' => 'Email',
                    'model' => 'associationCtrl.parentController.data.email',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default" ng-click="associationCtrl.mergeData('email');">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.radio', [
                    'id' => 'adherent',
                    'label' => 'Adhérent',
                    'model' => 'associationCtrl.parentController.data.adherent',
                    'datasource' => 'associationCtrl.parentController.linkedData.adherent',
                    'displayed' => 'associationCtrl.parentController.staticData.adherent.label(associationCtrl.parentController.data.adherent)',
                    'inline' => true,
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default" ng-click="associationCtrl.mergeData('adherent');">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.select', [
                    'id' =>'statut',
                    'label' => 'Statut',
                    'model' => 'associationCtrl.parentController.data.statut',
                    'form' => 'associationCtrl.sourceDataForm',
                    'name' => 'statut',
                    'displayed' => 'associationCtrl.parentController.staticData.statut_stagiaire.label(associationCtrl.parentController.data.statut)',
                    'match_displayed' => '$select.selected.label',
                    'choices_displayed' => 'item.label',
                    'singleProperty' => 'id',
                    'datasource' => 'associationCtrl.parentController.linkedData.statut_stagiaire',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default" ng-click="associationCtrl.mergeData('statut');">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container" ng-show="associationCtrl.parentController.data.statut == 'salarie'">
                @include('components.xeditable.radio-precision', [
                    'id' => 'salarie_type',
                    'label' => 'Type de contrat',
                    'model' => 'associationCtrl.parentController.data.salarie_type',
                    'datasource' => 'associationCtrl.parentController.linkedData.salarie_type',
                    'displayed' => 'associationCtrl.parentController.staticData.salarie_type.label(associationCtrl.parentController.data.salarie_type, associationCtrl.parentController.data.salarie_type_precision)',
                    'precision_model' => 'associationCtrl.parentController.data.salarie_type_precision',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default" ng-click="associationCtrl.mergeData('salarie_type');">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container" ng-show="associationCtrl.parentController.data.statut == 'demandeur_emploi'">
                @include('components.xeditable.radio', [
                    'id' => 'demandeur_emploi_type',
                    'model' => 'associationCtrl.parentController.data.demandeur_emploi_type',
                    'datasource' => 'associationCtrl.parentController.linkedData.demandeur_emploi_type',
                    'displayed' => 'associationCtrl.parentController.staticData.demandeur_emploi_type.label(associationCtrl.parentController.data.demandeur_emploi_type)',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default" ng-click="associationCtrl.mergeData('demandeur_emploi_type');">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container" ng-show="associationCtrl.parentController.data.statut == 'etudiant'">
                @include('components.xeditable.text', [
                    'id' => 'etudiant_etudes',
                    'label' => 'Etudes',
                    'model' => 'associationCtrl.parentController.data.etudiant_etudes',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default" ng-click="associationCtrl.mergeData('etudiant_etudes');">&gt;</button>
                </div>
            </div>
            <div class="xeditable-container" ng-show="associationCtrl.parentController.data.statut == 'autre'">
                @include ('components.xeditable.text', [
                    'id' => 'type_autre',
                    'model' => 'associationCtrl.parentController.data.type_autre',
                    'disabled' => true,
                ])
                <div class="merge-right">
                    <button class="btn btn-default" ng-click="associationCtrl.mergeData('type_autre');">&gt;</button>
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
                        'search_prefill' => "@{{associationCtrl.parentController.data.nom + ' ' + associationCtrl.parentController.data.prenom}}",
                        'search_placeholder' => true,
                        'filter_props' => "'nom':'prenom'",
                    ])
                </div>
            </form>
        </div>
        <form editable-form shown="true" name="associationCtrl.dbDataForm" novalidate="novalidate" ng-show="associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch) != null">
            <div class="xeditable-container">
                @include('components.xeditable.radio', [
                    'id' => 'sexe',
                    'label' => 'Sexe',
                    'model' => 'associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).sexe',
                    'datasource' => 'associationCtrl.parentController.linkedData.sexe',
                    'displayed' => 'associationCtrl.parentController.staticData.sexe.label(associationCtrl.parentController.data.sexe)',
                    'inline' => true,
                ])
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.text', [
                    'id' => 'nom',
                    'label' => 'Nom',
                    'model' => 'associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).nom',
                ])
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.text', [
                    'id' => 'prenom',
                    'label' => 'Prénom',
                    'model' => 'associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).prenom',
                ])
            </div>  
            <div class="form-inline xeditable-container">
                @include('components.xeditable.date', [
                    'id' => 'date_naissance',
                    'label' => 'Date de naissance',
                    'model' => 'associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).date_naissance',
                    'openFlag' => 'ctrl.openedDatePicker.date_naissance',
                    'openFunction' => 'ctrl.openDatePicker($event, \'date_naissance\')',
                ])
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.textarea', [
                    'id' => 'adresse',
                    'label' => 'Adresse',
                    'model' => 'associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).adresse',
                ])
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.text', [
                    'id' => 'code_postal',
                    'label' => 'Code postal',
                    'model' => 'associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).code_postal',
                ])
            </div>
            <div class="xeditable-container">
                @include ('components.xeditable.text', [
                    'id' => 'ville',
                    'label' => 'Ville',
                    'model' => 'associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).ville',
                ])
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.text', [
                    'id' => 'tel_fixe',
                    'label' => 'Téléphone fixe',
                    'model' => 'associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).tel_fixe',
                ])
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.text', [
                    'id' => 'tel_portable',
                    'label' => 'Téléphone portable',
                    'model' => 'associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).tel_portable',
                ])
            </div>
            <div class="xeditable-container">
                @include ('components.xeditable.email', [
                    'id' => 'email',
                    'label' => 'Email',
                    'model' => 'associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).email',
                ])
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.radio', [
                    'id' => 'adherent',
                    'label' => 'Adhérent',
                    'model' => 'associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).adherent',
                    'datasource' => 'associationCtrl.parentController.linkedData.adherent',
                    'displayed' => 'associationCtrl.parentController.staticData.adherent.label(associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).adherent)',
                    'inline' => true,
                ])
            </div>
            <div class="xeditable-container">
                @include('components.xeditable.select', [
                    'id' =>'statut',
                    'label' => 'Statut',
                    'model' => 'associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).statut',
                    'form' => 'associationCtrl.dbDataForm',
                    'name' => 'statut',
                    'displayed' => 'associationCtrl.parentController.staticData.statut_stagiaire.label(associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).statut)',
                    'match_displayed' => '$select.selected.label',
                    'choices_displayed' => 'item.label',
                    'singleProperty' => 'id',
                    'datasource' => 'associationCtrl.parentController.linkedData.statut_stagiaire',
                ])
            </div>
            <div class="xeditable-container" ng-show="associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).statut == 'salarie'">
                <div class="merge-left">
                    <button class="btn btn-default" onclick="associationCtrl.mergeData('statut')">&lt;</button>
                </div>
                @include('components.xeditable.radio-precision', [
                    'id' => 'salarie_type',
                    'label' => 'Type de contrat',
                    'model' => 'associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).salarie_type',
                    'datasource' => 'associationCtrl.parentController.linkedData.salarie_type',
                    'displayed' => 'associationCtrl.parentController.staticData.salarie_type.label(associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).salarie_type, associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).salarie_type_precision)',
                    'precision_model' => 'associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).salarie_type_precision',
                ])
            </div>
            <div class="xeditable-container" ng-show="associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).statut == 'demandeur_emploi'">
                @include('components.xeditable.radio', [
                    'id' => 'demandeur_emploi_type',
                    'model' => 'associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).demandeur_emploi_type',
                    'datasource' => 'associationCtrl.parentController.linkedData.demandeur_emploi_type',
                    'displayed' => 'associationCtrl.parentController.staticData.demandeur_emploi_type.label(associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).demandeur_emploi_type)',
                ])
            </div>
            <div class="xeditable-container" ng-show="associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).statut == 'etudiant'">
                @include('components.xeditable.text', [
                    'id' => 'etudiant_etudes',
                    'label' => 'Etudes',
                    'model' => 'associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).etudiant_etudes',
                ])
            </div>
            <div class="xeditable-container" ng-show="associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).statut == 'autre'">
                @include ('components.xeditable.text', [
                    'id' => 'type_autre',
                    'model' => 'associationCtrl.dbData(associationCtrl.parentController.data, associationCtrl.dbSearch).type_autre'
                ])
            </div>
        </form>
    </div>

</div>
<div class="buttons clearfix">
    <div class="pull-left">
        <div ng-show="associationCtrl.parentController.data.stagiaire_id == null">
            <button type="button" class="btn btn-default" ng-click="associationCtrl.parentController.createStagiaire(associationCtrl.parentController, associationCtrl.parentController.data)">Créer</button>
            <button type="button" class="btn btn-default" ng-show="associationCtrl.dbSearch != null" ng-click="associationCtrl.associate()">Associer</button>
        </div>
        <div ng-show="associationCtrl.parentController.data.stagiaire_id != null">
            <button type="button" class="btn btn-default" ng-click="associationCtrl.parentController.updateStagiaire(associationCtrl.parentController, associationCtrl.parentController.data)">Enregistrer</button>
            <button type="button" class="btn btn-default" ng-click="associationCtrl.parentController.dissociateStagiaire()">Dissocier</button>
        </div>
    </div>
    <div class="pull-right">
        <button type="button" class="btn btn-default" ng-click="associationCtrl.modalInstance.close()">Fermer</button>
    </div>
</div>
