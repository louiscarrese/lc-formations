<div ng-controller="detailController as detailCtrl">
    @include('components.detail', [
        'controller' => 'detailCtrl',
        'fields' => [
            'module_id' => [
                'label' => 'Module',
                'type' => 'dropdown',
                'datasource' => 'linkedData.modules', //relative to the controller
                'dataId' => 'id', //relative to an item in the datasource
                'modelObject' => 'module', //relative to an item in the controller data 
                'change' => 'detailCtrl.onModuleChange',
                'displayed' => '<libelle>',
                'href' => '/modules/',
                'sizeLabel' => 2,
                'sizeValue' => 5,
            ],
            'module.nb_jours' => [
                'label' => 'Nombre de jours',
                'readonly' => true,
                'sizeLabel' => 2,
                'sizeValue' => 1,
            ],
            'effectif_max' => [
                'label' => 'Effectif maximum',
                'type' => 'text',
                'sizeLabel' => 2,
                'sizeValue' => 1,
            ],
            'objectifs_pedagogiques' => [
                'label' => 'Objectifs pédagogiques',
                'type' => 'textarea',
                'additionalAttributes' => 'rows=5',
                'sizeLabel' => 2,
                'sizeValue' => 10,
            ],
            'materiel' => [
                'label' => 'Matériel',
                'type' => 'textarea',
                'additionalAttributes' => 'rows=5',
                'sizeLabel' => 2,
                'sizeValue' => 10,
            ],
        ] //fields
    ])

    <div ng-if="detailCtrl.inited" ng-show="detailCtrl.mode != 'create'">
        <div ng-controller="sessionJoursController as sessionJoursController">
            @include('components.editableTable',
                ['controllerName' => 'sessionJoursController',
                 'idField' => 'id',
                 'title' => 'Jours',
                 'fields' => [
                    'date' => [
                        'label' => 'Date',
                        'sortable' => true,
                        'filterable' => true,
                        'editable' => true,
                        'type' => 'date', 
                        'format' => 'dd/MM/yyyy',
                        'addLine' => true,
                        'validation' => 'required',
                        'size' => 2,
                    ], //date
                    'heure_debut' => [
                        'label' => 'Début',
                        'sortable' => true,
                        'filterable' => true,
                        'editable' => true,
                        'type' => 'time',
                        'format' => 'HH:mm',
                        'addLine' => true,
                        'validation' => 'required',
                        'size' => 1,
                    ], //heure_debut
                    'heure_fin' => [
                        'label' => 'Fin',
                        'sortable' => true,
                        'filterable' => true,
                        'editable' => true,
                        'type' => 'time',
                        'format' => 'HH:mm',
                        'addLine' => true,
                        'validation' => 'required',
                        'size' => 1,
                    ], //heure_fin
                    'lieu_id' => [
                        'label' => 'Lieu',
                        'sortable' => true,
                        'filterable' => true,
                        'editable' => true,
                        'type' => 'dropdown',
                        'datasource' => 'linkedData.lieus', //relative to the controller
                        'dataId' => 'id', //relative to an item in the datasource
                        'modelObject' => 'lieu', //where to find the subobject in the controller
                        'displayed' => '<libelle>',
                        'addLine' => true,
                        'size' => 3,
                    ], //lieu_id

                     'formateurs_id' => [
                        'label' => 'Formateurs',
                        'sortable' => false,
                        'editable' => true,
                        'type' => 'multiselect',
                        'datasource' => 'linkedData.formateurs',
                        'dataId' => 'id',
                        'modelObjects' => 'formateurs',
                        'displayed' => '<nom> <prenom>',
                        'placeholder' => 'Formateurs',
                        'addLine' => true,
                        'size' => 5,
                    ]
                 ] //fields
             ])

            <h2>Actions complémentaires</h2>
             <div class="custom-actions row">
                <ng-form novalidate name="sessionJoursController.form_autoAdd">
                    <span class="col-sm-2" ng-class="{ 'has-error': sessionJoursController.form_autoAdd.date.$invalid && sessionJoursController.form_autoAdd.date.$touched }">
                        @include('components.myEditable', [
                            'element' => 'sessionJoursController.autoAddObject',
                            'editingFlag' => true,
                            'fieldId' => 'date',
                            'field' => [
                                'type' => 'date', 
                                'format' => 'dd/MM/yyyy',
                                'validation' => 'required',
                            ]
                        ])
                    </span>
                    <span>
                        <button class="btn btn-default" ng-click="sessionJoursController.callService('autoAdd', [sessionJoursController.dataService, sessionJoursController.form_autoAdd, sessionJoursController.autoAddObject])"><span>Créer les jours</span></button>
                    </span>
                </ng-form>
             </div>

         </div>
    </div>
</div>