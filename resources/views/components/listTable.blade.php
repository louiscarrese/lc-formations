<h2>{{$customTitle or $title}}</h2>

<div ng-controller="{{$controllerName}} as ctrl"
    @if(isset($queryMethod))
        query-method="{{$queryMethod}}"
    @endif
>
    <form>
        <div class="input-group">
            <input type="text" ng-model="ctrl.searchQuery" placeholder="Recherche locale" class="form-control" />
            <span class="input-group-btn">
                <button class="btn btn-default" ng-click="ctrl.search()" type="submit">Search</button>
            </span>
        </div>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                @foreach($fields as $fieldId => $field)

                    @if((isset($displayedField) && in_array($fieldId, $displayedField)) 
                    || (!isset($displayedField) && (!isset($field['defaultHidden']) || !$field['defaultHidden'])))
                        @if($field['sortable'])
                            <th class="clickable {{$field['tdClass'] or ''}}" my-sortable-header order="'{{$field['sortable_field'] or $fieldId}}'" by="ctrl.sortProp" reverse="ctrl.sortReverse"
                            @if(isset($field['defaultSort']) && $field['defaultSort'])
                                default-sort
                            @endif
                            >{{$field['label']}}
                        @else
                            <td><span>{{$field['label']}}</span></td>
                        @endif
                    @endif
                @endforeach
                <td>
                    <!-- Details -->
                </td>
                <td>
                    <!-- Edit -->
                </td>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="item in ctrl.data | orderBy:ctrl.sortProp:ctrl.sortReverse track by item.{{$idField}}">
                @foreach($fields as $fieldId => $field)
                    @if((isset($displayedField) && in_array($fieldId, $displayedField)) 
                    || (!isset($displayedField) && (!isset($field['defaultHidden']) || !$field['defaultHidden'])))
                        <td class="{{$field['tdClass'] or ''}}">
                            <span><?php echo $viewService->displayedField($fieldId, (isset($field['displayedField']) ? $field['displayedField'] : null), 'item.') ?></span>
                        </td>
                    @endif
                @endforeach
                <td class="list-action">
                    <span>
                        <a ng-href="{{$viewService->privateUrl($detailUri)}}/<?php echo '{{item.'.$idField.'}}'; ?>" class="btn btn-default center-block">
                            <span>Détail</span>
                        </a>
                    </span>
                </td>
                <td class="list-action">
                    <span>
                        <a ng-href="{{$viewService->privateUrl($detailUri)}}/<?php echo '{{item.'.$idField.'}}'; ?>?edit=true" class="btn btn-default center-block">
                            <span>Editer</span>
                        </a>
                    </span>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="global-actions clearfix">
        <a ng-href="<?php echo '{{ctrl.createUrl(\'' . $viewService->privateUrl($detailUri) . '\')}}' ?>" class="btn btn-default">
            <span>Ajouter</span>
        </a>
    </div>

    <my-paginator paginator="ctrl.paginator" goto-page="ctrl.gotoPage"></my-paginator>
</div>
