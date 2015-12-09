<h2>Sessions</h2>

<div ng-controller="sessionsListController as sessionsListCtrl" class="list-table-container">
    <input type="text" ng-model="sessionsListCtrl.filterInput" placeholder="Recherche locale" class="table-filter" />

    <table>
        <thead>
            <tr>
                <td class="clickable">
                    <my-sortable-header set="sessionsListCtrl.setSort('id')" get="sessionsListCtrl.getSort('id')">Id</my-sortable-header>
                </td>
                <td class="clickable">
                    <my-sortable-header set="sessionsListCtrl.setSort('libelle')" get="sessionsListCtrl.getSort('libelle')">Libellé</my-sortable-header>
                </td>
                <td class="clickable">
                    <my-sortable-header set="sessionsListCtrl.setSort('domaine_formation_id')" get="sessionsListCtrl.getSort('domaine_formation_id')">Domaine</my-sortable-header>
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
            <tr ng-repeat="session in sessionsListCtrl.data | myCustomFilter:sessionsListCtrl.filterInput:'id':'libelle':'domaine_formation.libelle' track by session.id">
                <td class="centered">
                    <span>@{{session.id}}</span>
                </td>
                <td>
                    <span>@{{session.libelle}}</span>
                </td>
                <td>
                    <span>@{{session.domaine_formation.libelle}}</span>
                </td>
                <td>
                    <span>
                        <a ng-href="/sessions/@{{session.id}}">
                            <i class="icon clickable">info</i>
                        </a>
                    </span>
                </td>
                <td>
                    <span>
                        <a ng-href="/sessions/@{{session.id}}?edit=true">
                            <i class="icon clickable">edit</i>
                        </a>
                    </span>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="global-actions">
        <span>
            <a ng-href="/sessions/create">
                <i class="icon clickable">add</i>
            </a>
        </span>
    </div>
   <div class="error-message">@{{sessionsListCtrl.errorMessage}}</div>
</div>