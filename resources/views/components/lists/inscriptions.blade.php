@include('components.listTable', 
    [
        'title' => 'Inscriptions',
        'controllerName' => 'inscriptionsListController',
        'detailUri' => 'inscriptions',
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
            'stagiaire.email' => [
                'label' => 'Email',
                'sortable' => true,
                'filterable' => true,
                'displayedField' => '<a href="mailto:@{{stagiaire.email}}">@{{stagiaire.email}}</a>',
            ],
            'stagiaire.tel_portable' => [
                'label' => 'Téléphone portable',
                'sortable' => true,
                'filterable' => true,
            ],
            'stagiaire.tel_fixe' => [
                'label' => 'Téléphone fixe',
                'sortable' => true,
                'filterable' => true,
            ],
            'session.module.libelle' => [
                'label' => 'Module',
                'sortable' => true,
                'filterable' => true,
                'displayedField' => '<a href="modules/@{{session.module.id}}">@{{session.module.libelle}}</a>',
            ],
            'session.libelle' => [
                'label' => 'Session',
                'sortable' => true,
                'filterable' => true,
                'displayedField' => '<a href="sessions/@{{session.id}}">@{{session.libelle}}</a>',
            ],
            'statut.libelle' => [
                'label' => 'Statut',
                'sortable' => true,
                'filterable' => true,
            ],
        ]
    ])

