<h2>Types de tarifs</h2>

<div ng-controller="tarifTypesController as tarifTypesCtrl" class="list-table-container">
    <input type="text" ng-model="tarifTypesCtrl.filterInput" placeholder="Recherche locale" class="table-filter" />
    <form>
        <table>
            <thead>
                <tr>
                    <td class="clickable">
                        <my-sortable-header set="tarifTypesCtrl.setSort('id')" get="tarifTypesCtrl.getSort('id')">Id</my-sortable-header>
                    </td>
                    <td class="clickable">
                        <my-sortable-header set="tarifTypesCtrl.setSort('libelle')" get="tarifTypesCtrl.getSort('libelle')">Libelle</my-sortable-header>
                    </td>
                    <td><!--Edit--></td>
                    <td><!--Delete--></td>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="type in tarifTypesCtrl.data | myCustomFilter:tarifTypesCtrl.filterInput:'id':'libelle' track by type.id" ng-form="tarifTypesCtrl.form_@{{type.id}}">
                    <td class="centered">
                        <my-editable type="integer" model="type.id" editing-flag="type.editing" size="1" />
                    </td>
                    <td>
                        <my-editable type="text" model="type.libelle" editing-flag="type.editing" />
                    </td>
                    <td>
                        <span ng-hide="type.editing" ng-click="type.editing = true"><i class="icon clickable">edit</i></span>
                        <span ng-show="type.editing" ng-click="tarifTypesCtrl.editSubmit(type)"><i class="icon clickable">validate</i></span>
                    </td>
                    <td>
                        <span ng-hide="type.editing" ng-click="tarifTypesCtrl.delete(type)"><i class="icon clickable">delete</i></span>
                        <span ng-show="type.editing" ng-click="tarifTypesCtrl.cancel(type)"><i class="icon clickable">undo</i></span>
                    </td>
                </tr>
                <tr ng-form="tarifTypesCtrl.form_add">
                    <td>
                        <!-- vide car id auto -->
                    </td>
                    <td>
                        <input type="text" ng-model="tarifTypesCtrl.addObject.libelle" />
                    </td>
                    <td class="centered">
                        <span ng-click="tarifTypesCtrl.addSubmit()"><i class="icon clickable">add</i></span>
                    </td>

                </tr>
            </tbody>
        </table>
    </form>
    <div class="error-message">@{{tarifTypesCtrl.errorMessage}}</div>

</div>