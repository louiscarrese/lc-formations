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

    <h3>Jours</h3>
    <div ng-controller="sessionJoursController as sessionJoursCtrl" ng-show="detailCtrl.mode != 'create'" ng-init="sessionJoursCtrl.parent = detailCtrl" class="list-table-container">
        <table>
            <thead>
                <tr>
                    <td class="clickable">
                        <my-sortable-header set="sessionJoursCtrl.setSort('id')" get="sessionJoursCtrl.getSort('id')">Id</my-sortable-header>
                    </td>
                    <td class="clickable">
                        <my-sortable-header set="sessionJoursCtrl.setSort('date')" get="sessionJoursCtrl.getSort('date')">Date</my-sortable-header>
                    </td>
                    <td class="clickable">
                        <my-sortable-header set="sessionJoursCtrl.setSort('heure_debut')" get="sessionJoursCtrl.getSort('heure_debut')">Début</my-sortable-header>
                    </td>
                    <td class="clickable">
                        <my-sortable-header set="sessionJoursCtrl.setSort('heure_fin')" get="sessionJoursCtrl.getSort('heure_fin')">Fin</my-sortable-header>
                    </td>
                    <td class="clickable">
                        <my-sortable-header set="sessionJoursCtrl.setSort('lieu_id')" get="sessionJoursCtrl.getSort('lieu_id')">Lieu</my-sortable-header>
                    </td>
                    <td><!--Edit--></td>
                    <td><!--Delete--></td>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="jour in sessionJoursCtrl.data">
                    <td class="centered">
                        <my-editable type="integer" model="jour.id" editing-flag="jour.editing" size="1"/>
                    </td>
                    <td>
                        <my-editable type="text" model="jour.date" editing-flag="jour.editing" />
                    </td>
                    <td>
                        <my-editable type="text" model="jour.heure_debut" editing-flag="jour.editing" />
                    </td>
                    <td>
                        <my-editable type="text" model="jour.heure_fin" editing-flag="jour.editing" />
                    </td>
                    <td>
                        <my-editable type="dropdown" source="sessionJoursCtrl.linkedData.lieus" source-id="id" source-label="libelle" model="jour.lieu_id" model-label="jour.lieu_label" editing-flag="jour.editing" />
                    </td>
                    <td>
                        <span ng-hide="jour.editing" ng-click="jour.editing = true"><i class="icon clickable">edit</i></span>
                        <span ng-show="jour.editing" ng-click="sessionJoursCtrl.update(jour)"><i class="icon clickable">validate</i></span>
                    </td>
                    <td>
                        <span ng-hide="jour.editing" ng-click="sessionJoursCtrl.delete(jour)"><i class="icon clickable">delete</i></span>
                        <span ng-show="jour.editing" ng-click="sessionJoursCtrl.cancel(jour)"><i class="icon clickable">undo</i></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <!-- vide car id auto -->
                    </td>
                    <td>
                        <input type="text" ng-model="sessionJoursCtrl.addObject.date" />
                    </td>
                    <td>
                        <input type="text" ng-model="sessionJoursCtrl.addObject.heure_debut" />
                    </td>
                    <td>
                        <input type="text" ng-model="sessionJoursCtrl.addObject.heure_fin" />
                    </td>
                    <td>
                        <select ng-options="item.id as item.libelle for item in sessionJoursCtrl.linkedData.lieus" ng-model="sessionJoursCtrl.addObject.lieu_id" />
                    </td>
                    <td class="centered">
                        <span ng-click="sessionJoursCtrl.add()"><i class="icon clickable">add</i></span>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>


</div>
