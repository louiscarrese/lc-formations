<h2>Modules</h2>

<div ng-controller="modulesListController as modulesListCtrl" class="table-container">
    <input type="text" ng-model="modulesListCtrl.filterInput" placeholder="Recherche locale" class="table-filter" />

    <table>
        <thead>
            <tr>
                <td class="clickable">
                    <my-sortable-header set="modulesListCtrl.setSort('id')" get="modulesListCtrl.getSort('id')">Id</my-sortable-header>
                </td>
                <td class="clickable">
                    <my-sortable-header set="modulesListCtrl.setSort('libelle')" get="modulesListCtrl.getSort('libelle')">Libellé</my-sortable-header>
                </td>
                <td>
                    <!-- Details -->
                </td>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="module in modulesListCtrl.data | myCustomFilter:modulesListCtrl.gilterInput:'id':'libelle' track by module.id">
                <td class="centered">
                    <span>@{{module.id}}</span>
                </td>
                <td>
                    <span>@{{module.id}}</span>
                </td>
                <td>
                    <span><i class="material-icons clickable">info_outline</i></span>
                </td>
            </tr>
            <tr>
                <td>
                    <!-- vide car id auto -->
                </td>
                <td>
                    <input type="text" ng-model="modulesListCtrl.addObject.libelle" />
                </td>
                <td class="centered">
                    <span ng-click="modulesListCtrl.add()"><i class="material-icons clickable">add</i></span>
                </td>

            </tr>
        </tbody>
    </table>
   <div class="error-message">@{{modulesListCtrl.errorMessage}}</div>
</div>