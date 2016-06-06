<div>
<h2>Association du stagiaire</h2>
<div class="association">
    <div class="left-column">        
        <h3>Préinscription</h3>
        <form editable-form shown="true" name="associationCtrl.sourceDataForm" novalidate="novalidate">
            <div class="">
                @include('components.xeditable.radio', [
                    'id' => 'sexe',
                    'label' => 'Sexe',
                    'model' => 'associationCtrl.preinscriptionData.sexe',
                    'datasource' => 'associationCtrl.parentController.linkedData.sexe',
                    'displayed' => 'associationCtrl.parentController.staticData.sexe.label(associationCtrl.parentController.data.sexe)',
                    'inline' => true,
                ])
            </div>
            <div class="">
                @include('components.xeditable.text', [
                    'id' => 'nom',
                    'label' => 'Nom',
                    'model' => 'associationCtrl.preinscriptionData.nom',
                ])
            </div>
            <div class="">
                @include('components.xeditable.text', [
                    'id' => 'prenom',
                    'label' => 'Prénom',
                    'model' => 'associationCtrl.preinscriptionData.prenom',
                ])
            </div>  
            <div class="form-inline">
                @include('components.xeditable.date', [
                    'id' => 'date_naissance',
                    'label' => 'Date de naissance',
                    'model' => 'associationCtrl.preinscriptionData.date_naissance',
                    'openFlag' => 'ctrl.openedDatePicker.date_naissance',
                    'openFunction' => 'ctrl.openDatePicker($event, \'date_naissance\')',
                ])
            </div>
            <div class="">
                @include('components.xeditable.textarea', [
                    'id' => 'adresse',
                    'label' => 'Adresse',
                    'model' => 'associationCtrl.preinscriptionData.adresse',
                ])
            </div>
            <div class="">
                @include('components.xeditable.text', [
                    'id' => 'code_postal',
                    'label' => 'Code postal',
                    'model' => 'associationCtrl.preinscriptionData.code_postal',
                ])
                @include ('components.xeditable.text', [
                    'id' => 'ville',
                    'label' => 'Ville',
                    'model' => 'associationCtrl.preinscriptionData.ville',
                ])
            </div>
            <div class="">
                @include('components.xeditable.text', [
                    'id' => 'tel_fixe',
                    'label' => 'Téléphone fixe',
                    'model' => 'associationCtrl.preinscriptionData.tel_fixe',
                ])
                @include('components.xeditable.text', [
                    'id' => 'tel_portable',
                    'label' => 'Téléphone portable',
                    'model' => 'associationCtrl.preinscriptionData.tel_portable',
                ])
                @include ('components.xeditable.email', [
                    'id' => 'email',
                    'label' => 'Email',
                    'model' => 'associationCtrl.preinscriptionData.email',
                ])
            </div>
            <div class="">
                @include('components.xeditable.radio', [
                    'id' => 'adherent',
                    'label' => 'Adhérent',
                    'model' => 'associationCtrl.preinscriptionData.adherent',
                    'datasource' => 'associationCtrl.parentController.linkedData.adherent',
                    'displayed' => 'associationCtrl.parentController.staticData.adherent.label(associationCtrl.preinscriptionData.adherent)',
                    'inline' => true,
                ])
            </div>
            <div class="">
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
                ])
            </div>
            <div class="" ng-show="associationCtrl.preinscriptionData.statut == 'salarie'">
                @include('components.xeditable.radio-precision', [
                    'id' => 'salarie_type',
                    'label' => 'Type de contrat',
                    'model' => 'associationCtrl.preinscriptionData.salarie_type',
                    'datasource' => 'associationCtrl.parentController.linkedData.salarie_type',
                    'displayed' => 'associationCtrl.parentController.staticData.salarie_type.label(associationCtrl.preinscriptionData.salarie_type, associationCtrl.preinscriptionData.salarie_type_precision)',
                    'precision_model' => 'associationCtrl.preinscriptionData.salarie_type_precision',
                ])
            </div>
            <div class="" ng-show="associationCtrl.preinscriptionData.statut == 'demandeur_emploi'">
                @include('components.xeditable.radio', [
                    'id' => 'demandeur_emploi_type',
                    'model' => 'associationCtrl.preinscriptionData.demandeur_emploi_type',
                    'datasource' => 'associationCtrl.parentController.linkedData.demandeur_emploi_type',
                    'displayed' => 'associationCtrl.parentController.staticData.demandeur_emploi_type.label(associationCtrl.preinscriptionData.demandeur_emploi_type)',
                ])
            </div>
            <div class="" ng-show="associationCtrl.preinscriptionData.statut == 'etudiant'">
                @include('components.xeditable.text', [
                    'id' => 'etudiant_etudes',
                    'label' => 'Etudes',
                    'model' => 'associationCtrl.preinscriptionData.etudiant_etudes',
                ])
            </div>
            <div class="" ng-show="associationCtrl.preinscriptionData.statut == 'autre'">
                @include ('components.xeditable.text', [
                    'id' => 'type_autre',
                    'model' => 'associationCtrl.preinscriptionData.type_autre'
                ])
            </div>
        </form>
    </div>

    <div class="right-column">
        <h3>Base de données</h3>
        <div class="search">
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
        <form editable-form shown="true" name="associationCtrl.dbDataForm" novalidate="novalidate">
            <div class="">
                @include('components.xeditable.radio', [
                    'id' => 'sexe',
                    'label' => 'Sexe',
                    'model' => 'associationCtrl.dbSearch.sexe',
                    'datasource' => 'associationCtrl.parentController.linkedData.sexe',
                    'displayed' => 'associationCtrl.parentController.staticData.sexe.label(associationCtrl.parentController.data.sexe)',
                    'inline' => true,
                ])
            </div>
            <div class="">
                @include('components.xeditable.text', [
                    'id' => 'nom',
                    'label' => 'Nom',
                    'model' => 'associationCtrl.dbSearch.nom',
                ])
            </div>
            <div class="">
                @include('components.xeditable.text', [
                    'id' => 'prenom',
                    'label' => 'Prénom',
                    'model' => 'associationCtrl.dbSearch.prenom',
                ])
            </div>  
            <div class="form-inline">
                @include('components.xeditable.date', [
                    'id' => 'date_naissance',
                    'label' => 'Date de naissance',
                    'model' => 'associationCtrl.dbSearch.date_naissance',
                    'openFlag' => 'ctrl.openedDatePicker.date_naissance',
                    'openFunction' => 'ctrl.openDatePicker($event, \'date_naissance\')',
                ])
            </div>
            <div class="">
                @include('components.xeditable.textarea', [
                    'id' => 'adresse',
                    'label' => 'Adresse',
                    'model' => 'associationCtrl.dbSearch.adresse',
                ])
            </div>
            <div class="">
                @include('components.xeditable.text', [
                    'id' => 'code_postal',
                    'label' => 'Code postal',
                    'model' => 'associationCtrl.dbSearch.code_postal',
                ])
                @include ('components.xeditable.text', [
                    'id' => 'ville',
                    'label' => 'Ville',
                    'model' => 'associationCtrl.dbSearch.ville',
                ])
            </div>
            <div class="">
                @include('components.xeditable.text', [
                    'id' => 'tel_fixe',
                    'label' => 'Téléphone fixe',
                    'model' => 'associationCtrl.dbSearch.tel_fixe',
                ])
                @include('components.xeditable.text', [
                    'id' => 'tel_portable',
                    'label' => 'Téléphone portable',
                    'model' => 'associationCtrl.dbSearch.tel_portable',
                ])
                @include ('components.xeditable.email', [
                    'id' => 'email',
                    'label' => 'Email',
                    'model' => 'associationCtrl.dbSearch.email',
                ])
            </div>
            <div class="">
                @include('components.xeditable.radio', [
                    'id' => 'adherent',
                    'label' => 'Adhérent',
                    'model' => 'associationCtrl.dbSearch.adherent',
                    'datasource' => 'associationCtrl.parentController.linkedData.adherent',
                    'displayed' => 'associationCtrl.parentController.staticData.adherent.label(associationCtrl.dbSearch.adherent)',
                    'inline' => true,
                ])
            </div>
            <div class="">
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
            <div class="" ng-show="associationCtrl.dbSearch.statut == 'salarie'">
                @include('components.xeditable.radio-precision', [
                    'id' => 'salarie_type',
                    'label' => 'Type de contrat',
                    'model' => 'associationCtrl.dbSearch.salarie_type',
                    'datasource' => 'associationCtrl.parentController.linkedData.salarie_type',
                    'displayed' => 'associationCtrl.parentController.staticData.salarie_type.label(associationCtrl.dbSearch.salarie_type, associationCtrl.dbSearch.salarie_type_precision)',
                    'precision_model' => 'associationCtrl.dbSearch.salarie_type_precision',
                ])
            </div>
            <div class="" ng-show="associationCtrl.dbSearch.statut == 'demandeur_emploi'">
                @include('components.xeditable.radio', [
                    'id' => 'demandeur_emploi_type',
                    'model' => 'associationCtrl.dbSearch.demandeur_emploi_type',
                    'datasource' => 'associationCtrl.parentController.linkedData.demandeur_emploi_type',
                    'displayed' => 'associationCtrl.parentController.staticData.demandeur_emploi_type.label(associationCtrl.dbSearch.demandeur_emploi_type)',
                ])
            </div>
            <div class="" ng-show="associationCtrl.dbSearch.statut == 'etudiant'">
                @include('components.xeditable.text', [
                    'id' => 'etudiant_etudes',
                    'label' => 'Etudes',
                    'model' => 'associationCtrl.dbSearch.etudiant_etudes',
                ])
            </div>
            <div class="" ng-show="associationCtrl.dbSearch.statut == 'autre'">
                @include ('components.xeditable.text', [
                    'id' => 'type_autre',
                    'model' => 'associationCtrl.dbSearch.type_autre'
                ])
            </div>
        </form>{{--

        </div>
        <div class="">
            @include('components.xeditable.radio', [
                'id' => 'sexe',
                'label' => 'Sexe',
                'model' => '$scope.parentController.getStagiaire($scope.$parent.data).sexe',
                'datasource' => '$scope.$parent.linkedData.sexe',
                'displayed' => '$scope.$parent.staticData.sexe.label($scope.$parent.data.sexe)',
                'inline' => true,
            ])
        </div>
        <div class="">
            @include('components.xeditable.text', [
                'id' => 'nom',
                'label' => 'Nom',
                'model' => '$scope.$parent.getStagiaire($scope.$parent.data).nom',
            ])
        </div>
        <div class="">
            @include('components.xeditable.text', [
                'id' => 'prenom',
                'label' => 'Prénom',
                'model' => '$scope.$parent.getStagiaire($scope.$parent.data).prenom',
            ])
        </div>  
        --}}
    </div>

    <!-- Needs to be after both floats so it aligns correctly -->
    <div class="center-column">
        &lt;&nbsp;&gt;
    </div>
</div>
<div>
    A footer, just to see
</div>
