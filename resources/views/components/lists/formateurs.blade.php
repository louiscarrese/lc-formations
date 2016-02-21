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
                'tdClass' => 'centered',
                'displayedField' => '<a href="mailto:@{{email}}">@{{email}}</a>',
            ],
            'formateur_type.id' => [
                'label' => 'Type',
                'sortable' => true,
                'tdClass' => 'centered',
                'filterable' => 'formateur_type.libelle',
                'displayedField' => '@{{formateur_type.libelle}}'
            ],
        ]
    ])