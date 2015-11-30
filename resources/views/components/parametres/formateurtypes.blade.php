<h2>Types de formateurs</h2>

<div ng-controller="formateurTypesController as formateurTypesCtrl" class="list-table-container">
    <input type="text" ng-model="formateurTypesCtrl.filterInput" placeholder="Recherche locale" class="table-filter" />

        <table>
            <thead>
                <tr>
                    <td class="clickable">
                        <my-sortable-header set="formateurTypesCtrl.setSort('id')" get="formateurTypesCtrl.getSort('id')">Id</my-sortable-header>
                    </td>
                    <td class="clickable">
                        <my-sortable-header set="formateurTypesCtrl.setSort('libelle')" get="formateurTypesCtrl.getSort('libelle')">Libelle</my-sortable-header>
                    </td>
                    <td><!--Edit--></td>
                    <td><!--Delete--></td>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="type in formateurTypesCtrl.data | myCustomFilter:formateurTypesCtrl.filterInput:'id':'libelle' track by type.id">
                    <td class="centered">
                        <my-editable type="integer" model="type.id" editing-flag="type.editing" />
                    </td>
                    <td>
                        <my-editable type="text" model="type.libelle" editing-flag="type.editing" />
                    </td>
                    <td>
                        <span ng-hide="type.editing" ng-click="type.editing = true"><i class="material-icons clickable">create</i></span>
                        <span ng-show="type.editing" ng-click="formateurTypesCtrl.update(type)"><i class="material-icons clickable">done</i></span>
                    </td>
                    <td>
                        <span ng-hide="type.editing" ng-click="formateurTypesCtrl.delete(type)"><i class="material-icons clickable">delete</i></span>
                        <span ng-show="type.editing" ng-click="formateurTypesCtrl.cancel(type)"><i class="material-icons clickable">clear</i></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" ng-model="formateurTypesCtrl.addObject.id" size="1"/>
                    </td>
                    <td>
                        <input type="text" ng-model="formateurTypesCtrl.addObject.libelle" size="1"/>
                    </td>
                    <td class="centered">
                        <span ng-click="formateurTypesCtrl.add()"><i class="material-icons clickable">add</i></span>
                    </td>

                </tr>
            </tbody>
        </table>
    </form>
    <div class="error-message">@{{formateurTypesCtrl.errorMessage}}</div>

</div>