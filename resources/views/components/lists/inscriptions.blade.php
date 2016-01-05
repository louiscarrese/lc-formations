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
            'session.module.libelle' => [
                'label' => 'Session',
                'sortable' => true,
                'filterable' => true,
            ],
        ]
    ])

