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
                <tr ng-repeat="type in formateurTypesCtrl.data | myCustomFilter:formateurTypesCtrl.filterInput:'id':'libelle' track by type.id" ng-form="formateurTypesCtrl.form_@{{type.id}}">
                    <td class="centered">
                        <my-editable type="integer" model="type.id" editing-flag="type.editing" size="1" />
                    </td>
                    <td>
                        <my-editable type="text" model="type.libelle" editing-flag="type.editing" />
                    </td>
                    <td>
                        <span ng-hide="type.editing" ng-click="type.editing = true"><i class="icon clickable">edit</i></span>
                        <span ng-show="type.editing" ng-click="formateurTypesCtrl.editSubmit(type)"><i class="icon clickable">validate</i></span>
                    </td>
                    <td>
                        <span ng-hide="type.editing" ng-click="formateurTypesCtrl.delete(type)"><i class="icon clickable">delete</i></span>
                        <span ng-show="type.editing" ng-click="formateurTypesCtrl.cancel(type)"><i class="icon clickable">undo</i></span>
                    </td>
                </tr>
                <tr ng-form="formateurTypesCtrl.form_add">
                    <td>
                        <input type="text" ng-model="formateurTypesCtrl.addObject.id" size="1" />
                    </td>
                    <td>
                        <input type="text" ng-model="formateurTypesCtrl.addObject.libelle" size="1"/>
                    </td>
                    <td class="centered">
                        <span ng-click="formateurTypesCtrl.addSubmit()"><i class="icon clickable">add</i></span>
                    </td>

                </tr>
            </tbody>
        </table>
    </form>
    <div class="error-message">@{{formateurTypesCtrl.errorMessage}}</div>

</div>