<div ng-controller="detailController as detailCtrl">
    <form name="detailCtrl.mainForm" novalidate>
    <h2>@{{detailCtrl.titleText}}</h2>
    <div class="detail-table-container">
        <table>
            <tr>
                <td class="key">Id</td>
                <td class="value validated">
                    <my-editable-integer ng-model="detailCtrl.data.id" editing-flag="detailCtrl.editing" size="1"></my-editable-integer>
                </td>
            </tr>
            <tr>
                <td class="key">Nom</td>
                <td class="value validated">
                    <my-editable-text ng-model="detailCtrl.data.nom" editing-flag="detailCtrl.editing" size="15" required></my-editable-text>
                </td>
            </tr>
            <tr>
                <td class="key">Prénom</td>
                <td class="value validated">
                    <my-editable-text ng-model="detailCtrl.data.prenom" editing-flag="detailCtrl.editing" size="15" required></my-editable-text>
                </td>
            </tr>
            <tr>
                <td class="key">Sexe</td>
                <td class="value validated">
                    <my-editable-radio ng-model="detailCtrl.data.sexe" editing-flag="detailCtrl.editing" values="['M', 'F']"></my-editable-radio>
                </td>
            </tr>
            <tr>
                <td class="key">Date de naissance</td>
                <td class="value validated">
                    <my-editable-text ng-model="detailCtrl.data.date_naissance" editing-flag="detailCtrl.editing" size="10"></my-editable-text>
                </td>
            </tr>
            <tr>
                <td class="key">Adresse</td>
                <td class="value validated">
                    <my-editable-text ng-model="detailCtrl.data.adresse" editing-flag="detailCtrl.editing" class="full-width"></my-editable-text>
                </td>
            </tr>
            <tr>
                <td class="key">Code postal</td>
                <td class="value validated">
                    <my-editable-text ng-model="detailCtrl.data.code_postal" editing-flag="detailCtrl.editing" size="5"></my-editable-text>
                </td>
            </tr>
            <tr>
                <td class="key">Ville</td>
                <td class="value validated">
                    <my-editable-text ng-model="detailCtrl.data.ville" editing-flag="detailCtrl.editing" size="10"></my-editable-text>
                </td>
            </tr>
            <tr>
                <td class="key">Téléphone fixe</td>
                <td class="value validated">
                    <my-editable-text ng-model="detailCtrl.data.tel_fixe" editing-flag="detailCtrl.editing" size="10"></my-editable-text>
                </td>
            </tr>
            <tr>
                <td class="key">Téléphone portable</td>
                <td class="value validated">
                    <my-editable-text ng-model="detailCtrl.data.tel_portable" editing-flag="detailCtrl.editing" size="10"></my-editable-text>
                </td>
            </tr>
            <tr>
                <td class="key">Email</td>
                <td class="value validated">
                    <my-editable-text ng-model="detailCtrl.data.email" editing-flag="detailCtrl.editing" size="15"></my-editable-text>
                </td>
            </tr>
            <tr>
                <td class="key">Type</td>
                <td class="value validated">
                    <my-editable-dropdown source="detailCtrl.linkedData.formateur_type" source-id="id" source-label="libelle" ng-model="detailCtrl.data.formateur_type_id" model-label="detailCtrl.data.formateur_type_label" editing-flag="detailCtrl.editing"></my-editable-dropdown>
                </td>
            </tr>
        </table>

    </div>

    <div class="global-actions">
        <span ng-show="detailCtrl.mode === 'read'" ng-click="detailCtrl.edit()"><i class="icon clickable">edit</i></span>
        <span ng-show="detailCtrl.mode === 'create'" ng-click="detailCtrl.create()"><i class="icon clickable">validate</i></span>
        <span ng-show="detailCtrl.mode === 'edit'" ng-click="detailCtrl.update()"><i class="icon clickable">validate</i></span>
        <span ng-show="detailCtrl.mode === 'edit'" ng-click="detailCtrl.cancel()"><i class="icon clickable">undo</i></span>
        <span ng-show="detailCtrl.mode !== 'create'" ng-click="detailCtrl.delete()"><i class="icon clickable">delete</i></span>
    </div>
</form>
</div>
