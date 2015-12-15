{{-- Some things have to be computed beforehand ot it becomes a real mess later --}}
<?php 
    //We'll compute the filter string for the ng-repeat
    $filter = 'myCustomFilter:ctrl.filterInput';

    //Keep the identifying property
    $id = '';
    foreach($fields as $fieldId => $field) {
        if(isset($field['filterable']) && $field['filterable']) 
            $filter .= ":'" . $fieldId . "'";
        if(isset($field['isId']) && $field['isId'])
            $id = $fieldId;
    }
    $filter .= ' track by item.' . $id;
?>
<h2>{{$title}}</h2>

<div ng-controller="{{$controllerName}} as ctrl">
    <input type="text" ng-model="ctrl.filterInput" placeholder="Recherche locale" class="form-control" />

    <table class="table table-striped">
        <thead>
            <tr>
                @foreach($fields as $fieldId => $field)
                    @if($field['sortable'])
                        <th class="clickable {{$field['tdClass'] or ''}}">
                            <my-sortable-header set="ctrl.setSort('{{$fieldId}}')" get="ctrl.getSort('{{$fieldId}}')">{{$field['label']}}</my-sortable-header>
                        </th>
                    @else
                        <td><span>{{$field['label']}}</span></td>
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
            <tr ng-repeat="item in ctrl.data | {{$filter}}">
                @foreach($fields as $fieldId => $field)
                    <?php 
                        $displayedField = isset($field['displayedField']) ? $field['displayedField'] : $fieldId;
                    ?>
                    <td class="{{$field['tdClass'] or ''}}">
                        <span><? echo '{{item.'.$displayedField.'}}'; ?></span>
                    </td>
                @endforeach
                <td>
                    <span>
                        <a ng-href="{{$detailUri}}/<? echo '{{item.'.$id.'}}'; ?>">
                            <span class="glyphicon glyphicon-info"></span>
                        </a>
                    </span>
                </td>
                <td>
                    <span>
                        <a ng-href="{{$detailUri}}/<? echo '{{item.'.$id.'}}'; ?>?edit=true">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                    </span>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="global-actions clearfix">
        <a ng-href="{{$detailUri}}/create" class="pull-right">
            <span class="glyphicon glyphicon-plus"></span>
        </a>
    </div>
</div>