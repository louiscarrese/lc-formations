<div ng-controller="detailController as moduleCtrl">
    <form name="moduleCtrl.mainForm" novalidate>
    <h2>@{{moduleCtrl.titleText}}</h2>
    <div class="detail-table-container">
        <table>
            <tr>
                <td class="key">Id</td>
                <td class="value validated">
                    <my-editable-integer ng-model="moduleCtrl.data.id" editing-flag="moduleCtrl.editing" size="1"></my-editable-integer>
                </td>
            </tr>
            <tr>
                <td class="key">Libellé</td>
                <td class="value validated">
                    <my-editable-text ng-model="moduleCtrl.data.libelle" editing-flag="moduleCtrl.editing" size="40" class="full-width" required></my-editable-text>
                </td>
            </tr>
            <tr>
                <td class="key">Nombre de jours</td>
                <td class="value validated">
                    <my-editable-integer ng-model="moduleCtrl.data.nb_jours" editing-flag="moduleCtrl.editing" size="1" required></my-editable-integer>
                </td>
            </tr>
            <tr>
                <td class="key">Heure de début</td>
                <td class="value validated">
                    <my-editable-text ng-model="moduleCtrl.data.heure_debut" editing-flag="moduleCtrl.editing" size="7" required></my-editable-text>
                </td>
            </tr>
            <tr>
                <td class="key">Heure de fin</td>
                <td class="value validated">
                    <my-editable-text ng-model="moduleCtrl.data.heure_fin" editing-flag="moduleCtrl.editing" size="7" required></my-editable-text>
                </td>
            </tr>
            <tr>
                <td class="key">Effectif maximum</td>
                <td class="value validated">
                    <my-editable-integer ng-model="moduleCtrl.data.effectif_max" editing-flag="moduleCtrl.editing" size="1" required></my-editable-integer>
                </td>
            </tr>
            <tr>
                <td class="key">Domaine de formation</td>
                <td class="value validated">
                    <my-editable-dropdown source="moduleCtrl.linkedData.domaineFormations" source-id="id" source-label="libelle" ng-model="moduleCtrl.data.domaine_formation_id" model-label="moduleCtrl.data.module_formation_label" editing-flag="moduleCtrl.editing"></my-editable-dropdown>
                </td>
            </tr>
            <tr>
                <td class="key">Objectifs pédagogiques</td>
                <td class="value validated">
                    <my-editable-textarea ng-model="moduleCtrl.data.objectifs_pedagogiques" editing-flag="moduleCtrl.editing" rows="5" cols="50" class="full-width"></my-editable-textarea>
                </td>
            </tr>
            <tr>
                <td class="key">Matériel</td>
                <td class="value validated">
                    <my-editable-textarea ng-model="moduleCtrl.data.materiel" editing-flag="moduleCtrl.editing" rows="5" cols="50" class="full-width"></my-editable-textarea>
                </td>
            </tr>
        </table>

    </div>
    <div class="global-actions">
        <span ng-show="moduleCtrl.mode === 'read'" ng-click="moduleCtrl.edit()"><i class="icon clickable">edit</i></span>
        <span ng-show="moduleCtrl.mode === 'create'" ng-click="moduleCtrl.create()"><i class="icon clickable">validate</i></span>
        <span ng-show="moduleCtrl.mode === 'edit'" ng-click="moduleCtrl.update()"><i class="icon clickable">validate</i></span>
        <span ng-show="moduleCtrl.mode === 'edit'" ng-click="moduleCtrl.cancel()"><i class="icon clickable">undo</i></span>
        <span ng-show="moduleCtrl.mode !== 'create'" ng-click="moduleCtrl.delete()"><i class="icon clickable">delete</i></span>
    </div>
    </form>


    <div ng-if="moduleCtrl.inited" ng-show="moduleCtrl.mode != create">
        @include('components.lists.sessions')
    </div>

</div>
