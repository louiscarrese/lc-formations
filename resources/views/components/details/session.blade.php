<div ng-controller="detailController as detailCtrl">
    <h2>@{{detailCtrl.titleText}}</h2>

    <form name="detailCtrl.mainForm" novalidate class="form-horizontal form-condensed row">
        <div class="form-group">
            <label class="control-label col-sm-2">Id</label>
            <div class="col-sm-1 detail-value">
                <my-editable-integer ng-model="detailCtrl.data.id" editing-flag="detailCtrl.editing"></my-editable-integer>
            </div>
        </div>
        <div class="form-group">
            <label for="inputModule" class="control-label col-sm-2">Module</label>
            <div class="col-sm-5 detail-value">
                <my-editable-dropdown source="detailCtrl.linkedData.modules" source-id="id" source-label="libelle" ng-model="detailCtrl.data.module_id" model-label="detailCtrl.data.module_label" editing-flag="detailCtrl.editing" change="detailCtrl.onModuleChange"></my-editable-dropdown>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Libellé</label>
            <div class="col-sm-5 detail-value">
                <my-editable-text ng-model="detailCtrl.data.libelle" editing-flag="detailCtrl.editing" required></my-editable-text>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Nombre de jours</label>
            <div class="col-sm-1 detail-value">
                <my-editable-integer ng-model="detailCtrl.data.nb_jours" editing-flag="detailCtrl.editing" required></my-editable-text>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Heure de début</label>
            <div class="col-sm-1 detail-value">
                <my-editable-text ng-model="detailCtrl.data.heure_debut" editing-flag="detailCtrl.editing" ></my-editable-text>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Heure de fin</label>
            <div class="col-sm-1 detail-value">
                <my-editable-text ng-model="detailCtrl.data.heure_fin" editing-flag="detailCtrl.editing" ></my-editable-text>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Effectif maximum</label>
            <div class="col-sm-1 detail-value">
                <my-editable-integer ng-model="detailCtrl.data.effectif_max" editing-flag="detailCtrl.editing" ></my-editable-integer>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Objectifs pédagogiques</label>
            <div class="col-sm-10 detail-value">
                <my-editable-textarea ng-model="detailCtrl.data.objectifs_pedagogiques" editing-flag="detailCtrl.editing" rows="5"></my-editable-textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Matériel</label>
            <div class="col-sm-10 detail-value">
                <my-editable-textarea ng-model="detailCtrl.data.materiel" editing-flag="detailCtrl.editing" rows="5"></my-editable-textarea>
            </div>
        </div>
        <div class="global-actions pull-right">
            <span ng-show="detailCtrl.mode === 'read'" ng-click="detailCtrl.edit()" class="clickable glyphicon glyphicon-edit"></span>
            <span ng-show="detailCtrl.mode === 'create'" ng-click="detailCtrl.create()" class="clickable glyphicon glyphicon-ok"></span>
            <span ng-show="detailCtrl.mode === 'edit'" ng-click="detailCtrl.update()" class="clickable glyphicon glyphicon-ok"></span>
            <span ng-show="detailCtrl.mode === 'edit'" ng-click="detailCtrl.cancel()" class="clickable glyphicon glyphicon-remove"></span>
            <span ng-show="detailCtrl.mode !== 'create'" ng-click="detailCtrl.delete()" class="clickable glyphicon glyphicon-trash"></span>
        </div>
    </form>

    <form name="detailCtrl.sessionJourForm">
        <div ng-if="detailCtrl.inited" ng-show="detailCtrl.mode != 'create'">
            @include('components.EditableTable',
                ['controllerName' => 'sessionJoursController',
                 'title' => 'Jours',
                 'fields' => [
                    'id' => [
                        'label' => 'Id',
                        'isId' => true,
                        'sortable' => true,
                        'filterable' => true,
                        'editable' => true,
                        'type' => 'integer',
                        'addLine' => false,
                        'tdClass' => 'centered',
                        'additionalAttributes' => 'size=1',
                        'validation' => 'required',
                    ], //id
                    'date' => [
                        'label' => 'Date',
                        'sortable' => true,
                        'filterable' => true,
                        'editable' => true,
                        'type' => 'text', //TODO : date
                        'addLine' => true,
                        'validation' => 'required',
                    ], //date
                    'heure_debut' => [
                        'label' => 'Début',
                        'sortable' => true,
                        'filterable' => true,
                        'editable' => true,
                        'type' => 'text', //TODO : time
                        'addLine' => true,
                        'validation' => 'required',
                    ], //heure_debut
                    'heure_fin' => [
                        'label' => 'Fin',
                        'sortable' => true,
                        'filterable' => true,
                        'editable' => true,
                        'type' => 'text', //TODO : time
                        'addLine' => true,
                        'validation' => 'required',
                    ], //heure_fin
                    'lieu_id' => [
                        'label' => 'Lieu',
                        'sortable' => true,
                        'filterable' => true,
                        'editable' => true,
                        'type' => 'dropdown',
                        'dropdownDatasource' => 'linkedData.lieus', //relative to the controller
                        'dropdownDataId' => 'id', //relative to an item in the dropdownDatasource
                        'dropdownDataLabel' => 'libelle', //relative to an item in the dropdownDatasource
                        'dropdownLabel' => 'lieu_label', //relative to an item in the controller data
                        'addLine' => true,
                        'validation' => 'required',
                    ], //heure_debut
                 ] //fields
                 ])
        </div>
    </form>
<div>