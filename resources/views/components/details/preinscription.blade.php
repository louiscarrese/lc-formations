<div ng-controller="detailController as ctrl">
    <div class="data-block rounded-border" id="infos-stagiaire">
        <form editable-form name="ctrl.mainForm" novalidate="novalidate" onaftersave="ctrl.update()">
            <h2 ng-if="ctrl.data.stagiaire_id != null">Stagiaire
                <input type="button" class="pull-right btn btn-default" value="Dissocier" ng-click="ctrl.dissociateStagiaire(ctrl.data); ctrl.update();" /> 
            </h2>
            <h2 ng-if="ctrl.data.stagiaire_id == null">Stagiaire (non associé)
                <input type="button" class="pull-right btn btn-default" value="Associer" ng-click="ctrl.associateStagiaire(ctrl)" /> 
                <input type="button" class="pull-right btn btn-default" value="Créer" ng-click="ctrl.createStagiaire(ctrl.data)" /> 
            </h2>
            <div class="form-inline">
                @include('components.xeditable.radio', [
                    'id' => 'sexe',
                    'label' => 'Sexe',
                    'model' => 'ctrl.getStagiaire(ctrl.data).sexe',
                    'datasource' => 'ctrl.linkedData.sexe',
                    'displayed' => 'ctrl.staticData.sexe.label(ctrl.data.sexe)',
                    'inline' => true,
                ])
                @include('components.xeditable.text', [
                    'id' => 'nom',
                    'label' => 'Nom',
                    'model' => 'ctrl.getStagiaire(ctrl.data).nom',
                ])
                @include('components.xeditable.text', [
                    'id' => 'prenom',
                    'label' => 'Prénom',
                    'model' => 'ctrl.getStagiaire(ctrl.data).prenom',
                ])
            </div>
            <div class="form-inline">
                @include('components.xeditable.date', [
                    'id' => 'date_naissance',
                    'label' => 'Date de naissance',
                    'model' => 'ctrl.getStagiaire(ctrl.data).date_naissance',
                    'openFlag' => 'ctrl.openedDatePicker.date_naissance',
                    'openFunction' => 'ctrl.openDatePicker($event, \'date_naissance\')',
                ])
            </div>
            <div class="">
                @include('components.xeditable.textarea', [
                    'id' => 'adresse',
                    'label' => 'Adresse',
                    'model' => 'ctrl.getStagiaire(ctrl.data).adresse',
                ])
            </div>
            <div class="form-inline">
                @include('components.xeditable.text', [
                    'id' => 'code_postal',
                    'label' => 'Code postal',
                    'model' => 'ctrl.getStagiaire(ctrl.data).code_postal',
                ])
                @include ('components.xeditable.text', [
                    'id' => 'ville',
                    'label' => 'Ville',
                    'model' => 'ctrl.getStagiaire(ctrl.data).ville',
                ])
            </div>
            <div class="form-inline">
                @include('components.xeditable.text', [
                    'id' => 'tel_fixe',
                    'label' => 'Téléphone fixe',
                    'model' => 'ctrl.getStagiaire(ctrl.data).tel_fixe',
                ])
                @include('components.xeditable.text', [
                    'id' => 'tel_portable',
                    'label' => 'Téléphone portable',
                    'model' => 'ctrl.getStagiaire(ctrl.data).tel_portable',
                ])
                @include ('components.xeditable.email', [
                    'id' => 'email',
                    'label' => 'Email',
                    'model' => 'ctrl.getStagiaire(ctrl.data).email',
                ])
            </div>
            <div class="form-inline">
                @include('components.xeditable.radio', [
                    'id' => 'adherent',
                    'label' => 'Adhérent',
                    'model' => 'ctrl.data.adherent',
                    'datasource' => 'ctrl.linkedData.adherent',
                    'displayed' => 'ctrl.staticData.adherent.label(ctrl.data.adherent)',
                    'inline' => true,
                ])
            </div>
            <div class="">
                @include('components.xeditable.select', [
                    'id' =>'statut',
                    'label' => 'Statut',
                    'model' => 'ctrl.data.statut',
                    'form' => 'ctrl.mainForm',
                    'name' => 'statut',
                    'displayed' => 'ctrl.staticData.statut_stagiaire.label(ctrl.data.statut)',
                    'match_displayed' => '$select.selected.label',
                    'choices_displayed' => 'item.label',
                    'singleProperty' => 'id',
                    'datasource' => 'ctrl.linkedData.statut_stagiaire',
                ])
            </div>
            <div class="" ng-show="ctrl.data.statut == 'salarie'">
                @include('components.xeditable.radio-precision', [
                    'id' => 'salarie_type',
                    'label' => 'Type de contrat',
                    'model' => 'ctrl.data.salarie_type',
                    'datasource' => 'ctrl.linkedData.salarie_type',
                    'displayed' => 'ctrl.staticData.salarie_type.label(ctrl.data.salarie_type, ctrl.data.salarie_type_precision)',
                    'precision_model' => 'ctrl.data.salarie_type_precision',
                ])
            </div>
            <div class="" ng-show="ctrl.data.statut == 'demandeur_emploi'">
                @include('components.xeditable.radio', [
                    'id' => 'demandeur_emploi_type',
                    'model' => 'ctrl.data.demandeur_emploi_type',
                    'datasource' => 'ctrl.linkedData.demandeur_emploi_type',
                    'displayed' => 'ctrl.staticData.demandeur_emploi_type.label(ctrl.data.demandeur_emploi_type)',
                ])
            </div>
            <div class="" ng-show="ctrl.data.statut == 'etudiant'">
                @include('components.xeditable.text', [
                    'id' => 'etudiant_etudes',
                    'label' => 'Etudes',
                    'model' => 'ctrl.data.etudiant_etudes',
                ])
            </div>
            <div class="" ng-show="ctrl.data.statut == 'autre'">
                @include ('components.xeditable.text', [
                    'id' => 'type_autre',
                    'model' => 'ctrl.data.type_autre'
                ])
            </div>

           <div class="buttons">
              <!-- button to show form -->
              <button type="button" class="btn btn-default" ng-click="ctrl.mainForm.$show()" ng-show="!ctrl.mainForm.$visible">Edit</button>
              <!-- buttons to submit / cancel form -->
              <span ng-show="ctrl.mainForm.$visible">
                <button type="submit" class="btn btn-primary" ng-disabled="ctrl.mainForm.$waiting">Save</button>
                <button type="button" class="btn btn-default" ng-disabled="ctrl.mainForm.$waiting" ng-click="ctrl.mainForm.$cancel()">Cancel</button>
              </span>
            </div>
        </form>
    </div>
    <div class="data-block rounded-border" id="renseignements-stagiaire">
        <form editable-form name="ctrl.renseignementsStagiaireForm" novalidate="novalidate" onaftersave="ctrl.update()">
            <h2>Renseignements complémentaires</h2>
            <div class="">
                @include('components.xeditable.text', [
                    'id' => 'profession',
                    'label' => 'Quelle est votre fonction / profession dans la structure pour laquelle vous suivez la ou les formations ?',
                    'model' => 'ctrl.data.profession',
                ])
            </div>
            <div class="">
                @include('components.xeditable.textarea', [
                    'id' => 'experiences',
                    'label' => 'Vos expériences professionnelles et personnelles dans le domaine culturel et artistique',
                    'model' => 'ctrl.data.experiences',
                ])
            </div>
            <div class="">
                @include('components.xeditable.textarea', [
                    'id' => 'suggestions',
                    'label' => 'Avez vous des suggestions de formation ?',
                    'model' => 'ctrl.data.suggestions',
                ])
            </div>
            <div class="">
                @include('components.xeditable.textarea', [
                    'id' => 'formations_precedentes',
                    'label' => 'Avez vous déjà suivi une formation en lien avec le secteur des musiques actuelles et/ou du spectacle vivant (si oui, intitulé, organisme et date) ?',
                    'model' => 'ctrl.data.formations_precedentes',
                ])
            </div>
            {{--
            <div class="form-group">
                @include('components.xeditable.select', [
                    'id' =>'statut',
                    'label' => 'Statut',
                    'model' => 'ctrl.data.statut',
                    'form' => 'ctrl.mainForm',
                    'name' => 'statut',
                    'displayed' => 'ctrl.getStatutLabel(ctrl.data.statut)',
                    'singleProperty' => 'id',
                    'datasource' => 'ctrl.linkedData.status',
                ])
                @include('components.xeditable.date', [
                    'id' => 'date_naissance',
                    'label' => 'Date de naissance',
                    'model' => 'ctrl.data.date_naissance',
                    'openFlag' => 'ctrl.openedDatePicker.date_naissance',
                    'openFunction' => 'ctrl.openDatePicker($event, \'date_naissance\')',
                ])
            </div>
            <div class="form-group">
                @include('components.xeditable.radio', [
                    'id' => 'salarie_type',
                    'label' => 'Type de contrat',
                    'model' => 'ctrl.data.salarie_type',
                    'displayed' => 'ctrl.getSalarieTypeLabel(ctrl.data.salarie_type)',
                    'datasource' => 'ctrl.linkedData.salarie_types',
                ])
            </div>
            <div class="form-group">
                <span editable-radiolist-precision="ctrl.data.trut" e-ng-options="item.id as item.label for item in ctrl.linkedData.salarie_types" precision-model="ctrl.data.trut_precision" p>@{{ctrl.data.trut}}</span>
            </div>
--}}
                <div class="buttons">
                  <!-- button to show form -->
                  <button type="button" class="btn btn-default" ng-click="ctrl.renseignementsStagiaireForm.$show()" ng-show="!ctrl.renseignementsStagiaireForm.$visible">Edit</button>
                  <!-- buttons to submit / cancel form -->
                  <span ng-show="ctrl.renseignementsStagiaireForm.$visible">
                    <button type="submit" class="btn btn-primary" ng-disabled="ctrl.renseignementsStagiaireForm.$waiting">Save</button>
                    <button type="button" class="btn btn-default" ng-disabled="ctrl.renseignementsStagiaireForm.$waiting" ng-click="ctrl.renseignementsStagiaireForm.$cancel()">Cancel</button>
                  </span>
                </div>
            </form>

        </div>

        <div class="rounded-border" id="sessions">
            <h2>Formations</h2>
            <div ng-repeat="preinscription_session in ctrl.data.preinscription_sessions track by $index">
                <form editable-form name="ctrl.inscriptionForm[@{{$index}}]" novalidate="novalidate" onaftersave="ctrl.update()">
                    {{-- Header --}}
                    <div class="inscription-header clearfix">
                        <span class="pull-left btn">@{{preinscription_session.session.libelle}}</span>
                        <input type="button" class="pull-right btn btn-default" ng-click="preinscription_session.collapsed = !preinscription_session.collapsed" value="Réduire"></button>
                        <button class="pull-right btn btn-default" ng-click="ctrl.removeInscription($index)">Supprimer</button>
                    </div>
                    <div uib-collapse="preinscription_session.collapsed">
                        <div class="">
                            @include('components.xeditable.radio', [
                                'id' => 'tarif_id',
                                'label' => 'Tarif',
                                'model' => 'preinscription_session.tarif_id',
                                'datasource' => 'preinscription_session.session.module.tarifs',
                                'optionLabel' => 'tarif_type.libelle',
                                'displayed' => 'preinscription_session.session.module.tarifs[preinscription_session.tarif_id].tarif_type.libelle',
                                'inline' => true,
                            ])
                        </div>
                        <h3>Financement</h3>
                        <div class="">
                            @include('components.xeditable.select', [
                                'id' =>'financement_type',
                                'label' => 'Financement',
                                'model' => 'preinscription_session.financement',
                                'form' => 'ctrl.inscriptionForm[$index]',
                                'name' => 'financementType',
                                'displayed' => 'ctrl.staticData.financement_type.label(preinscription_session.financement)',
                                'match_displayed' => '$select.selected.label',
                                'choices_displayed' => 'item.label',
                                'singleProperty' => 'id',
                                'datasource' => 'ctrl.linkedData.financement_type',
                            ])
                        </div>

                        <div ng-show="preinscription_session.financement == 'employeur'">
                            <div class="form-inline-2">
                                    @include('components.xeditable.text', [
                                        'id' => 'nom_structure',
                                        'label' => 'Nom de la structure',
                                        'model' => 'preinscription_session.financement_employeur_nom_strucutre',
                                    ])
                                    @include('components.xeditable.text', [
                                        'id' => 'secteur_activite',
                                        'label' => 'Secteur d\'activité',
                                        'model' => 'preinscription_session.financement_employeur_secteur_activite'
                                    ])
                            </div>
                            <div class="form-inline-2">
                                @include('components.xeditable.text', [
                                    'id' => 'signataire',
                                    'label' => 'Signataire de la convention de formation',
                                    'model' => 'preinscription_session.financement_employeur_signataire'
                                ])
                            </div>
                            <div class="">
                                @include('components.xeditable.textarea', [
                                    'id' => 'adresse',
                                    'label' => 'Adresse',
                                    'model' => 'preinscription_session.financement_employeur_adresse'
                                ])
                            </div>
                            <div class="form-inline-4">
                                @include('components.xeditable.text', [
                                    'id' => 'code_postal',
                                    'label' => 'Code postal',
                                    'model' => 'preinscription_session.financement_employeur_code_postal'
                                ])
                                @include('components.xeditable.text', [
                                    'id' => 'ville',
                                    'label' => 'Ville',
                                    'model' => 'preinscription_session.financement_employeur_ville'
                                ])
                            </div>
                            <div class="form-inline-4">
                                @include('components.xeditable.text', [
                                    'id' => 'tel',
                                    'label' => 'Téléphone',
                                    'model' => 'preinscription_session.financement_employeur_email'
                                ])
                                @include('components.xeditable.email', [
                                    'id' => 'email',
                                    'label' => 'Email',
                                    'model' => 'preinscription_session.financement_employeur_secteur_email'
                                ])
                            </div>
                            <div class="form-inline-3">
                                @include('components.xeditable.text', [
                                    'id' => 'siret',
                                    'label' => 'SIRET',
                                    'model' => 'preinscription_session.financement_employeur_siret'
                                ])
                                @include('components.xeditable.text', [
                                    'id' => 'naf',
                                    'label' => 'NAF',
                                    'model' => 'preinscription_session.financement_employeur_naf'
                                ])
                                @include('components.xeditable.text', [
                                    'id' => 'effectif',
                                    'label' => 'Effectif de la structure (permanents)',
                                    'model' => 'preinscription_session.financement_employeur_effectif'
                                ])
                            </div>
                        </div>

                        <div ng-show="preinscription_session.financement == 'afdas'">
                            <div class="">
                                @include('components.xeditable.radio', [
                                    'id' => 'intermittent',
                                    'label' => '',
                                    'model' => 'preinscription_session.financement_afdas_intermittent',
                                    'datasource' => 'ctrl.linkedData.financement_afdas',
                                    'displayed' => 'ctrl.staticData.financement_afdas.label(preinscription_session.financement_afdas_intermittent)',
                                ])
                            </div>
                        </div>
                        <div ng-show="preinscription_session.financement == 'autre'">
                            <div class="">
                                @include('components.xeditable.radio-precision', [
                                    'id' => 'financement_autre',
                                    'label' => '',
                                    'model' => 'preinscription_session.financement_autre',
                                    'datasource' => 'ctrl.linkedData.financement_autre',
                                    'displayed' => 'ctrl.staticData.financement_autre.label(preinscription_session.financement_autre)',
                                    'precision_model' => 'preinscription_session.financement_autre_precision',
                                ])
                            </div>
                        </div>
                        <h3>Renseignements complémentaires</h3>
                        <div class="">
                            @include('components.xeditable.textarea', [
                                'id' => 'attentes',
                                'label' => 'Qu\'attendez vous de la formation ? Quels thèmes souhaitez-vous aborder en particulier ?',
                                'model' => 'preinscription_session.attentes'
                            ])
                        </div>
                    </div>
                    <div class="buttons">
                      <!-- button to show form -->
                      <button type="button" class="btn btn-default" ng-click="ctrl.inscriptionForm[$index].$show()" ng-show="!ctrl.inscriptionForm[$index].$visible">Edit</button>
                      <!-- buttons to submit / cancel form -->
                      <span ng-show="ctrl.inscriptionForm[$index].$visible">
                        <button type="submit" class="btn btn-primary" ng-disabled="ctrl.inscriptionForm[$index].$waiting">Save</button>
                        <button type="button" class="btn btn-default" ng-disabled="ctrl.inscriptionForm[$index].$waiting" ng-click="ctrl.inscriptionForm[$index].$cancel()">Cancel</button>
                      </span>
                    </div>
                </form>
            </div><!-- main repeater -->

        </div>



    <div>
        <span>genre : @{{ctrl.data.genre}}</span>
    </div>

</div>
