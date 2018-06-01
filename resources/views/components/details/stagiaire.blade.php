<div ng-controller="detailController as detailCtrl">
    @include('components.detail', [
        'controller' => 'detailCtrl',
        'sizeLabel' => 3,
        'rows' => [
            [
                'label' => 'Nom',
                'fields' => [
                    'nom' => [
                        'type' => 'text',
                        'sizeValue' => 2,
                        'validation' => 'required',
                    ],
                ]
            ],[
                'label' => 'Prenom',
                'fields' => [
                    'prenom' => [
                        'type' => 'text',
                        'sizeLabel' => 3,
                        'sizeValue' => 2,
                    ],
                ]
            ],[
                'label' => 'Sexe',
                'fields' => [
                    'sexe' => [
                        'type' => 'radio',
                        'values' => '["M", "F"]',
                        'sizeValue' => 2,
                    ],
                ]
            ],[
                'label' => 'Date de naissance',
                'fields' => [
                    'date_naissance' => [
                        'type' => 'date',
                        'format' => 'dd/MM/yyyy',
                        'sizeValue' => 2,
                    ],
                ]
            ],[
                'label' => 'Adresse',
                'fields' => [
                    'adresse' => [
                        'type' => 'textarea',
                        'additionalAttributes' => 'rows=3',
                        'sizeValue' => 5,
                    ],
                ]
            ],[
                'label' => 'Code postal',
                'fields' => [
                    'code_postal' => [
                        'type' => 'text',
                        'sizeValue' => 2,
                    ],
                ]
            ],[
                'label' => 'Ville',
                'fields' => [
                    'ville' => [
                        'type' => 'text',
                        'sizeValue' => 4,
                    ],
                ]
            ],[
                'label' => 'Téléphone fixe',
                'fields' => [
                    'tel_fixe' => [
                        'type' => 'text',
                        'sizeValue' => 2,
                    ],
                ]
            ],[
                'label' => 'Téléphone portable',
                'fields' => [
                    'tel_portable' => [
                        'type' => 'text',
                        'sizeValue' => 2,
                    ],
                ]
            ],[
                'label' => 'Email',
                'fields' => [
                    'email' => [
                        'type' => 'email',
                        'sizeValue' => 3,
                        'validation' => 'email',
                    ],
                ]
            ],[
                'label' => 'Profession',
                'fields' => [
                    'profession' => [
                        'type' => 'text',
                        'sizeValue' => 2,
                    ],
                ]
            ],[
                'label' => 'Etudes',
                'fields' => [
                    'etudes' => [
                        'type' => 'text',
                        'sizeValue' => 2,
                    ],
                ]
            ],[
                'label' => 'Demandeur d\'emploi depuis',
                'fields' => [
                    'demandeur_emploi_depuis' => [
                        'type' => 'date',
                        'format' => 'dd/MM/yyyy',
                        'sizeValue' => 2,
                    ],
                ]
            ],[
                'label' => 'Domaine professionel',
                'fields' => [
                    'domaine_pro' => [
                        'type' => 'text',
                        'sizeValue' => 2,
                    ],
                ]
            ],[
                'label' => 'Niveau de qualification',
                'fields' => [
                    'niveau_formation_id' => [
                        'type' => 'dropdown',
                        'datasource' => 'linkedData.niveau_formation', //relative to the controller
                        'dataId' => 'id', //relative to an item in the dropdownDatasource
                        'modelObject' => 'niveau_formation', //relative to an item in the controller data 
                        'displayed' => '<libelle>',
                        'placeholder' => 'Niveau de formation',
                        'sizeValue' => 4,
                    ],
                ]
            ], [
                'label' => 'Employeur',
                'fields' => [
                    'employeur_id' => [
                        'type' => 'dropdown',
                        'datasource' => 'linkedData.employeur', //relative to the controller
                        'dataId' => 'id', //relative to an item in the dropdownDatasource
                        'modelObject' => 'employeur', //relative to an item in the controller data 
                        'displayed' => '<nom>',
                        'placeholder' => 'Employeur',
                        'sizeValue' => 3,
                    ],
                ]
            ], [
                'label' => 'Type',
                'fields' => [
                    'stagiaire_type_id' => [
                        'type' => 'dropdown',
                        'datasource' => 'linkedData.stagiaire_type', //relative to the controller
                        'dataId' => 'id', //relative to an item in the dropdownDatasource
                        'modelObject' => 'stagiaire_type', //relative to an item in the controller data 
                        'displayed' => '<libelle>',
                        'placeholder' => 'Type',
                        'sizeValue' => 3,
                    ],
                ]
            ]
        ]
    ])

    <div ng-if="detailCtrl.inited && detailCtrl.mode != 'create'">
        @include('components.lists.inscriptions', ['displayedField' => ['session.module.libelle', 'session.libelle']])
    </div>

</div>
