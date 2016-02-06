<div ng-controller="detailController as detailCtrl">
    @include('components.detail', [
        'controller' => 'detailCtrl',
        'sizeLabel' => 2,
        'rows' => [
            [
                'label' => 'Libellé',
                'fields' => [
                    'libelle' => [
                        'type' => 'text',
                        'sizeValue' => 2,
                    ],
                ]
            ],[
                'label' => 'Structure',
                'fields' => [
                    'structure' => [
                        'type' => 'text',
                        'sizeValue' => 2,
                    ],
                ]
            ],[
                'label' => 'Nom',
                'fields' => [
                    'nom' => [
                        'type' => 'text',
                        'sizeValue' => 2,
                    ],
                ]
            ],[
                'label' => 'Prenom',
                'fields' => [
                    'prenom' => [
                        'type' => 'text',
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
                        'sizeValue' => 1,
                    ],
                ]
            ],[
                'label' => 'Ville',
                'fields' => [
                    'ville' => [
                        'type' => 'text',
                        'sizeValue' => 2,
                    ],
                ]
            ],[
                'label' => 'Téléphone',
                'fields' => [
                    'tel' => [
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
                    ],
                ]
            ],[
                'label' => 'Type',
                'fields' => [
                    'financeur_type_id' => [
                        'type' => 'dropdown',
                        'datasource' => 'linkedData.financeur_type', //relative to the controller
                        'dataId' => 'id', //relative to an item in the dropdownDatasource
                        'modelObject' => 'financeur_type', //relative to an item in the controller data 
                        'displayed' => '<libelle>',
                        'placeholder' => 'Type',
                        'sizeValue' => 3,
                    ],
                ]
            ]
        ]
    ])

</div>
