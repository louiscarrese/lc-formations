@include('components.listTable', 
    [
        'title' => 'Inscriptions',
        'controllerName' => 'inscriptionsListController',
        'detailUri' => 'inscriptions',
        'localSearch' => true,
        'idField' => 'id',
        'fields' => [
            'created_at' => [
                'label' => 'Date',
                'sortable' => true,
                'defaultSort' => (isset($defaultSort) ? ($defaultSort == 'created_at') : true),
                'filterable' => true,
                'defaultHidden' => true,
            ],
            'stagiaire.nom' => [
                'label' => 'Nom',
                'sortable' => true,
                'defaultSort' => (isset($defaultSort) ? ($defaultSort == 'stagiaire.nom') : true),
                'filterable' => true,
            ],
            'stagiaire.prenom' => [
                'label' => 'Prénom',
                'sortable' => true,
                'defaultSort' => (isset($defaultSort) ? ($defaultSort == 'stagiaire.prenom') : true),
                'filterable' => true,
            ],
            'stagiaire.email' => [
                'label' => 'Email',
                'sortable' => true,
                'defaultSort' => (isset($defaultSort) ? ($defaultSort == 'stagiaire.email') : true),
                'filterable' => true,
                'displayedField' => '<a href="mailto:@{{stagiaire.email}}">@{{stagiaire.email}}</a>',
            ],
            'stagiaire.telephone' => [
                'label' => 'Téléphone',
                'sortable' => true,
                'defaultSort' => (isset($defaultSort) ? ($defaultSort == 'stagiaire.telephone') : true),
                'filterable' => true,
                'tdClass' => "'centered text-nowrap'",
            ],
            'session.module.libelle' => [
                'label' => 'Module',
                'sortable' => true,
                'defaultSort' => (isset($defaultSort) ? ($defaultSort == 'session.module.libelle') : true),
                'filterable' => true,
                'displayedField' => '<a href="../modules/@{{session.module.id}}">@{{session.module.libelle}}</a>',
                'tdClass' => "{'strike-through': item.session.canceled}"
            ],
            'session.libelle' => [
                'label' => 'Session',
                'sortable' => true,
                'defaultSort' => (isset($defaultSort) ? ($defaultSort == 'session.libelle') : true),
                'filterable' => true,
                'displayedField' => '<a href="../sessions/@{{session.id}}">@{{session.libelle}}</a>',
                'tdClass' => "{'strike-through': item.session.canceled}"
            ],
            'statut.libelle' => [
                'label' => 'Statut',
                'sortable' => true,
                'defaultSort' => (isset($defaultSort) ? ($defaultSort == 'statut.libelle') : true),
                'filterable' => true,
            ],
        ]
    ])

