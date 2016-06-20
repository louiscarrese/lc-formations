{{-- Some things have to be computed beforehand ot it becomes a real mess later --}}
<?php 
    //We'll compute the filter string for the ng-repeat
    $filter = 'myCustomFilter:ctrl.filterInput';

    //Keep the identifying property
    foreach($fields as $fieldId => $field) {
        if(isset($field['filterable']) && $field['filterable'] != false) {
            $filterField = $field['filterable'] === true ? $fieldId : $field['filterable'];

            $filter .= ":'" . $filterField . "'";
        }
    }
    $filter .= '| orderBy:ctrl.sortProp:ctrl.sortReverse';
    $filter .= ' track by item.' . $idField;
?>

@inject('viewService', 'ModuleFormation\Services\ViewService')
<h2>{{$title}}</h2>

<div ng-controller="{{$controllerName}} as ctrl">
    <input type="text" ng-model="ctrl.filterInput" placeholder="Recherche locale" class="form-control" />

    <table class="table table-striped">
        <thead>
            <tr>
                @foreach($fields as $fieldId => $field)

                    @if((isset($displayedField) && in_array($fieldId, $displayedField)) 
                    || (!isset($displayedField) && (!isset($field['defaultHidden']) || !$field['defaultHidden'])))
                        @if($field['sortable'])
                            <th class="clickable {{$field['tdClass'] or ''}}" my-sortable-header order="'{{$fieldId}}'" by="ctrl.sortProp" reverse="ctrl.sortReverse"
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
            <tr ng-repeat="item in ctrl.data | {{$filter}}" ng-class="ctrl.getRowClass(item)">
                @foreach($fields as $fieldId => $field)
                    @if((isset($displayedField) && in_array($fieldId, $displayedField)) 
                    || (!isset($displayedField) && (!isset($field['defaultHidden']) || !$field['defaultHidden'])))
                        <td class="{{$field['tdClass'] or ''}}">
                            <span><?php echo $viewService->displayedField($fieldId, $field); ?></span>
                        </td>
                    @endif
                @endforeach
                <td class="list-action">
                    <span>
                        <a ng-href="{{$detailUri}}/<?php echo '{{item.'.$idField.'}}'; ?>" class="btn btn-default center-block">
                            <span>Détail</span>
                        </a>
                    </span>
                </td>
                <td class="list-action">
                    <span>
                        <a ng-href="{{$detailUri}}/<?php echo '{{item.'.$idField.'}}'; ?>?edit=true" class="btn btn-default center-block">
                            <span>Editer</span>
                        </a>
                    </span>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="global-actions clearfix">
        <a ng-href="<?php echo '{{ ctrl.createUrl(\'' . $detailUri . '\')}}'; ?>" class="btn btn-default">
            <span>Ajouter</span>
        </a>
    </div>
</div>