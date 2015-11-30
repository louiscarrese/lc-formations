<h2>Lieux de formation</h2>

<div ng-controller="lieuController as lieuCtrl" class="table-container">
    <input type="text" ng-model="lieuCtrl.filterInput" placeholder="Recherche locale" class="table-filter" />
    <form>
        <table>
            <thead>
                <tr>
                    <td class="clickable">
                        <my-sortable-header set="lieuCtrl.setSort('id')" get="lieuCtrl.getSort('id')">Id</my-sortable-header>
                    </td>
                    <td class="clickable">
                        <my-sortable-header set="lieuCtrl.setSort('libelle')" get="lieuCtrl.getSort('libelle')">Libelle</my-sortable-header>
                    </td>
                    <td><!--Edit--></td>
                    <td><!--Delete--></td>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="lieu in lieuCtrl.data | myCustomFilter:lieuCtrl.filterInput:'id':'libelle' track by lieu.id">
                    <td class="centered">
                        <my-editable type="integer" model="lieu.id" editing-flag="lieu.editing" />
                    </td>
                    <td>
                        <my-editable type="text" model="lieu.libelle" editing-flag="lieu.editing" />
                    </td>
                    <td>
                        <span ng-hide="lieu.editing" ng-click="lieu.editing = true"><i class="material-icons clickable">create</i></span>
                        <span ng-show="lieu.editing" ng-click="lieuCtrl.update(lieu)"><i class="material-icons clickable">done</i></span>
                    </td>
                    <td>
                        <span ng-hide="lieu.editing" ng-click="lieuCtrl.delete(lieu)"><i class="material-icons clickable">delete</i></span>
                        <span ng-show="lieu.editing" ng-click="lieuCtrl.cancel(lieu)"><i class="material-icons clickable">clear</i></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <!-- vide car id auto -->
                    </td>
                    <td>
                        <input type="text" ng-model="lieuCtrl.addObject.libelle" />
                    </td>
                    <td class="centered">
                        <span ng-click="lieuCtrl.add()"><i class="material-icons clickable">add</i></span>
                    </td>

                </tr>
            </tbody>
        </table>
    </form>
    <div class="error-message">@{{lieuCtrl.errorMessage}}</div>

</div>