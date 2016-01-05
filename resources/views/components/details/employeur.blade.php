<div ng-controller="detailController as detailCtrl">
    @include('components.detail', [
        'controller' => 'detailCtrl',
        'fields' => [
            'id' => [
                'isId' => true,
                'label' => 'Id',
                'type' => 'integer',
                'sizeLabel' => 2,
                'sizeValue' => 1,
            ],
            'nom' => [
                'label' => 'Nom',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 2,
            ],
            'raison_sociale' => [
                'label' => 'Raison sociale',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 2,
            ],
            'adresse' => [
                'label' => 'Adresse',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 5,
            ],
            'code_postal' => [
                'label' => 'Code postal',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 1,
            ],
            'ville' => [
                'label' => 'Ville',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 2,
            ],
            'telephone' => [
                'label' => 'Téléphone',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 2,
            ],
            'email' => [
                'label' => 'Email',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 3,
            ],
            'contact' => [
                'label' => 'Contact',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 3,
            ],
        ]
    ])

</div>
