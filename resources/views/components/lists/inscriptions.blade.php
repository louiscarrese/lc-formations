@include('components.listTable', 
    [
        'title' => 'Inscriptions',
        'controllerName' => 'inscriptionsListController',
        'detailUri' => '/inscriptions',
        'idField' => 'id',
        'fields' => [
            'stagiaire.nom' => [
                'label' => 'Nom',
                'sortable' => true,
                'filterable' => true,
            ],
            'stagiaire.prenom' => [
                'label' => 'Prénom',
                'sortable' => true,
                'filterable' => true,
            ],
            'session.libelle' => [
                'label' => 'Session',
                'sortable' => true,
                'filterable' => true,
                'displayedField' => '<a href="/modules/@{{session.module.id}}">@{{session.module.libelle}}</a> <a href="/sessions/@{{session.id}}">@{{session.libelle}}</a>',
            ],
        ]
    ])
