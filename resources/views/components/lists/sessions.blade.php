@include('components.listTable', 
    [
        'title' => 'Sessions',
        'controllerName' => 'sessionsListController',
        'detailUri' => '/sessions',
        'idField' => 'id',
        'fields' => [
            'id' => [
                'label' => 'Id',
                'sortable' => true,
                'filterable' => true,
                'tdClass' => 'centered'
            ],
            'libelle' => [
                'label' => 'Libelle',
                'sortable' => true,
                'filterable' => true,
                'displayedField' => '<a href="/modules/@{{module.id}}">@{{module.libelle}}</a> <a href="/sessions/@{{id}}">@{{libelle}}</a>',
            ],
        ]
    ])

