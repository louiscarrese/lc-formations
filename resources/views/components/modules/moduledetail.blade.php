<div ng-controller="modulesDetailController as moduleCtrl">

<!-- TODO: Trouver un moyen de changer le titre suivant si on est en création ou en modification -->

<h2>Module !</h2>
    <div class="detail-table-container">
        <table>
            <tr>
                <td>Id</td>
                <td>
                    <my-editable type="integer" model="moduleCtrl.data.id" editing-flag="moduleCtrl.editing"></my-editable>
                </td>
            </tr>
            <tr>
                <td>Libellé</td>
                <td>
                    <my-editable type="text" model="moduleCtrl.data.libelle" editing-flag="moduleCtrl.editing"></my-editable>
                </td>
            </tr>
            <tr>
                <td>Nombre de jours</td>
                <td>
                    <my-editable type="integer" model="moduleCtrl.data.nb_jours" editing-flag="moduleCtrl.editing"></my-editable>
                </td>
            </tr>
            <tr>
                <td>Heure de début</td>
                <td>
                    <my-editable type="text" model="moduleCtrl.data.heure_debut" editing-flag="moduleCtrl.editing"></my-editable>
                </td>
            </tr>
            <tr>
                <td>Heure de fin</td>
                <td>
                    <my-editable type="text" model="moduleCtrl.data.heure_fin" editing-flag="moduleCtrl.editing"></my-editable>
                </td>
            </tr>
            <tr>
                <td>Effectif maximum</td>
                <td>
                    <my-editable type="integer" model="moduleCtrl.data.effectif_max" editing-flag="moduleCtrl.editing"></my-editable>
                </td>
            </tr>
            <tr>
                <td>Objectifs pédagogiques</td>
                <td>
                    <my-editable type="text" model="moduleCtrl.data.objectifs_pedagogiques" editing-flag="moduleCtrl.editing"></my-editable>
                </td>
            </tr>
            <tr>
                <td>Matériel</td>
                <td>
                    <my-editable type="text" model="moduleCtrl.data.materiel" editing-flag="moduleCtrl.editing"></my-editable>
                </td>
            </tr>
            <tr>
                <td>Domaine de formation</td>
                <td>
                    <my-editable type="dropdown" source="moduleCtrl.domaine_formations" source-id="id" source-label="libelle" model="moduleCtrl.data.domaine_formation_id" model-label="moduleCtrl.data.module_formation_label" editing-flag="moduleCtrl.editing"></my-editable>
                </td>
            </tr>
        </table>
        <span ng-show="moduleCtrl.mode === 'read'" ng-click="moduleCtrl.edit()"><i class="material-icons clickable">create</i></span>
        <span ng-show="moduleCtrl.mode === 'create'" ng-click="moduleCtrl.create()"><i class="material-icons clickable">done</i></span>
        <span ng-show="moduleCtrl.mode === 'edit'" ng-click="moduleCtrl.update()"><i class="material-icons clickable">done</i></span>
        <span ng-show="moduleCtrl.mode === 'edit'" ng-click="moduleCtrl.cancel()"><i class="material-icons clickable">clear</i></span>
        <span ng-show="moduleCtrl.mode !== 'create'" ng-click="moduleCtrl.delete()"><i class="material-icons clickable">delete</i></span>
    </div>
</div>