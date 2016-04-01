@include('components.listTable', 
    [
        'title' => 'Préinscriptions',
        'controllerName' => 'preinscriptionsListController',
        'detailUri' => 'preinscriptions',
        'idField' => 'id',
        'fields' => [
            'created_at' => [
                'label' => 'Date',
                'sortable' => true,
                'filterable' => true,
            ],
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
            'session_label' => [
                'label' => 'Session(s)',
                'sortable' => true,
                'filterable' => true,
            ],
        ]
    ])