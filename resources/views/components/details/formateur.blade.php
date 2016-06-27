<div ng-controller="detailController as detailCtrl">
    @include('components.detail', [
        'controller' => 'detailCtrl',
        'sizeLabel' => 2,
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
                'label' => 'Téléphone fixe',
                'fields' => [
                    'tel_fixe' => [
                        'type' => 'text',
                        'sizeLabel' => 2,
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
                    ],
                ]
            ],[
                'label' => 'Type',
                'fields' => [
                    'formateur_type_id' => [
                        'type' => 'dropdown',
                        'datasource' => 'linkedData.formateur_type', //relative to the controller
                        'dataId' => 'id', //relative to an item in the dropdownDatasource
                        'modelObject' => 'formateur_type', //relative to an item in the controller data 
                        'displayed' => '<libelle>',
                        'placeholder' => 'Type',
                        'sizeValue' => 3,
                    ],
                ]
            ]
        ]
    ])

</div>
