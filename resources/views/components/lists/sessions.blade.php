<h2>Sessions</h2>

<div ng-controller="sessionsTableController as sessionsCtrl" class="table-container">
    <input type="text" ng-model="sessionsCtrl.filterInput" placeholder="Recherche locale" class="table-filter" />

    <table>
        <thead>
            <tr>
                <td class="clickable">
                    <my-sortable-header set="sessionsCtrl.setSort('id')" get="sessionsCtrl.getSort('id')">Id</my-sortable-header>
                </td>
                <td class="clickable">
                    <my-sortable-header set="sessionsCtrl.setSort('libelle')" get="sessionsCtrl.getSort('libelle')">Libellé</my-sortable-header>
                </td>
                <td>
                    <!-- Details -->
                </td>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="module in sessionsCtrl.data | myCustomFilter:sessionsCtrl.filterInput:'id':'libelle' track by module.id">
                <td class="centered">
                    <span>@{{module.id}}</span>
                </td>
                <td>
                    <span>@{{module.libelle}}</span>
                </td>
                <td>
                    <span><i class="material-icons clickable">info_outline</i></span>
                </td>
            </tr>
        </tbody>
    </table>
   <div class="error-message">@{{sessionsCtrl.errorMessage}}</div>
</div>