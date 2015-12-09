<h2>Modules</h2>

<div ng-controller="modulesListController as modulesListCtrl" class="list-table-container">
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
                <td class="clickable">
                    <my-sortable-header set="modulesListCtrl.setSort('domaine_formation_id')" get="modulesListCtrl.getSort('domaine_formation_id')">Domaine</my-sortable-header>
                </td>
                <td>
                    <!-- Details -->
                </td>
                <td>
                    <!-- Edit -->
                </td>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="module in modulesListCtrl.data | myCustomFilter:modulesListCtrl.filterInput:'id':'libelle':'domaine_formation.libelle' track by module.id">
                <td class="centered">
                    <span>@{{module.id}}</span>
                </td>
                <td>
                    <span>@{{module.libelle}}</span>
                </td>
                <td>
                    <span>@{{module.domaine_formation.libelle}}</span>
                </td>
                <td>
                    <span>
                        <a ng-href="/modules/@{{module.id}}">
                            <i class="icon clickable">info</i>
                        </a>
                    </span>
                </td>
                <td>
                    <span>
                        <a ng-href="/modules/@{{module.id}}?edit=true">
                            <i class="icon clickable">edit</i>
                        </a>
                    </span>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="global-actions">
        <span>
            <a ng-href="/modules/create">
                <i class="icon clickable">add</i>
            </a>
        </span>
    </div>
   <div class="error-message">@{{modulesListCtrl.errorMessage}}</div>
</div>