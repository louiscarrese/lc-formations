@inject('viewService', 'ModuleFormation\Services\ViewService')
@extends('layouts.master', ['current_menu' => ''])

@section('title', 'Paramètres')
@section('js-file', '/js/parametres.js')
@section('css-file', '/css/app.css')
@section('angularApp', 'parametresApp')

@section('content')
    <div ng-controller="stagiaireTypesController as stagiaireTypesController">
        @include('components.editableTable',
            ['controllerName' => 'stagiaireTypesController',
             'title' => 'Types de stagiaires',
             'adaptToContent' => true,
             'idField' => 'id',
             'columns' => [
                [
                    'label' => 'Id',
                    'sortable' => true,
                    'fields' => [
                        'id' => [
                            'filterable' => true,
                            'editable' => true,
                            'type' => 'integer',
                            'addLine' => false,
                            'tdClass' => 'centered',
                            'additionalAttributes' => 'size=1',
                            'validation' => 'required'
                       ], //id
                    ], //fields
                ],
                [
                    'label' => 'Libellé',
                    'sortable' => true,
                    'fields' => [
                        'libelle' => [
                            'filterable' => true,
                            'editable' => true,
                            'type' => 'text',
                            'addLine' => true,
                            'validation' => 'required',
                        ], //libelle
                    ]
                ],
                [
                    'label' => 'Salarié',
                    'sortable' => true,
                    'fields' => [
                        'is_salarie' => [
                            'filterable' => true,
                            'editable' => true,
                            'type' => 'checkbox',
                            'addLine' => true,
                            'tdClass' => 'centered',
                        ], //is_salarie
                    ]
                ],
                [
                    'label' => 'Fonctionnaire',
                    'sortable' => true,
                    'fields' => [
                        'is_fonctionnaire' => [
                            'filterable' => true,
                            'editable' => true,
                            'type' => 'checkbox',
                            'addLine' => true,
                            'tdClass' => 'centered',
                        ], //is_fonctionnaire
                    ]
                ],
                [
                    'label' => 'Contrat Pro',
                    'sortable' => true,
                    'fields' => [
                        'is_contrat_pro' => [
                            'filterable' => true,
                            'editable' => true,
                            'type' => 'checkbox',
                            'addLine' => true,
                            'tdClass' => 'centered',
                        ], //is_contrat_pro
                    ]
                ],
                [
                    'label' => 'Demandeur d\'emploi',
                    'sortable' => true,
                     'fields' => [
                        'is_demandeur_emploi' => [
                            'filterable' => true,
                            'editable' => true,
                            'type' => 'checkbox',
                            'addLine' => true,
                            'tdClass' => 'centered',
                        ], //is_demandeur_emploi
                    ], //fields
                ]
             ]
        ])
    </div>
    <div ng-controller="formateurTypesController as formateurTypesController">
        @include('components.editableTable',
            ['controllerName' => 'formateurTypesController',
             'title' => 'Types de formateurs',
             'adaptToContent' => true,
             'idField' => 'id',
             'columns' => [
                [
                    'label' => 'Id',
                    'sortable' => true,
                    'fields' => [
                        'id' => [
                            'filterable' => true,
                            'editable' => true,
                            'type' => 'integer',
                            'addLine' => true,
                            'tdClass' => 'centered',
                            'additionalAttributes' => 'size=1',
                            'validation' => 'required',
                        ], //id
                    ]
                ],
                [
                    'label' => 'Libellé',
                    'sortable' => true,
                     'fields' => [
                        'libelle' => [
                            'filterable' => true,
                            'editable' => true,
                            'type' => 'text',
                            'addLine' => true,
                            'validation' => 'required',
                        ], //libelle
                    ], //fields
                ]
             ]
        ])
    </div>
    <div ng-controller="tarifTypesController as tarifTypesController">
        @include('components.editableTable',
            ['controllerName' => 'tarifTypesController',
             'title' => 'Types de tarifs',
             'adaptToContent' => true,
             'idField' => 'id',
             'columns' => [
                [
                    'label' => 'Id',
                    'sortable' => true,
                    'fields' => [
                        'id' => [
                            'filterable' => true,
                            'editable' => true,
                            'type' => 'integer',
                            'addLine' => true,
                            'tdClass' => 'centered',
                            'additionalAttributes' => 'size=1',
                            'validation' => 'required',
                        ], //id
                    ]
                ],
                [
                    'label' => 'Libellé',
                    'sortable' => true,
                     'fields' => [
                        'libelle' => [
                            'filterable' => true,
                            'editable' => true,
                            'type' => 'text',
                            'addLine' => true,
                            'validation' => 'required',
                        ], //libelle
                    ], //fields
                ]
             ]
        ])
    </div>
    <div ng-controller="domaineFormationsController as domaineFormationsController">
        @include('components.editableTable',
            ['controllerName' => 'domaineFormationsController',
             'title' => 'Domaines de formation',
             'idField' => 'id',
             'adaptToContent' => true,
             'columns' => [
                [
                    'label' => 'Id',
                    'sortable' => true,
                    'fields' => [
                        'id' => [
                            'filterable' => true,
                            'editable' => true,
                            'type' => 'integer',
                            'addLine' => true,
                            'tdClass' => 'centered',
                            'additionalAttributes' => 'size=1',
                            'validation' => 'required',
                        ], //id
                    ]
                ],
                [
                    'label' => 'Libellé',
                    'sortable' => true,
                     'fields' => [
                        'libelle' => [
                            'filterable' => true,
                            'editable' => true,
                            'type' => 'text',
                            'addLine' => true,
                            'validation' => 'required',
                        ], //libelle
                    ], //fields
                ]
             ]
        ])
    </div>
    <div ng-controller="lieuController as lieuController">
        @include('components.editableTable',
            ['controllerName' => 'lieuController',
             'title' => 'Lieux de formation',
             'idField' => 'id',
             'adaptToContent' => true,
             'columns' => [
                [
                    'label' => 'Id',
                    'sortable' => true,
                    'fields' => [
                        'id' => [
                            'filterable' => true,
                            'editable' => true,
                            'type' => 'integer',
                            'addLine' => true,
                            'tdClass' => 'centered',
                            'additionalAttributes' => 'size=1',
                            'validation' => 'required',
                        ], //id
                    ]
                ],
                [
                    'label' => 'Libellé',
                    'sortable' => true,
                     'fields' => [
                        'libelle' => [
                            'filterable' => true,
                            'editable' => true,
                            'type' => 'text',
                            'addLine' => true,
                            'validation' => 'required',
                        ], //libelle
                    ], //fields
                ]
             ]
        ])
    </div>
    <div ng-controller="niveauFormationsController as niveauFormationsController">
        @include('components.editableTable',
            ['controllerName' => 'niveauFormationsController',
             'title' => 'Niveaux de formation',
             'idField' => 'id',
             'adaptToContent' => true,
             'columns' => [
                [
                    'label' => 'Id',
                    'sortable' => true,
                    'fields' => [
                        'id' => [
                            'filterable' => true,
                            'editable' => true,
                            'type' => 'integer',
                            'addLine' => true,
                            'tdClass' => 'centered',
                            'additionalAttributes' => 'size=1',
                            'validation' => 'required',
                        ], //id
                    ]
                ],
                [
                    'label' => 'Libellé',
                    'sortable' => true,
                     'fields' => [
                        'libelle' => [
                            'filterable' => true,
                            'editable' => true,
                            'type' => 'text',
                            'addLine' => true,
                            'validation' => 'required',
                        ], //libelle
                    ], //fields
                ]
             ]
        ])
    </div>
@endsection