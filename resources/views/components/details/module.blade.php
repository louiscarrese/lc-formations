<div ng-controller="detailController as moduleCtrl">

<!-- TODO: Trouver un moyen de changer le titre suivant si on est en création ou en modification -->

<h2>@{{moduleCtrl.titleText}}</h2>
    <div class="detail-table-container">
        <table>
            <tr>
                <td class="key">Id</td>
                <td class="value">
                    <my-editable type="integer" model="moduleCtrl.data.id" editing-flag="moduleCtrl.editing" size="1"></my-editable>
                </td>
            </tr>
            <tr>
                <td class="key">Libellé</td>
                <td class="value">
                    <my-editable type="text" model="moduleCtrl.data.libelle" editing-flag="moduleCtrl.editing" size="40"></my-editable>
                </td>
            </tr>
            <tr>
                <td class="key">Nombre de jours</td>
                <td class="value">
                    <my-editable type="integer" model="moduleCtrl.data.nb_jours" editing-flag="moduleCtrl.editing" size="1"></my-editable>
                </td>
            </tr>
            <tr>
                <td class="key">Heure de début</td>
                <td class="value">
                    <my-editable type="text" model="moduleCtrl.data.heure_debut" editing-flag="moduleCtrl.editing" size="7"></my-editable>
                </td>
            </tr>
            <tr>
                <td class="key">Heure de fin</td>
                <td class="value">
                    <my-editable type="text" model="moduleCtrl.data.heure_fin" editing-flag="moduleCtrl.editing" size="7"></my-editable>
                </td>
            </tr>
            <tr>
                <td class="key">Effectif maximum</td>
                <td class="value">
                    <my-editable type="integer" model="moduleCtrl.data.effectif_max" editing-flag="moduleCtrl.editing" size="1"></my-editable>
                </td>
            </tr>
            <tr>
                <td class="key">Domaine de formation</td>
                <td class="value">
                    <my-editable type="dropdown" source="moduleCtrl.linkedData.domaineFormations" source-id="id" source-label="libelle" model="moduleCtrl.data.domaine_formation_id" model-label="moduleCtrl.data.module_formation_label" editing-flag="moduleCtrl.editing"></my-editable>
                </td>
            </tr>
            <tr>
                <td class="key">Objectifs pédagogiques</td>
                <td class="value">
                    <my-editable type="textarea" model="moduleCtrl.data.objectifs_pedagogiques" editing-flag="moduleCtrl.editing" rows="5" cols="50"></my-editable>
                </td>
            </tr>
            <tr>
                <td class="key">Matériel</td>
                <td class="value">
                    <my-editable type="textarea" model="moduleCtrl.data.materiel" editing-flag="moduleCtrl.editing" rows="5" cols="50"></my-editable>
                </td>
            </tr>
        </table>
        <div class="global-actions">
            <span ng-show="moduleCtrl.mode === 'read'" ng-click="moduleCtrl.edit()"><i class="icon clickable">edit</i></span>
            <span ng-show="moduleCtrl.mode === 'create'" ng-click="moduleCtrl.create()"><i class="icon clickable">validate</i></span>
            <span ng-show="moduleCtrl.mode === 'edit'" ng-click="moduleCtrl.update()"><i class="icon clickable">validate</i></span>
            <span ng-show="moduleCtrl.mode === 'edit'" ng-click="moduleCtrl.cancel()"><i class="icon clickable">undo</i></span>
            <span ng-show="moduleCtrl.mode !== 'create'" ng-click="moduleCtrl.delete()"><i class="icon clickable">delete</i></span>
        </div>
    </div>
</div>