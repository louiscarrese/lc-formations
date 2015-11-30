<h2>Domaines de formation</h2>

<div ng-controller="domaineFormationsController as domaineFormationsCtrl" class="list-table-container">
    <input type="text" ng-model="domaineFormationsCtrl.filterInput" placeholder="Recherche locale" class="table-filter" />
    <form>
        <table>
            <thead>
                <tr>
                    <td class="clickable">
                        <my-sortable-header set="domaineFormationsCtrl.setSort('id')" get="domaineFormationsCtrl.getSort('id')">Id</my-sortable-header>
                    </td>
                    <td class="clickable">
                        <my-sortable-header set="domaineFormationsCtrl.setSort('libelle')" get="domaineFormationsCtrl.getSort('libelle')">Libelle</my-sortable-header>
                    </td>
                    <td><!--Edit--></td>
                    <td><!--Delete--></td>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="domaine in domaineFormationsCtrl.data | myCustomFilter:domaineFormationsCtrl.filterInput:'id':'libelle' track by domaine.id">
                    <td class="centered">
                        <my-editable type="integer" model="domaine.id" editing-flag="domaine.editing" />
                    </td>
                    <td>
                        <my-editable type="text" model="domaine.libelle" editing-flag="domaine.editing" />
                    </td>
                    <td>
                        <span ng-hide="domaine.editing" ng-click="domaine.editing = true"><i class="material-icons clickable">create</i></span>
                        <span ng-show="domaine.editing" ng-click="domaineFormationsCtrl.update(domaine)"><i class="material-icons clickable">done</i></span>
                    </td>
                    <td>
                        <span ng-hide="domaine.editing" ng-click="domaineFormationsCtrl.delete(domaine)"><i class="material-icons clickable">delete</i></span>
                        <span ng-show="domaine.editing" ng-click="domaineFormationsCtrl.cancel(domaine)"><i class="material-icons clickable">clear</i></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <!-- vide car id auto -->
                    </td>
                    <td>
                        <input type="text" ng-model="domaineFormationsCtrl.addObject.libelle" />
                    </td>
                    <td class="centered">
                        <span ng-click="domaineFormationsCtrl.add()"><i class="material-icons clickable">add</i></span>
                    </td>

                </tr>
            </tbody>
        </table>
    </form>
    <div class="error-message">@{{domaineFormationsCtrl.errorMessage}}</div>

</div>