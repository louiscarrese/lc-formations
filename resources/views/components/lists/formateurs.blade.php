@include('components.listTable', 
    [
        'title' => 'Formateurs',
        'controllerName' => 'formateursListController',
        'detailUri' => '/formateurs',
        'idField' => 'id',
        'fields' => [
            'nom' => [
                'label' => 'Nom',
                'sortable' => true,
                'filterable' => true,
            ],
            'prenom' => [
                'label' => 'Prenom',
                'sortable' => true,
                'filterable' => true,
            ],
            'tel_fixe' => [
                'label' => 'Fixe',
                'sortable' => true,
                'filterable' => true,
                'tdClass' => 'centered'
            ],
            'tel_portable' => [
                'label' => 'Portable',
                'sortable' => true,
                'filterable' => true,
                'tdClass' => 'centered'
            ],
            'email' => [
                'label' => 'Email',
                'sortable' => true,
                'filterable' => true,
                'tdClass' => 'centered'
            ],
            'formateur_type.id' => [
                'label' => 'Type',
                'sortable' => true,
                'tdClass' => 'centered',
                'filterable' => true,
                'displayedField' => '@{{formateur_type.libelle}}'
            ],
        ]
    ])