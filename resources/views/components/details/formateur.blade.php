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
            <label class="control-label col-sm-2">Nom</label>
            <div class="col-sm-2 detail-value">
                <my-editable-text ng-model="detailCtrl.data.nom" editing-flag="detailCtrl.editing"></my-editable-text>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Prénom</label>
            <div class="col-sm-2 detail-value">
                <my-editable-text ng-model="detailCtrl.data.prenom" editing-flag="detailCtrl.editing"></my-editable-text>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Sexe</label>
            <div class="col-sm-2 detail-value">
                <my-editable-radio ng-model="detailCtrl.data.sexe" editing-flag="detailCtrl.editing" values="['M', 'F']"></my-editable-radio>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Date de naissance</label>
            <div class="col-sm-2 detail-value">
                <my-editable-text ng-model="detailCtrl.data.date_naissance" editing-flag="detailCtrl.editing" size="10"></my-editable-text>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Adresse</label>
            <div class="col-sm-5 detail-value">
                <my-editable-text ng-model="detailCtrl.data.adresse" editing-flag="detailCtrl.editing" size="10"></my-editable-text>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Code postal</label>
            <div class="col-sm-1 detail-value">
                <my-editable-text ng-model="detailCtrl.data.code_postal" editing-flag="detailCtrl.editing" size="10"></my-editable-text>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Ville</label>
            <div class="col-sm-2 detail-value">
                <my-editable-text ng-model="detailCtrl.data.ville" editing-flag="detailCtrl.editing" size="10"></my-editable-text>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Téléphone fixe</label>
            <div class="col-sm-2 detail-value">
                <my-editable-text ng-model="detailCtrl.data.tel_fixe" editing-flag="detailCtrl.editing" size="10"></my-editable-text>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Téléphone portable</label>
            <div class="col-sm-2 detail-value">
                <my-editable-text ng-model="detailCtrl.data.tel_portable" editing-flag="detailCtrl.editing" size="10"></my-editable-text>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Email</label>
            <div class="col-sm-3 detail-value">
                <my-editable-text ng-model="detailCtrl.data.email" editing-flag="detailCtrl.editing" size="10"></my-editable-text>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Type</label>
            <div class="col-sm-2 detail-value">
                <my-editable-dropdown source="detailCtrl.linkedData.formateur_type" source-id="id" source-label="libelle" ng-model="detailCtrl.data.formateur_type_id" model-label="detailCtrl.data.formateur_type_label" editing-flag="detailCtrl.editing"></my-editable-dropdown>
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
</div>
