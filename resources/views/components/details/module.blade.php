<div ng-controller="detailController as moduleCtrl">
    <h2>@{{moduleCtrl.titleText}}</h2>

    <form name="moduleCtrl.mainForm" novalidate class="form-horizontal form-condensed row">
        <div class="form-group">
            <label class="control-label col-sm-2">Id</label>
            <div class="col-sm-1 detail-value">
                <my-editable-integer ng-model="moduleCtrl.data.id" editing-flag="moduleCtrl.editing"></my-editable-integer>
            </div>
        </div>        
        <div class="form-group">
            <label class="control-label col-sm-2">Libellé</label>
            <div class="col-sm-5 detail-value">
                <my-editable-text ng-model="moduleCtrl.data.libelle" editing-flag="moduleCtrl.editing" required></my-editable-text>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Nombre de jours</label>
            <div class="col-sm-1 detail-value">
                <my-editable-integer ng-model="moduleCtrl.data.nb_jours" editing-flag="moduleCtrl.editing" required></my-editable-text>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Heure de début</label>
            <div class="col-sm-1 detail-value">
                <my-editable-text ng-model="moduleCtrl.data.heure_debut" editing-flag="moduleCtrl.editing" ></my-editable-text>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Heure de fin</label>
            <div class="col-sm-1 detail-value">
                <my-editable-text ng-model="moduleCtrl.data.heure_fin" editing-flag="moduleCtrl.editing" ></my-editable-text>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Effectif maximum</label>
            <div class="col-sm-1 detail-value">
                <my-editable-integer ng-model="moduleCtrl.data.effectif_max" editing-flag="moduleCtrl.editing" ></my-editable-integer>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Domaine de formation</label>
            <div class="col-sm-2 detail-value">
                <my-editable-dropdown source="moduleCtrl.linkedData.domaineFormations" source-id="id" source-label="libelle" ng-model="moduleCtrl.data.domaine_formation_id" model-label="moduleCtrl.data.module_formation_label" editing-flag="moduleCtrl.editing"></my-editable-dropdown>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Objectifs pédagogiques</label>
            <div class="col-sm-10 detail-value">
                <my-editable-textarea ng-model="moduleCtrl.data.objectifs_pedagogiques" editing-flag="moduleCtrl.editing" rows="5"></my-editable-textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Matériel</label>
            <div class="col-sm-10 detail-value">
                <my-editable-textarea ng-model="moduleCtrl.data.materiel" editing-flag="moduleCtrl.editing" rows="5"></my-editable-textarea>
            </div>
        </div>
        <div class="global-actions pull-right">
            <span ng-show="moduleCtrl.mode === 'read'" ng-click="moduleCtrl.edit()" class="clickable glyphicon glyphicon-edit"></span>
            <span ng-show="moduleCtrl.mode === 'create'" ng-click="moduleCtrl.create()" class="clickable glyphicon glyphicon-ok"></span>
            <span ng-show="moduleCtrl.mode === 'edit'" ng-click="moduleCtrl.update()" class="clickable glyphicon glyphicon-ok"></span>
            <span ng-show="moduleCtrl.mode === 'edit'" ng-click="moduleCtrl.cancel()" class="clickable glyphicon glyphicon-remove"></span>
            <span ng-show="moduleCtrl.mode !== 'create'" ng-click="moduleCtrl.delete()" class="clickable glyphicon glyphicon-trash"></span>
        </div>
    </form>


    <div ng-if="moduleCtrl.inited" ng-show="moduleCtrl.mode != 'create'">
        @include('components.lists.sessions')
    </div>

</div>
