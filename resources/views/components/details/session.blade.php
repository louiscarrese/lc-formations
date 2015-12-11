<div ng-controller="detailController as detailCtrl">

    <h2>@{{detailCtrl.titleText}}</h2>
    <div class="detail-table-container">
        <table>
            <tr>
                <td class="key">Id</td>
                <td class="value">
                    <my-editable type="integer" model="detailCtrl.data.id" editing-flag="detailCtrl.editing" size="1"></my-editable>
                </td>
            </tr>
            <tr>
                <td class="key">Module</td>
                <td class="value">
                    <my-editable type="dropdown" source="detailCtrl.linkedData.modules" source-id="id" source-label="libelle" model="detailCtrl.data.module_id" model-label="detailCtrl.data.module_label" editing-flag="detailCtrl.editing" change="detailCtrl.onModuleChange(detailCtrl)"></my-editable>
                </td>
            </tr>
            <tr>
                <td class="key">Libellé</td>
                <td class="value">
                    <my-editable type="text" model="detailCtrl.data.libelle" editing-flag="detailCtrl.editing" size="40" class="full-width"></my-editable>
                </td>
            </tr>
            <tr>
                <td class="key">Nombre de jours</td>
                <td class="value">
                    <my-editable type="integer" model="detailCtrl.data.nb_jours" editing-flag="detailCtrl.editing" size="1"></my-editable>
                </td>
            </tr>
            <tr>
                <td class="key">Heure de début</td>
                <td class="value">
                    <my-editable type="text" model="detailCtrl.data.heure_debut" editing-flag="detailCtrl.editing" size="7"></my-editable>
                </td>
            </tr>
            <tr>
                <td class="key">Heure de fin</td>
                <td class="value">
                    <my-editable type="text" model="detailCtrl.data.heure_fin" editing-flag="detailCtrl.editing" size="7"></my-editable>
                </td>
            </tr>
            <tr>
                <td class="key">Effectif maximum</td>
                <td class="value">
                    <my-editable type="integer" model="detailCtrl.data.effectif_max" editing-flag="detailCtrl.editing" size="1"></my-editable>
                </td>
            </tr>
            <tr>
                <td class="key">Objectifs pédagogiques</td>
                <td class="value">
                    <my-editable type="textarea" model="detailCtrl.data.objectifs_pedagogiques" editing-flag="detailCtrl.editing" rows="5" cols="50" class="full-width"></my-editable>
                </td>
            </tr>
            <tr>
                <td class="key">Matériel</td>
                <td class="value">
                    <my-editable type="textarea" model="detailCtrl.data.materiel" editing-flag="detailCtrl.editing" rows="5" cols="50" class="full-width"></my-editable>
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
    <div ng-show="detailCtrl.mode != create">
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
                ], //id
                'date' => [
                    'label' => 'Date',
                    'sortable' => true,
                    'filterable' => true,
                    'editable' => true,
                    'type' => 'text', //TODO : date
                    'addLine' => true,
                ], //date
                'heure_debut' => [
                    'label' => 'Début',
                    'sortable' => true,
                    'filterable' => true,
                    'editable' => true,
                    'type' => 'text', //TODO : time
                    'addLine' => true,
                ], //heure_debut
                'heure_fin' => [
                    'label' => 'Fin',
                    'sortable' => true,
                    'filterable' => true,
                    'editable' => true,
                    'type' => 'text', //TODO : time
                    'addLine' => true,
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
                ], //heure_debut
             ] //fields
             ])
    </div>
</div>
