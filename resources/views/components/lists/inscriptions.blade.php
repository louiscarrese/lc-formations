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
            'stagiaire.tel_portable' => [
                'label' => 'Téléphone portable',
                'sortable' => true,
                'defaultSort' => (isset($defaultSort) ? ($defaultSort == 'stagiaire.tel_portable') : true),
                'filterable' => true,
            ],
            'stagiaire.tel_fixe' => [
                'label' => 'Téléphone fixe',
                'sortable' => true,
                'defaultSort' => (isset($defaultSort) ? ($defaultSort == 'stagiaire.tel_fixe') : true),
                'filterable' => true,
            ],
            'session.module.libelle' => [
                'label' => 'Module',
                'sortable' => true,
                'defaultSort' => (isset($defaultSort) ? ($defaultSort == 'session.module.libelle') : true),
                'filterable' => true,
                'displayedField' => '<a href="modules/@{{session.module.id}}">@{{session.module.libelle}}</a>',
            ],
            'session.libelle' => [
                'label' => 'Session',
                'sortable' => true,
                'defaultSort' => (isset($defaultSort) ? ($defaultSort == 'session.libelle') : true),
                'filterable' => true,
                'displayedField' => '<a href="sessions/@{{session.id}}">@{{session.libelle}}</a>',
            ],
            'statut.libelle' => [
                'label' => 'Statut',
                'sortable' => true,
                'defaultSort' => (isset($defaultSort) ? ($defaultSort == 'statut.libelle') : true),
                'filterable' => true,
            ],
        ]
    ])

