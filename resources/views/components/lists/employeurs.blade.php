@include('components.listTable', 
    [
        'title' => 'Employeurs',
        'controllerName' => 'employeursListController',
        'detailUri' => 'employeurs',
        'localSearch' => true,
        'idField' => 'id',
        'fields' => [
            'nom' => [
                'label' => 'Nom',
                'sortable' => true,
                'defaultSort' => true,
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
                'tdClass' => "'centered text-nowrap'"
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
