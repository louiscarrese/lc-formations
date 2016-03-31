@include('components.listTable', 
    [
        'title' => 'Employeurs',
        'controllerName' => 'employeursListController',
        'detailUri' => 'employeurs',
        'idField' => 'id',
        'fields' => [
            'nom' => [
                'label' => 'Nom',
                'sortable' => true,
                'filterable' => true,
            ],
            'raison_sociale' => [
                'label' => 'Raison sociale',
                'sortable' => true,
                'filterable' => true,
            ],
            'telephone' => [
                'label' => 'Téléphone',
                'sortable' => true,
                'filterable' => true,
            ],
            'email' => [
                'label' => 'Email',
                'sortable' => true,
                'filterable' => true,
                'displayedField' => '<a href="mailto:@{{email}}">@{{email}}</a>',
            ],
            'contact' => [
                'label' => 'Contact',
                'sortable' => true,
                'filterable' => true,
            ],
        ]
    ])