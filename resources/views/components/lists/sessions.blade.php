@include('components.listTable', 
    [
        'title' => 'Sessions',
        'controllerName' => 'sessionsListController',
        'detailUri' => 'sessions',
        'idField' => 'id',
        'fields' => [
            'module.libelle' => [
                'label' => 'Libelle',
                'sortable' => true,
                'filterable' => true,
                'displayedField' => '<a href="modules/@{{module.id}}">@{{module.libelle}}</a>', 
            ],
            'libelle' => [
                'label' => 'Dates',
                'sortable' => true,
                'filterable' => true,
            ],
        ]
    ])

