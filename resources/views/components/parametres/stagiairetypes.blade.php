<h2>Types de stagiaires</h2>

<div ng-controller="stagiaireTypesController as stagiaireTypesCtrl" class="list-table-container">
    <input type="text" ng-model="stagiaireTypesCtrl.filterInput" placeholder="Recherche locale" class="table-filter" />
    <form>
        <table>
            <thead>
                <tr>
                    <td class="clickable">
                        <my-sortable-header set="stagiaireTypesCtrl.setSort('id')" get="stagiaireTypesCtrl.getSort('id')">Id</my-sortable-header>
                    </td>
                    <td class="clickable">
                        <my-sortable-header set="stagiaireTypesCtrl.setSort('libelle')" get="stagiaireTypesCtrl.getSort('libelle')">Libelle</my-sortable-header>
                    </td>
                    <td class="clickable">
                        <my-sortable-header set="stagiaireTypesCtrl.setSort('is_salarie')" get="stagiaireTypesCtrl.getSort('is_salarie')">Salarié</my-sortable-header>
                    </td>
                    <td class="clickable">
                        <my-sortable-header set="stagiaireTypesCtrl.setSort('is_fonctionnaire')" get="stagiaireTypesCtrl.getSort('is_fonctionnaire')">Fonctionnaire</my-sortable-header>
                    </td>
                    <td class="clickable">
                        <my-sortable-header set="stagiaireTypesCtrl.setSort('is_contrat_pro')" get="stagiaireTypesCtrl.getSort('is_contrat_pro')">Contrat Pro</my-sortable-header>
                    </td>
                    <td class="clickable">
                        <my-sortable-header set="stagiaireTypesCtrl.setSort('is_demandeur_emploi')" get="stagiaireTypesCtrl.getSort('is_demandeur_emploi')">Demandeur d'emploi</my-sortable-header>
                    </td>
                    <td><!--Edit--></td>
                    <td><!--Delete--></td>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="type in stagiaireTypesCtrl.data | myCustomFilter:stagiaireTypesCtrl.filterInput:'id':'libelle' track by type.id">
                    <td class="centered">
                        <my-editable type="integer" model="type.id" editing-flag="type.editing" />
                    </td>
                    <td>
                        <my-editable type="text" model="type.libelle" editing-flag="type.editing" />
                    </td>
                    <td class="centered">
                        <my-editable type="checkbox" model="type.is_salarie" editing-flag="!type.editing" />
                    </td>
                    <td class="centered">
                        <my-editable type="checkbox" model="type.is_fonctionnaire" editing-flag="!type.editing" />
                    </td>
                    <td class="centered">
                        <my-editable type="checkbox" model="type.is_contrat_pro" editing-flag="!type.editing" />
                    </td>
                    <td class="centered">
                        <my-editable type="checkbox" model="type.is_demandeur_emploi" editing-flag="!type.editing" />
                    </td>
                    <td>
                        <span ng-hide="type.editing" ng-click="type.editing = true"><i class="material-icons clickable">create</i></span>
                        <span ng-show="type.editing" ng-click="stagiaireTypesCtrl.update(type)"><i class="material-icons clickable">done</i></span>
                    </td>
                    <td>
                        <span ng-hide="type.editing" ng-click="stagiaireTypesCtrl.delete(type)"><i class="material-icons clickable">delete</i></span>
                        <span ng-show="type.editing" ng-click="stagiaireTypesCtrl.cancel(type)"><i class="material-icons clickable">clear</i></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <!-- vide car id auto -->
                    </td>
                    <td>
                        <input type="text" ng-model="stagiaireTypesCtrl.addObject.libelle" size="1"/>
                    </td>
                    <td class="centered">
                        <input type="checkbox" ng-model="stagiaireTypesCtrl.addObject.is_salarie" />
                    </td>
                    <td class="centered">
                        <input type="checkbox" ng-model="stagiaireTypesCtrl.addObject.is_fonctionnaire" />
                    </td>
                    <td class="centered">
                        <input type="checkbox" ng-model="stagiaireTypesCtrl.addObject.is_contrat_pro" />
                    </td>
                    <td class="centered">
                        <input type="checkbox" ng-model="stagiaireTypesCtrl.addObject.is_demandeur_emploi" />
                    </td>
                    <td class="centered">
                        <span ng-click="stagiaireTypesCtrl.add()"><i class="material-icons clickable">add</i></span>
                    </td>

                </tr>
            </tbody>
        </table>
    </form>
    <div class="error-message">@{{stagiaireTypesCtrl.errorMessage}}</div>
</div>
