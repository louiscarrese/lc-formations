<h2>Types de financeurs</h2>

<div ng-controller="financeurTypesController as financeurTypesCtrl" class="list-table-container">
    <input type="text" ng-model="financeurTypesCtrl.filterInput" placeholder="Recherche locale" class="table-filter" />

        <table>
            <thead>
                <tr>
                    <td class="clickable">
                        <my-sortable-header set="financeurTypesCtrl.setSort('id')" get="financeurTypesCtrl.getSort('id')">Id</my-sortable-header>
                    </td>
                    <td class="clickable">
                        <my-sortable-header set="financeurTypesCtrl.setSort('libelle')" get="financeurTypesCtrl.getSort('libelle')">Libelle</my-sortable-header>
                    </td>
                    <td><!--Edit--></td>
                    <td><!--Delete--></td>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="type in financeurTypesCtrl.data | myCustomFilter:financeurTypesCtrl.filterInput:'id':'libelle' track by type.id" ng-form="financeurTypesCtrl.form_@{{type.id}}">
                    <td class="centered">
                        <my-editable type="integer" model="type.id" editing-flag="type.editing"  size="1"/>
                    </td>
                    <td>
                        <my-editable type="text" model="type.libelle" editing-flag="type.editing" />
                    </td>
                    <td>
                        <span ng-hide="type.editing" ng-click="type.editing = true"><i class="icon clickable">edit</i></span>
                        <span ng-show="type.editing" ng-click="financeurTypesCtrl.editSubmit(type)"><i class="icon clickable">validate</i></span>
                    </td>
                    <td>
                        <span ng-hide="type.editing" ng-click="financeurTypesCtrl.delete(type)"><i class="icon clickable">delete</i></span>
                        <span ng-show="type.editing" ng-click="financeurTypesCtrl.cancel(type)"><i class="icon clickable">undo</i></span>
                    </td>
                </tr>
                <tr ng-form="financeurTypesCtrl.form_add">
                    <td>
                        <!-- vide car id auto -->
                    </td>
                    <td>
                        <input type="text" ng-model="financeurTypesCtrl.addObject.libelle" />
                    </td>
                    <td class="centered">
                        <span ng-click="financeurTypesCtrl.addSubmit()"><i class="icon clickable">add</i></span>
                    </td>

                </tr>
            </tbody>
        </table>
    </form>
    <div class="error-message">@{{financeurTypesCtrl.errorMessage}}</div>

</div>