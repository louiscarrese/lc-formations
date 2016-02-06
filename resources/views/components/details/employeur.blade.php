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
                    ],
                ]
            ],[
                'label' => 'Raison sociale',
                'fields' => [
                    'raison_sociale' => [
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
                    'telephone' => [
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
                'label' => 'Contact',
                'fields' => [
                    'contact' => [
                        'type' => 'text',
                        'sizeValue' => 3,
                    ],
                ]
            ]
        ]
    ])

</div>
