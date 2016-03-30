<!doctype html>
<html ng-app="preinscriptionsApp">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Jardin Moderne - Préinscription aux formations</title>
        <link rel="stylesheet" href="css/app.css" type="text/css" />
        <link rel="stylesheet" href="css/select.min.css" type="text/css" />
        <script type="text/javascript" src="js/preinscriptions.js"></script>
    </head>
    <body >
        <div id="main" class="container" ng-controller="preinscriptionsController as ctrl">
            <form novalidate="novalidate" name="ctrl.form" ng-submit='ctrl.submit()'>
                <div class="main-block" id="infos-stagiaire">
                    <h2>Participant</h2>
                    {{-- Nom Prénom--}}
                    <div class="form-group form-inline">
                        @include('components.preinscription.inputs.radio', [
                            'field' => [
                                'id' => 'genre',
                                'inline' => true,
                                'model' => 'ctrl.data.genre',
                                'datasource' => 'ctrl.externalData.stagiaire_genre',
                                'validation' => 'required',
                                'validationController' => 'ctrl.form.genre',
                            ]
                        ])
                        @include('components.preinscription.inputs.text', [
                            'field' => [
                                'id' => 'nom',
                                'label' => 'Nom',
                                'model' => 'ctrl.data.nom',
                                'validation' => 'required',
                                'validationController' => 'ctrl.form.nom',
                            ]
                        ])
                        @include('components.preinscription.inputs.text', [
                            'field' => [
                                'id' => 'prenom',
                                'label' => 'Prénom',
                                'model' => 'ctrl.data.prenom',
                                'validation' => 'required',
                                'validationController' => 'ctrl.form.prenom',
                            ]
                        ])
                    </div>
                    {{-- Date de naissance--}}
                    <div class="form-group form-inline">
                        @include('components.preinscription.inputs.date', [
                            'field' => [
                                'id' => 'datenaissance',
                                'label' => 'Date de naissance',
                                'model' => 'ctrl.data.date_naissance',
                                'validation' => 'recommended',
                                'validationController' => 'ctrl.form.date_naissance',
                            ]
                        ])
                    </div>
                    {{-- Adresse--}}
                    <div class="form-group">
                        @include('components.preinscription.inputs.textarea', [
                            'field' => [
                                'id' => 'adresse',
                                'label' => 'Adresse',
                                'model' => 'ctrl.data.adresse',
                                'validation' => 'recommended',
                                'validationController' => 'ctrl.form.adresse',
                            ]
                        ])
                    </div>
                    {{-- Code postal Ville --}}
                    <div class="form-group form-inline">
                        @include('components.preinscription.inputs.text', [
                            'field' => [
                                'id' => 'code_postal',
                                'label' => 'Code Postal',
                                'model' => 'ctrl.data.code_postal',
                                'validation' => 'recommended',
                                'validationController' => 'ctrl.form.code_postal',
                            ]
                        ])
                        @include('components.preinscription.inputs.text', [
                            'field' => [
                                'id' => 'ville',
                                'label' => 'Ville',
                                'model' => 'ctrl.data.ville',
                                'validation' => 'recommended',
                                'validationController' => 'ctrl.form.ville',
                            ]
                        ])
                    </div>
                    {{-- Tel fixe Tel portable Email --}}
                    <div class="form-group form-inline">
                        @include('components.preinscription.inputs.text', [
                            'field' => [
                                'id' => 'tel_fixe',
                                'label' => 'Téléphone fixe',
                                'model' => 'ctrl.data.tel_fixe',
                                'validationController' => 'ctrl.form.tel_fixe',
                            ]
                        ])
                        @include('components.preinscription.inputs.text', [
                            'field' => [
                                'id' => 'tel_portable',
                                'label' => 'Téléphone portable',
                                'model' => 'ctrl.data.tel_portable',
                                'validationController' => 'ctrl.form.tel_portable',
                            ]
                        ])
                        @include('components.preinscription.inputs.text', [
                            'field' => [
                                'id' => 'email',
                                'type' => 'email',
                                'label' => 'Email',
                                'model' => 'ctrl.data.email',
                                'validation' => 'required',
                                'validationController' => 'ctrl.form.email',
                            ]
                        ])
                    </div>
                    {{-- Adherent --}}
                    <div class="form-group form-inline">
                        <label>Vous êtes </label>
                        @include('components.preinscription.inputs.radio', [
                            'field' => [
                                'id' => 'adherent',
                                'inline' => true,
                                'model' => 'ctrl.data.adherent',
                                'datasource' => 'ctrl.externalData.stagiaire_adherent',
                                'validation' => 'required',
                                'validationController' => 'ctrl.form.adherent',
                            ]
                        ])
                    </div>

                    <h3>Statut</h3>
                    <div class="form-group">
                        @include('components.preinscription.inputs.select', [
                            'field' => [
                                'id' => 'statut',
                                'label' => '',
                                'model' => 'ctrl.data.statut',
                                'datasource' => 'ctrl.externalData.stagiaire_statut',
                                'validation' => 'required',
                                'updateOn' => 'default',
                                'validationController' => 'ctrl.form.statut',
                            ]
                        ])
                    </div>
                    <div class="form-group" ng-show="ctrl.data.statut.id == 'salarie'">
                        @include('components.preinscription.inputs.radio', [
                            'field' => [
                                'id' => 'salarie_type',
                                'inline' => 'false',
                                'model' => 'ctrl.data.salarie_type',
                                'datasource' => 'ctrl.externalData.salarie_types',
                                'validation' => 'ng-required=ctrl.data.statut.id==\'salarie\'',
                                'validationController' => 'ctrl.form.salarie_type',
                            ]
                        ])
                    </div>
                    <div class="form-group" ng-show="ctrl.data.statut.id == 'demandeur_emploi'">
                        @include('components.preinscription.inputs.radio', [
                            'field' => [
                                'id' => 'demandeur_emploi_type',
                                'inline' => 'false',
                                'model' => 'ctrl.data.demandeur_emploi_type',
                                'datasource' => 'ctrl.externalData.demandeur_emploi_types',
                                'validation' => 'ng-required=ctrl.data.statut.id==\'demandeur_emploi\'',
                                'validationController' => 'ctrl.form.demandeur_emploi_type',
                            ]
                        ])
                    </div>
                    <div class="form-group" ng-show="ctrl.data.statut.id == 'etudiant'">
                        @include('components.preinscription.inputs.text', [
                            'field' => [
                                'id' => 'etudiant_etudes',
                                'inline' => false,
                                'model' => 'ctrl.data.etudiant_etudes',
                                'label' => 'Etudes',
                                'validation' => 'ng-required=ctrl.data.statut.id==\'etudiant\'',
                                'validationController' => 'ctrl.form.etudiant_etudes',
                            ]
                        ])
                    </div>
                    <div class="form-group" ng-show="ctrl.data.statut.id == 'autre'">
                        @include('components.preinscription.inputs.text', [
                            'field' => [
                                'id' => 'type_autre',
                                'inline' => false,
                                'model' => 'ctrl.data.type_autre',
                                'label' => 'Précisez',
                                'validation' => 'ng-required=ctrl.data.statut.id==\'autre\'',
                                'validationController' => 'ctrl.form.type_autre',
                            ]
                        ])
                    </div>
                    <h3>Renseignements complémentaires</h3>
                    <div class="form-group">
                        @include('components.preinscription.inputs.text', [
                            'field' => [
                                'id' => 'profession',
                                'label' => 'Quelle est votre fonction / profession dans la structure pour laquelle vous suivez la ou les formations ?',
                                'model' => 'ctrl.data.profession',
                                'validationController' => 'ctrl.form.profession',
                            ]
                        ])
                    </div>
                    <div class="form-group">
                        @include('components.preinscription.inputs.textarea', [
                            'field' => [
                                'id' => 'experiences',
                                'label' => 'Vos expériences professionnelles et personnelles dans le domaine culturel et artistique',
                                'model' => 'ctrl.data.experiences',
                                'validationController' => 'ctrl.form.experiences',
                            ]
                        ])
                    </div>
                    <div class="form-group">
                        @include('components.preinscription.inputs.textarea', [
                            'field' => [
                                'id' => 'suggestions',
                                'label' => 'Avez-vous des suggestions de formation ?',
                                'model' => 'ctrl.data.suggestions',
                                'validationController' => 'ctrl.form.suggestions',
                            ]
                        ])
                    </div>
                    <div class="form-group">
                        @include('components.preinscription.inputs.textarea', [
                            'field' => [
                                'id' => 'formations_precedentes',
                                'label' => 'Avez-vous déjà suivi une formation en lien avec le secteur des Musiques Actuelles et/ou du spectacle vivant (si oui, intitulé, organisme et date) ?',
                                'model' => 'ctrl.data.formations_precedentes',
                                'validationController' => 'ctrl.form.formations_precedentes',
                            ]
                        ])
                    </div>
                </div>

                <div class="main-block">
                    <h2>Formations</h2>
                    {{-- Main repeater --}}
                    <div ng-repeat="preinscription_session in ctrl.data.preinscription_sessions track by $index" class="inscription">
                        <div ng-form="ctrl.inscriptionForm[@{{$index}}]">
                            {{-- Header --}}
                            <div class="inscription-header clearfix">
                                <span class="pull-left btn">@{{preinscription_session.session.label}}</span>
                                <button class="pull-right btn btn-default" ng-click="preinscription_session.collapsed = !preinscription_session.collapsed">Réduire</button>
                                <button class="pull-right btn btn-default" ng-click="ctrl.removeInscription($index)">Supprimer</button>
                            </div>
                            {{-- Content --}}
                            <div class="inscription-content" uib-collapse="preinscription_session.collapsed">
                                {{-- Tarif --}}
                                <div class="form-group">
                                    <span>Tarif : </span>
                                    @include('components.preinscription.inputs.radio', [
                                        'field' => [
                                            'id' => 'tarif_id',
                                            'inline' => true,
                                            'model' => 'preinscription_session.tarif_id',
                                            'datasource' => 'preinscription_session.session.module.tarifs',
                                            'validationController' => 'ctrl.inscriptionForm[$index].tarif_id',
                                        ]
                                    ])
                                </div>
                                {{-- Financement --}}
                                <h3>Financement</h3>
                                <div class="form-group">
                                    @include('components.preinscription.inputs.select', [
                                        'field' => [
                                            'id' => 'financement_type',
                                            'label' => 'Financement',
                                            'model' => 'preinscription_session.financement_type',
                                            'datasource' => 'ctrl.externalData.financements_types',
                                            'updateOn' => 'default',
                                            'validationController' => 'ctrl.inscriptionForm[$index].financement_type',
                                        ]
                                    ])
                                </div>
                                {{-- Financement employeur --}}
                                <div ng-show="preinscription_session.financement_type.id == 'employeur'">
                                    <div class="form-group form-inline clearfix">
                                        @include('components.preinscription.inputs.text', [
                                            'field' => [
                                                'id' => 'nom_structure',
                                                'label' => 'Nom de la structure',
                                                'model' => 'preinscription_session.financement_employeur_nom_structure',
                                                'additional_classes' => 'line-2',
                                                'validation' => 'ng-required=inscription.financement_type.id==\'employeur\'',
                                                'validationController' => 'ctrl.inscriptionForm[$index].nom_structure'
                                            ]
                                        ])
                                        @include('components.preinscription.inputs.text', [
                                            'field' => [
                                                'id' => 'secteur_activite',
                                                'label' => 'Secteur d\'activité',
                                                'model' => 'preinscription_session.financement_employeur_secteur_activite',
                                                'validationController' => 'ctrl.inscriptionForm[$index].secteur_activite',
                                                'additional_classes' => 'line-2 pull-right',
                                                'validation' => 'ng-required=preinscription_session.financement_type.id==\'employeur\'',
                                            ]
                                        ])
                                    </div>
                                    <div class="form-group">
                                        @include('components.preinscription.inputs.text', [
                                            'field' => [
                                                'id' => 'signataire',
                                                'label' => 'Signataire de la convention de formation',
                                                'model' => 'preinscription_session.financement_employeur_signataire',
                                                'validationController' => 'ctrl.inscriptionForm[$index].signataire',
                                                'validation' => 'ng-required=preinscription_session.financement_type.id==\'employeur\'',
                                            ]
                                        ])
                                    </div>
                                    {{-- Adresse--}}
                                    <div class="form-group">
                                        @include('components.preinscription.inputs.textarea', [
                                            'field' => [
                                                'id' => 'adresse',
                                                'label' => 'Adresse',
                                                'model' => 'preinscription_session.financement_employeur_adresse',
                                                'validationController' => 'ctrl.inscriptionForm[$index].adresse',
                                                'validation' => 'ng-required=preinscription_session.financement_type.id==\'employeur\'',
                                            ]
                                        ])
                                    </div>
                                    {{-- Code postal Ville --}}
                                    <div class="form-group form-inline clearfix">
                                        @include('components.preinscription.inputs.text', [
                                            'field' => [
                                                'id' => 'code_postal',
                                                'label' => 'Code Postal',
                                                'model' => 'preinscription_session.financement_employeur_code_postal',
                                                'additional_classes' => 'line-2',
                                                'validationController' => 'ctrl.inscriptionForm[$index].code_postal',
                                                'validation' => 'ng-required=preinscription_session.financement_type.id==\'employeur\'',
                                            ]
                                        ])
                                        @include('components.preinscription.inputs.text', [
                                            'field' => [
                                                'id' => 'ville',
                                                'label' => 'Ville',
                                                'model' => 'preinscription_session.financement_employeur_ville',
                                                'additional_classes' => 'line-2 pull-right',
                                                'validationController' => 'ctrl.inscriptionForm[$index].ville',
                                                'validation' => 'ng-required=preinscription_session.financement_type.id==\'employeur\'',
                                            ]
                                        ])
                                    </div>
                                    {{-- Tel Email --}}
                                    <div class="form-group form-inline clearfix">
                                        @include('components.preinscription.inputs.text', [
                                            'field' => [
                                                'id' => 'tel',
                                                'label' => 'Téléphone',
                                                'model' => 'preinscription_session.financement_employeur_tel',
                                                'additional_classes' => 'line-2',
                                                'validationController' => 'ctrl.inscriptionForm[$index].tel',
                                                'validation' => 'ng-required=preinscription_session.financement_type_id==\'employeur\'',
                                            ]
                                        ])
                                        @include('components.preinscription.inputs.text', [
                                            'field' => [
                                                'id' => 'email',
                                                'type' => 'email',
                                                'label' => 'Email',
                                                'model' => 'preinscription_session.financement_employeur_email',
                                                'additional_classes' => 'line-2 pull-right',
                                                'validationController' => 'ctrl.inscriptionForm[$index].email',
                                                'validation' => 'ng-required=preinscription_session.financement_type.id==\'employeur\'',
                                            ]
                                        ])
                                    </div>
                                    {{-- SIRET NAF Effectif --}}
                                    <div class="form-group form-inline clearfix">
                                        @include('components.preinscription.inputs.text', [
                                            'field' => [
                                                'id' => 'siret',
                                                'label' => 'SIRET',
                                                'model' => 'preinscription_session.financement_employeur_siret',
                                                'additional_classes' => 'line-3',
                                                'validationController' => 'ctrl.inscriptionForm[$index].siret',
                                                'validation' => 'ng-required=preinscription_session.financement_type.id==\'employeur\'',
                                            ]
                                        ])
                                        @include('components.preinscription.inputs.text', [
                                            'field' => [
                                                'id' => 'naf',
                                                'label' => 'Code NAF',
                                                'model' => 'preinscription_session.financement_employeur_naf',
                                                'additional_classes' => 'line-3',
                                                'validationController' => 'ctrl.inscriptionForm[$index].naf',
                                                'validation' => 'ng-required=preinscription_session.financement_type.id==\'employeur\'',
                                            ]
                                        ])
                                        @include('components.preinscription.inputs.text', [
                                            'field' => [
                                                'id' => 'effectif',
                                                'label' => 'Effectif de la structure (permanents)',
                                                'model' => 'preinscription_session.financement_employeur_effectif',
                                                'additional_classes' => 'line-3 pull-right',
                                                'validationController' => 'ctrl.inscriptionForm[$index].effectif',
                                                'validation' => 'ng-required=preinscription_session.financement_type.id==\'employeur\'',
                                            ]
                                        ])
                                    </div>
                                </div> {{-- /Financement employeur --}}
                                {{-- Financement personnel --}}
                                <div ng-show="preinscription_session.financement_type.id == 'personnel'">
                                    <span class="help-block">Vous pourrez bénéficier du tarif "demandeur d'emploi" sur présentation de justificatifs</span>
                                </div>
                                {{-- Financement afdas --}}
                                <div ng-show="preinscription_session.financement_type.id == 'afdas'">
                                    @include('components.preinscription.inputs.radio', [
                                        'field' => [
                                            'id' => 'intermittent',
                                            'inline' => true,
                                            'model' => 'preinscription_session.financement_afdas_intermittent',
                                            'datasource' => 'ctrl.externalData.financement_afdas',
                                            'validationController' => 'ctrl.inscriptionForm[$index].intermittent',
                                            'validation' => 'ng-required=preinscription_session.financement_type.id==\'afdas\'',
                                        ]
                                    ])
                                    <span class="help-block">Vous pouvez prétendre à une prise en charge par l'Afdas si vous êtes musicien ou technicien du spectacle depuis plus de 2 ans et que vous justifiez de 48 cachets ou jours travaillés (pour les musiciens) et de 88 cachets ou  jours travaillés (pour les techniciens) sur les 2 ans précédant la formation.</span>
                                </div>
                                {{-- Financement autre --}}
                                <div ng-show="preinscription_session.financement_type.id == 'autre'">
                                    @include('components.preinscription.inputs.radio', [
                                        'field' => [
                                            'id' => 'financement_autre',
                                            'inline' => 'false',
                                            'model' => 'preinscription_session.financement_autre',
                                            'datasource' => 'ctrl.externalData.financement_autre',
                                            'validationController' => 'ctrl.inscriptionForm[$index].financement_autre',
                                            'validation' => 'ng-required=preinscription_session.financement_type.id==\'autre\'',
                                        ]
                                    ])
                                </div>

                                <h3>Renseignements complémentaires</h3>
                                <div>
                                    @include('components.preinscription.inputs.textarea', [
                                        'field' => [
                                            'id' => 'attentes',
                                            'model' => 'preinscription_session.attentes',
                                            'label' => 'Qu\'attendez-vous de la formation ? Quels thèmes souhaitez-vous aborder en particulier ?',
                                            'validationController' => 'ctrl.inscriptionForm[$index].attentes',
                                            'validation' => 'required',
                                        ]
                                    ])
                                </div>

                            </div>
                        </div>
                    </div>


                    {{-- Dropdown to select a new Session --}}
                    <div>
                        @include('components.preinscription.inputs.select', [
                            'field' => [
                                'id' => 'session',
                                'model' => 'ctrl.selectedInscription',
                                'datasource' => 'ctrl.externalData.sessions',
                                'updateOn' => 'default',
                                'onSelect' => 'ctrl.addInscription($item, $model)',
                                'label' => 'Choisissez une session',
                            ]
                        ])
                    </div>

                </div>


                <div class="main-block">
                    @include('components.preinscription.inputs.checkbox', [
                        'field' => [
                            'id' => 'conditions_generales',
                            'inline' => 'true',
                            'model' => 'ctrl.data.conditions_generales',
                            'label' => 'J\'ai lu et j\'accepte <a ng-click="ctrl.openConditions()">les modalités et conditions d\'inscription</a>',
                            'validation' => 'required'
                        ]
                    ])
                </div>

                <button type="submit" class="btn btn-default">Go !</button>
            </form> 
        </div>
    </body>
</html>
