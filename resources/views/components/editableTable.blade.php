{{-- Some things have to be computed beforehand ot it becomes a real mess later --}}
<?php 
    //We'll compute the filter string for the ng-repeat
    $filter = 'myCustomFilter:ctrl.filterInput';

    //Keep the identifying property
    foreach($fields as $fieldId => $field) {
        if(isset($field['filterable']) && $field['filterable']) 
            $filter .= ":'" . $fieldId . "'";
    }
    $filter .= ' track by elem.' . $idField;

?>

<h2>{{$title}}</h2>

<div ng-controller="{{$controllerName}} as ctrl" <? echo((isset($adaptToContent) && $adaptToContent) ? ' class="adapt-to-content"' : ''); ?>>

    <div class="alerts">
        <uib-alert type="danger" close="{{$controllerName}}.closeAlert($index)" ng-repeat="error in {{$controllerName}}.errors">@{{error}}</uib-alert>
    </div>

    <input type="text" ng-model="ctrl.filterInput" placeholder="Recherche locale" class="form-control" />
    <form name="ctrl.mainForm" novalidate>
    <table class="table table-striped table-condensed">
        <thead>
            <tr>
                {{-- Configured Headers --}}
                @foreach($fields as $fieldId => $field)
                    @if($field['sortable'])
                        <th class="clickable {{$field['tdClass'] or ''}} <? echo (isset($field['size']) ? 'col-sm-' . $field['size'] : ''); ?>">
                            <my-sortable-header set="ctrl.setSort('{{$fieldId}}')"
                                                get="ctrl.getSort('{{$fieldId}}')"
                            >
                            {{$field['label']}}
                        </th>
                    @else
                        <th {{$field['tdClass'] or ''}}><span>{{$field['label']}}</span></th>
                    @endif
                @endforeach
                {{-- action headers --}}
                <td><!--Edit--></td>
                <td><!--Delete--></td>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="elem in ctrl.data | {{$filter}}" ng-form="ctrl.form_@{{$index}}">
                {{-- Each field --}}
                @foreach($fields as $fieldId => $field)
                    <td class="validated form-group {{$field['tdClass'] or ''}}" ng-class="{ 'has-error': ctrl.form_@{{$index}}.{{$fieldId}}.$invalid && ctrl.form_@{{$index}}.{{$fieldId}}.$touched }">
                        @if($field['editable'])
                            @include('components.myEditable', [
                                'controllerName' => 'ctrl',
                                'element' => 'elem',
                                'editingFlag' => 'elem.editing',
                                'fieldId' => $fieldId,
                                'field' => $field
                            ])
                        @else
                            <span {{$field['additionalAttributes'] or ''}}>@{{elem.{{$fieldId}}}}</span>
                        @endif
                    </td>
                @endforeach
                {{-- action columns --}}
                <td class="list-action">
                    <span ng-hide="elem.editing" ng-click="elem.editing = true" class="glyphicon glyphicon-edit clickable"></span>
                    <span ng-show="elem.editing" ng-click="ctrl.editSubmit($index, elem)" class="glyphicon glyphicon-ok clickable"></span>
                </td>
                <td class="list-action">
                    <span ng-hide="elem.editing" ng-click="ctrl.delete(elem)" class="glyphicon glyphicon-trash clickable"></span>
                    <span ng-show="elem.editing" ng-click="ctrl.cancel(elem)"class="glyphicon glyphicon-remove clickable"></span>
                </td>
            </tr>

            {{-- Add line --}}
            <tr ng-form="ctrl.form_add">
                @foreach($fields as $fieldId => $field)
                    <td class="validated form-group {{$field['tdClass'] or ''}}" ng-class="{ 'has-error': ctrl.form_add.{{$fieldId}}.$invalid && ctrl.form_add.{{$fieldId}}.$touched }">
                        @if($field['addLine'])
                            @include('components.myEditable', [
                                'controllerName' => 'ctrl',
                                'element' => 'ctrl.addObject',
                                'editingFlag' => 'true',
                                'fieldId' => $fieldId,
                                'field' => $field
                            ])
                        @endif
                    </td>
                @endforeach
                <td class="list-action">
                    <span ng-click="ctrl.addSubmit()" class="glyphicon glyphicon-plus clickable"></span>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
    </form>
</div>