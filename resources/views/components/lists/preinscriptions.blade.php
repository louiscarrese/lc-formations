@include('components.listTable', 
    [
        'title' => 'Préinscriptions',
        'controllerName' => 'preinscriptionsListController',
        'detailUri' => 'preinscriptions',
        'localSearch' => true,
        'idField' => 'id',
        'fields' => [
            'created_at' => [
                'label' => 'Date',
                'sortable' => true,
                'defaultSort' => true,
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
